<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // ეს ამოწმებს რექუარემენტებს ინფუთიდან
        $incomingFields = $request->validate([
            'name' => [
                'required',
                'min:3',
                'max:10',
                Rule::unique('users', 'name'),
            ],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:79'],
        ]);
        // hashing the password
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        // ბაზაზე ვაგზვნით ამ რექუესტებს
        $user = User::create($incomingFields);

        auth()->login($user);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        if (
            auth()->attempt([
                'name' => $incomingFields['loginname'],
                'password' => $incomingFields['loginpassword'],
            ])
        ) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}

 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth 
<p>You are longged in</p>

 

<form action="/logout"  method="POST" >
    @csrf 
    <button>Log out</button>
</form>

<x-post/>
<x-all-post  :posts="$posts" />
    @else
    
    <div  style='border: 3px solid black' >
        <h1>Register</h1>
        <form action="/register" method="POST">
          @csrf
       <input type='text' name="name" placeholder="name"/>
       <input type='email' name="email" placeholder="email"/>
       <input type='password' name="password" placeholder="password"/>
       <button>Register</button>
        </form>
          </div>
    <div  style='border: 3px solid black' >
        <h1>login</h1>
        <form action="/login" method="POST">
          @csrf
          <input type='text' name="loginname" placeholder="name"/>
          <input type='password' name="loginpassword" placeholder="password"/>
       <button>login</button>
        </form>
          </div>
    @endauth
 
</body>
</html>
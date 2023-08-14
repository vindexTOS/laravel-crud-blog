<div  style='border: 3px solid black' >
     <h2>Create new post</h2>
     <form action="/create-post" method="POST" >
    @csrf 
    <input type="text" name="title" placeholder="title"/>
    <textarea name="body" placeholder="body conn" ></textarea>
    <button>Save post</button></form>
</div>php artisan migrate
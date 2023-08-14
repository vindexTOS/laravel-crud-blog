<div>
        @csrf

    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    <a href='/edit-post/{{$post->id}}'>Edit</a>

    <form  action="/delete-post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="postId" value="{{ $post->id }}">

        <button>Delete</button>
</form>

</div>


<div>
    <h1>all posts</h1>
    @foreach ($posts as $post)
    @csrf
   <x-post-card :post="$post" />
    @endforeach
</div>
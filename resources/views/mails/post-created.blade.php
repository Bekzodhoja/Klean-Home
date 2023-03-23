<div>

    <h1>User: {{ $post->user->name }}</h1>
    <h5>Created {{ $post->created_at }}</h5>
    <p>{{ $post->id }}</p>
    <div>{{ $post->title }}</div>
    <div>{{ $post->short_content }}</div>
    <div>{{ $post->content }}</div>
</div>
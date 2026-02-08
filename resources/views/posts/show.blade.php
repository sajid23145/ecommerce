<x-layout.sidebar title="Post Details">

    <h2>{{ $post->title }}</h2>

    <p><b>Category:</b> {{ $post->category->name }}</p>
    <p><b>Author:</b> {{ $post->user->name }}</p>

    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" width="250" class="mb-3">
    @endif

    <p>{{ $post->body }}</p>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back</a>

</x-layout.sidebar>

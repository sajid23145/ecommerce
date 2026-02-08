<x-layout.sidebar title="Posts">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Add Post</a>
    </div>

    <table class="table table-bordered table-striped shadow">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->user->name }}</td>

                    <td>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" width="35">
                        @else
                            No Image
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">View</a>

                        @if (auth()->id() == $post->user_id)
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $posts->links() }}
    </div>

</x-layout.sidebar>

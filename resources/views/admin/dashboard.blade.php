<x-layout.sidebar title="Admin Dashboard">

    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card shadow p-3">
                <h5>Total Users</h5>
                <h2>{{ $totalUsers }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3">
                <h5>Total Posts</h5>
                <h2>{{ $totalPosts }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3">
                <h5>Total Categories</h5>
                <h2>{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>

    <div class="card shadow mt-4 p-3">
        <h4>Latest Posts</h4>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($latestPosts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout.sidebar>

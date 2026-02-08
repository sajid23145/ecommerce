<x-layout.sidebar title="User Dashboard">

    <h2 class="mb-4">User Dashboard</h2>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card shadow p-3">
                <h5>My Total Posts</h5>
                <h2>{{ $myPostsCount }}</h2>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-3">
                <h5>My Latest Posts</h5>
                <h2>{{ $myLatestPosts->count() }}</h2>
            </div>
        </div>
    </div>

    <div class="card shadow mt-4 p-3">
        <h4>My Recent Posts</h4>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($myLatestPosts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout.sidebar>

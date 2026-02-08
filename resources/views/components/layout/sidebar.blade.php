<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background: #212529;
            padding: 20px;
            position: fixed;
            width: 250px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 8px;
        }

        .sidebar a:hover {
            background: #343a40;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .card {
            border-radius: 15px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4 class="text-white mb-4">Blog System</h4>

        @if (auth()->user()->role == 'user')
            <a href="{{ route('user.dashboard') }}">🏠 Dashboard</a>
            <a href="{{ route('post.index') }}">📝 Posts</a>
        @endif

        @if (auth()->user()->role == 'admin')
            <a href="{{ route('admin.dashboard') }}">🏠 Dashboard</a>
            <a href="{{ route('categories.index') }}">📂 Categories</a>
        @endif

        <hr class="text-white">

        <p class="text-white">👤 {{ auth()->user()->name }}</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger w-100">Logout</button>
        </form>
    </div>

    <div class="content">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{ $slot }}

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            border-radius: 15px;
            overflow: hidden;
        }

        .login-left {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 40px;
        }

        .login-left h2 {
            font-weight: bold;
        }

        .login-right {
            padding: 40px;
            background: white;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
        }

        .btn-custom {
            border-radius: 10px;
            padding: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-10 col-sm-12">
                <div class="card shadow-lg login-card">
                    <div class="row g-0">

                        <!-- Left Side -->
                        <div class="col-md-5 d-none d-md-flex flex-column justify-content-center login-left">
                            <h2>Welcome Back 👋</h2>
                            <p class="mt-3">
                                Login to access your dashboard and manage posts & categories easily.
                            </p>
                            <p class="mt-4 small">
                                Secure Login | Laravel Blog System
                            </p>
                        </div>

                        <!-- Right Side -->
                        <div class="col-md-7 login-right">
                            <h3 class="fw-bold mb-4 text-center">Login</h3>

                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email Address</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter your email" value="{{ old('email') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter your password" required>
                                </div>

                                {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>

                                <a href="#" class="text-decoration-none small">Forgot Password?</a>
                            </div> --}}

                                <button type="submit" class="btn btn-primary w-100 btn-custom">
                                    Login
                                </button>
                            </form>

                            <div class="text-center mt-4">
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold">
                                        Register
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

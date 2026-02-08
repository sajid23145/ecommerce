<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1cc88a, #4e73df);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            border-radius: 15px;
            overflow: hidden;
        }

        .register-left {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 40px;
        }

        .register-left h2 {
            font-weight: bold;
        }

        .register-right {
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
                <div class="card shadow-lg register-card">
                    <div class="row g-0">

                        <!-- Left Side -->
                        <div class="col-md-5 d-none d-md-flex flex-column justify-content-center register-left">
                            <h2>Create Account 🚀</h2>
                            <p class="mt-3">
                                Register now to start creating posts and managing your blog system easily.
                            </p>
                            <p class="mt-4 small">
                                Secure Registration | Laravel Blog System
                            </p>
                        </div>

                        <!-- Right Side -->
                        <div class="col-md-7 register-right">
                            <h3 class="fw-bold mb-4 text-center">Register</h3>

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

                            <form action="{{ route('m.register') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Full Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter your name" value="{{ old('name') }}" required>
                                </div>

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

                                <button type="submit" class="btn btn-success w-100 btn-custom">
                                    Register
                                </button>
                            </form>

                            <div class="text-center mt-4">
                                <p class="mb-0">
                                    Already have an account?
                                    <a href="{{ route('m.login') }}" class="text-decoration-none fw-bold">
                                        Login
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

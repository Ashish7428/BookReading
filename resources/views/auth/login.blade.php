<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Book Reading</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #1e1e1e !important;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .nav-link:hover {
            color: #bb86fc !important;
        }
        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .login-card {
            background-color: #1e1e1e;
            border-radius: 10px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-title {
            color: #bb86fc;
            text-align: center;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        .login-message {
            color: #bb86fc;
            text-align: center;
            margin-bottom: 2rem;
            padding: 1rem;
            background-color: rgba(187, 134, 252, 0.1);
            border-radius: 8px;
            font-size: 0.95rem;
        }
        .form-control {
            background-color: #2d2d2d;
            border-color: #373737;
            color: #ffffff;
        }
        .form-control:focus {
            background-color: #2d2d2d;
            border-color: #bb86fc;
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(187, 134, 252, 0.25);
        }
        .form-control::placeholder {
            color: #8e8e8e;
        }
        .btn-login {
            background-color: #bb86fc;
            border-color: #bb86fc;
            color: #000000;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
        }
        .btn-login:hover {
            background-color: #a06cd5;
            border-color: #a06cd5;
            color: #000000;
        }
        .signup-link {
            color: #bb86fc;
            text-decoration: none;
        }
        .signup-link:hover {
            color: #a06cd5;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Book Reading</a>
        </div>
    </nav>

    <div class="login-container">
        <div class="login-card">
            <h2 class="login-title">Welcome Back</h2>
            
            @if(session('message'))
            <div class="login-message">
                {{ session('message') }}
            </div>
            @endif

            @if(session('error'))
            <div class="login-message" style="background-color: rgba(255, 99, 71, 0.1); color: #ff6347;">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-login mb-3">Login</button>
                <div class="text-center">
                    <p class="mb-0">Don't have an account? <a href="/signup" class="signup-link">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
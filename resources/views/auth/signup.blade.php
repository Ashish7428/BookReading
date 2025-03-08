<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Book Reading</title>
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
        .signup-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .signup-card {
            background-color: #1e1e1e;
            border-radius: 10px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .signup-title {
            color: #bb86fc;
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
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
        .btn-signup {
            background-color: #bb86fc;
            border-color: #bb86fc;
            color: #000000;
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
        }
        .btn-signup:hover {
            background-color: #a06cd5;
            border-color: #a06cd5;
            color: #000000;
        }
        .login-link {
            color: #bb86fc;
            text-decoration: none;
        }
        .login-link:hover {
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

    <div class="signup-container">
        <div class="signup-card">
            <h2 class="signup-title">Create Account</h2>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Create a password">
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm your password">
                </div>
                <button type="submit" class="btn btn-signup mb-3">Sign Up</button>
                <div class="text-center">
                    <p class="mb-0">Already have an account? <a href="/login" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading Book - Book Reading</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            min-height: 100vh;
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
        .book-container {
            padding: 2rem 0;
        }
        .book-content {
            background-color: #1e1e1e;
            border-radius: 10px;
            padding: 2rem;
            margin-top: 2rem;
        }
        .book-title {
            color: #bb86fc;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Book Reading</a>
        </div>
    </nav>

    <div class="book-container">
        <div class="container">
            <div class="book-content">
                <h1 class="book-title">Book Content</h1>
                <p>This is a protected page. You can only see this if you're logged in.</p>
                <p>Book ID: {{ $book_id }}</p>
                <!-- Book content will be added here -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
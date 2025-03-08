<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reading</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
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
        .btn-search {
            background-color: #bb86fc;
            border-color: #bb86fc;
            color: #000000;
        }
        .btn-search:hover {
            background-color: #a06cd5;
            border-color: #a06cd5;
            color: #000000;
        }
        .btn-auth-outline {
            border-color: #bb86fc;
            color: #bb86fc;
        }
        .btn-auth-outline:hover {
            background-color: #bb86fc;
            color: #000000;
        }
        .btn-auth-filled {
            background-color: #bb86fc;
            border-color: #bb86fc;
            color: #000000;
        }
        .btn-auth-filled:hover {
            background-color: #a06cd5;
            border-color: #a06cd5;
            color: #000000;
        }
        /* Book Card Styles */
        .book-card {
            background-color: #1e1e1e;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(187, 134, 252, 0.3);
        }
        .book-cover {
            width: 100%;
            height: 400px;
            object-fit: contain;
            background-color: #2d2d2d;
            padding: 10px;
        }
        .book-title {
            color: #ffffff;
            padding: 1rem;
            font-size: 1.1rem;
            text-align: center;
            margin: 0;
            background-color: #1e1e1e;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .books-section {
            padding: 2rem 0;
        }
        .section-title {
            color: #bb86fc;
            margin-bottom: 2rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Website Name -->
            <a class="navbar-brand" href="#">Book Reading</a>
            
            <!-- Hamburger menu for mobile -->
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navbar content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Categories -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fiction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Non-Fiction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Science</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">History</a>
                    </li>
                </ul>
                
                <!-- Search Bar -->
                <form class="d-flex me-2">
                    <input class="form-control me-2" type="search" placeholder="Search books..." aria-label="Search">
                    <button class="btn btn-search" type="submit">Search</button>
                </form>
                
                <!-- Authentication Buttons -->
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-auth-outline me-2">Login</a>
                    <a href="{{ route('signup') }}" class="btn btn-auth-filled">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Books Section -->
    <section class="books-section">
        <div class="container">
            <h2 class="section-title">Featured Books</h2>
            <div class="row g-4">
                <!-- Book Card 1 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 1]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img1.jpeg') }}" alt="The Lost World" class="book-cover">
                            <h3 class="book-title">The Lost World</h3>
                        </div>
                    </a>
                </div>
                <!-- Book Card 2 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 2]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img2.jpeg') }}" alt="Mystery of the Ancient Ruins" class="book-cover">
                            <h3 class="book-title">Mystery of the Ancient Ruins</h3>
                        </div>
                    </a>
                </div>
                <!-- Book Card 3 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 3]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img3.jpeg') }}" alt="The Science of Everything" class="book-cover">
                            <h3 class="book-title">The Science of Everything</h3>
                        </div>
                    </a>
                </div>
                <!-- Book Card 4 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 4]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img4.jpeg') }}" alt="Ancient Civilizations" class="book-cover">
                            <h3 class="book-title">Ancient Civilizations</h3>
                        </div>
                    </a>
                </div>
                <!-- Book Card 5 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 5]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img1.jpeg') }}" alt="The Art of Programming" class="book-cover">
                            <h3 class="book-title">The Art of Programming</h3>
                        </div>
                    </a>
                </div>
                <!-- Book Card 6 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 6]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img2.jpeg') }}" alt="Digital Marketing Essentials" class="book-cover">
                            <h3 class="book-title">Digital Marketing Essentials</h3>
                        </div>
                    </a>
                </div>
                <!-- Book Card 7 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 7]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img3.jpeg') }}" alt="Modern Architecture" class="book-cover">
                            <h3 class="book-title">Modern Architecture</h3>
                        </div>
                    </a>
                </div>
                <!-- Book Card 8 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 8]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img4.jpeg') }}" alt="Healthy Living Guide" class="book-cover">
                            <h3 class="book-title">Healthy Living Guide</h3>
                        </div>
                    </a>
                </div>
                <!-- Book Card 9 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 9]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img1.jpeg') }}" alt="World Travel Adventures" class="book-cover">
                            <h3 class="book-title">World Travel Adventures</h3>
                        </div>
                    </a>
                </div>
                <!-- Book Card 10 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ route('books.show', ['id' => 10]) }}" class="text-decoration-none">
                        <div class="book-card">
                            <img src="{{ asset('images/img2.jpeg') }}" alt="Financial Freedom" class="book-cover">
                            <h3 class="book-title">Financial Freedom</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
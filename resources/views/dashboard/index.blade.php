<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Book Reading</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        /* Stats Cards */
        .stats-section {
            padding: 2rem 0;
            background-color: #1e1e1e;
            margin-bottom: 2rem;
        }
        .stat-card {
            background-color: #2d2d2d;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            font-size: 2rem;
            color: #bb86fc;
            margin-bottom: 1rem;
        }
        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }
        .stat-label {
            color: #8e8e8e;
            font-size: 0.9rem;
        }
        /* Book Section Styles */
        .books-section {
            padding: 2rem 0;
            width: 100%;
            overflow: hidden;
        }
        .books-section .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .books-section .row {
            margin-right: -10px;
            margin-left: -10px;
        }
        .books-section .col-12 {
            padding-right: 10px;
            padding-left: 10px;
        }
        /* Book Card Styles */
        .book-card {
            background-color: #1e1e1e;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
            max-width: 220px;
            margin: 0 auto;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(187, 134, 252, 0.3);
        }
        .book-cover {
            width: 100%;
            height: 280px;
            object-fit: contain;
            background-color: #2d2d2d;
            padding: 10px;
        }
        .book-info {
            padding: 0.75rem;
            background-color: #1e1e1e;
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 60px;
        }
        .book-title {
            color: #ffffff;
            font-size: 0.9rem;
            margin: 0;
            flex-grow: 1;
            padding-right: 0.5rem;
        }
        .book-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0.5rem;
            border-top: 1px solid #373737;
        }
        .like-btn {
            color: #ff4081;
            background: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .like-btn:hover {
            transform: scale(1.1);
        }
        .like-btn i {
            font-size: 1.2rem;
            color: transparent;
            -webkit-text-stroke: 1.5px #ff4081;
            transition: all 0.2s ease;
        }
        .like-btn.liked i {
            color: #ff4081;
            -webkit-text-stroke: 1.5px #ff4081;
        }
        .like-count {
            color: #8e8e8e;
            font-size: 0.9rem;
        }
        /* User Dropdown */
        .user-dropdown .dropdown-menu {
            background-color: #2d2d2d;
            border-color: #373737;
        }
        .user-dropdown .dropdown-item {
            color: #ffffff;
        }
        .user-dropdown .dropdown-item:hover {
            background-color: #373737;
            color: #bb86fc;
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
            <a class="navbar-brand" href="/dashboard">Book Reading</a>
            
            <!-- Hamburger menu for mobile -->
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navbar content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Navigation Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            <i class="fas fa-home me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.all') }}">
                            <i class="fas fa-book me-2"></i>All Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.liked') }}">
                            <i class="fas fa-heart me-2"></i>Liked Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.reading') }}">
                            <i class="fas fa-bookmark me-2"></i>Continue Reading
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.recommended') }}">
                            <i class="fas fa-star me-2"></i>Recommended
                        </a>
                    </li>
                </ul>
                
                <!-- Search Bar -->
                <form class="d-flex me-2">
                    <input class="form-control me-2" type="search" placeholder="Search books..." aria-label="Search">
                    <button class="btn btn-search" type="submit">Search</button>
                </form>
                
                <!-- User Dropdown -->
                <div class="nav-item dropdown user-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle fa-lg me-2"></i>
                        {{ Session::get('user')['name'] }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('change.password') }}"><i class="fas fa-key me-2"></i>Change Password</a></li>
                        <li><a class="dropdown-item" href="{{ route('change.name') }}"><i class="fas fa-user-edit me-2"></i>Change Name</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="stat-card">
                        <i class="fas fa-book-reader stat-icon"></i>
                        <div class="stat-value">24</div>
                        <div class="stat-label">Hours Read</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <i class="fas fa-books stat-icon"></i>
                        <div class="stat-value">12</div>
                        <div class="stat-label">Books Completed</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <i class="fas fa-heart stat-icon"></i>
                        <div class="stat-value">35</div>
                        <div class="stat-label">Books Liked</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Books Section -->
    <section class="books-section">
        <div class="container">
            <h2 class="section-title">All Books</h2>
            <div class="row g-4">
                @foreach($books as $book)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="book-card">
                        <a href="{{ route('books.show', ['id' => $book['id']]) }}" class="text-decoration-none">
                            <img src="{{ asset('images/' . $book['image']) }}" alt="{{ $book['title'] }}" class="book-cover">
                        </a>
                        <div class="book-info">
                            <h3 class="book-title">{{ $book['title'] }}</h3>
                            <button class="like-btn {{ in_array($book['id'], $likedBooks) ? 'liked' : '' }}" 
                                    onclick="toggleLike({{ $book['id'] }}, this)" 
                                    data-book-id="{{ $book['id'] }}">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleLike(bookId, button) {
            button.classList.toggle('liked');
            
            // Send like/unlike request to server
            fetch(`/book/${bookId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the likes count in the stats section
                    const likesElement = document.querySelector('.stats-number');
                    const currentLikes = parseInt(likesElement.textContent);
                    likesElement.textContent = button.classList.contains('liked') ? 
                        currentLikes + 1 : currentLikes - 1;
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html> 
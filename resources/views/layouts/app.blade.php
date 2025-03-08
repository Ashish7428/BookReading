<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Book Reading</title>
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
            border-bottom: 1px solid #373737;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .nav-link {
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #bb86fc !important;
            background-color: #2d2d2d;
        }
        .nav-link.active {
            background-color: #2d2d2d;
            color: #bb86fc !important;
        }
        .nav-link i {
            width: 20px;
            text-align: center;
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
        .user-dropdown .dropdown-menu {
            background-color: #2d2d2d;
            border-color: #373737;
            margin-top: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .user-dropdown .dropdown-item {
            color: #ffffff;
            padding: 0.7rem 1rem;
        }
        .user-dropdown .dropdown-item:hover {
            background-color: #373737;
            color: #bb86fc;
        }
        .user-dropdown .dropdown-divider {
            border-color: #373737;
        }
        .section-title {
            color: #bb86fc;
            margin-bottom: 2rem;
            font-weight: 600;
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
        /* Like Button Styles */
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
        @yield('additional_styles')
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
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="fas fa-home me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('books.all') ? 'active' : '' }}" href="{{ route('books.all') }}">
                            <i class="fas fa-book me-2"></i>All Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('books.liked') ? 'active' : '' }}" href="{{ route('books.liked') }}">
                            <i class="fas fa-heart me-2"></i>Liked Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('books.reading') ? 'active' : '' }}" href="{{ route('books.reading') }}">
                            <i class="fas fa-bookmark me-2"></i>Continue Reading
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('books.recommended') ? 'active' : '' }}" href="{{ route('books.recommended') }}">
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

    @yield('content')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html> 
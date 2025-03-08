<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    private $books = [
        ['id' => 1, 'title' => 'The Lost World', 'image' => 'img1.jpeg'],
        ['id' => 2, 'title' => 'Mystery of the Ancient Ruins', 'image' => 'img2.jpeg'],
        ['id' => 3, 'title' => 'The Science of Everything', 'image' => 'img3.jpeg'],
        ['id' => 4, 'title' => 'Ancient Civilizations', 'image' => 'img4.jpeg'],
        ['id' => 5, 'title' => 'The Art of Programming', 'image' => 'img1.jpeg'],
        ['id' => 6, 'title' => 'Digital Marketing Essentials', 'image' => 'img2.jpeg'],
        ['id' => 7, 'title' => 'Modern Architecture', 'image' => 'img3.jpeg'],
        ['id' => 8, 'title' => 'Healthy Living Guide', 'image' => 'img4.jpeg'],
        ['id' => 9, 'title' => 'World Travel Adventures', 'image' => 'img1.jpeg'],
        ['id' => 10, 'title' => 'Financial Freedom', 'image' => 'img2.jpeg'],
    ];

    public function index()
    {
        $user = Session::get('user');
        
        // Get user's liked books from session
        $likedBooks = Session::get('liked_books', []);
        
        return view('dashboard.index', [
            'user' => $user,
            'books' => $this->books,
            'likedBooks' => $likedBooks,
            'totalLikes' => count($likedBooks)
        ]);
    }

    public function toggleLike($id)
    {
        $likedBooks = Session::get('liked_books', []);
        
        if (in_array($id, $likedBooks)) {
            // Unlike the book
            $likedBooks = array_diff($likedBooks, [$id]);
        } else {
            // Like the book
            $likedBooks[] = $id;
        }
        
        Session::put('liked_books', $likedBooks);
        
        return response()->json([
            'success' => true,
            'totalLikes' => count($likedBooks)
        ]);
    }
} 
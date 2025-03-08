<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class BookController extends Controller
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
        return view('books.index', [
            'books' => $this->books,
            'likedBooks' => Session::get('liked_books', [])
        ]);
    }

    public function show($id)
    {
        $book = collect($this->books)->firstWhere('id', $id);
        return view('books.read', ['book' => $book]);
    }

    public function liked()
    {
        $likedBooks = Session::get('liked_books', []);
        $books = collect($this->books)->filter(function($book) use ($likedBooks) {
            return in_array($book['id'], $likedBooks);
        });

        return view('books.liked', [
            'books' => $books,
            'likedBooks' => $likedBooks
        ]);
    }

    public function reading()
    {
        // For demo, showing last 3 books as "continue reading"
        $readingBooks = collect($this->books)->take(3);
        
        return view('books.reading', [
            'books' => $readingBooks,
            'likedBooks' => Session::get('liked_books', [])
        ]);
    }

    public function recommended()
    {
        // For demo, showing last 4 books as "recommended"
        $recommendedBooks = collect($this->books)->take(4);
        
        return view('books.recommended', [
            'books' => $recommendedBooks,
            'likedBooks' => Session::get('liked_books', [])
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
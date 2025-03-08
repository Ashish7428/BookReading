@extends('layouts.app')

@section('title', 'All Books')

@section('content')
<div class="container mt-4">
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
@endsection

@section('scripts')
<script>
    function toggleLike(bookId, button) {
        button.classList.toggle('liked');
        
        fetch(`/book/${bookId}/like`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                button.classList.toggle('liked');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            button.classList.toggle('liked');
        });
    }
</script>
@endsection 
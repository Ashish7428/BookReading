@extends('layouts.app')

@section('title', 'Liked Books')

@section('content')
<div class="container mt-4">
    <h2 class="section-title">Books You've Liked</h2>
    @if($books->isEmpty())
        <div class="text-center mt-5">
            <i class="fas fa-heart text-muted" style="font-size: 4rem;"></i>
            <h3 class="mt-3 text-muted">No liked books yet</h3>
            <p class="text-muted">Start exploring and like the books you enjoy!</p>
            <a href="{{ route('books.all') }}" class="btn btn-search mt-3">Browse Books</a>
        </div>
    @else
        <div class="row g-4">
            @foreach($books as $book)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="book-card">
                    <a href="{{ route('books.show', ['id' => $book['id']]) }}" class="text-decoration-none">
                        <img src="{{ asset('images/' . $book['image']) }}" alt="{{ $book['title'] }}" class="book-cover">
                    </a>
                    <div class="book-info">
                        <h3 class="book-title">{{ $book['title'] }}</h3>
                        <button class="like-btn liked" 
                                onclick="toggleLike({{ $book['id'] }}, this)" 
                                data-book-id="{{ $book['id'] }}">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
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
            if (data.success) {
                // Remove the book card after a short delay
                setTimeout(() => {
                    button.closest('.col-12').remove();
                    // Check if there are no more books
                    if (document.querySelectorAll('.book-card').length === 0) {
                        location.reload();
                    }
                }, 300);
            } else {
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
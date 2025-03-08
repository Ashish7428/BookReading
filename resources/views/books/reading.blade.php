@extends('layouts.app')

@section('title', 'Continue Reading')

@section('content')
<div class="container mt-4">
    <h2 class="section-title">Continue Reading</h2>
    @if($books->isEmpty())
        <div class="text-center mt-5">
            <i class="fas fa-book-reader text-muted" style="font-size: 4rem;"></i>
            <h3 class="mt-3 text-muted">No books in progress</h3>
            <p class="text-muted">Start reading some amazing books!</p>
            <a href="{{ route('books.all') }}" class="btn btn-search mt-3">Browse Books</a>
        </div>
    @else
        <div class="row g-4">
            @foreach($books as $book)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="book-card">
                    <a href="{{ route('books.show', ['id' => $book['id']]) }}" class="text-decoration-none">
                        <img src="{{ asset('images/' . $book['image']) }}" alt="{{ $book['title'] }}" class="book-cover">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ rand(10, 90) }}%"></div>
                        </div>
                    </a>
                    <div class="book-info">
                        <div>
                            <h3 class="book-title">{{ $book['title'] }}</h3>
                            <small class="text-muted">Last read: {{ now()->subDays(rand(1, 7))->diffForHumans() }}</small>
                        </div>
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
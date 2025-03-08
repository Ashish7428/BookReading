@extends('layouts.app')

@section('title', 'Recommended Books')

@section('content')
<div class="container mt-4">
    <h2 class="section-title">Recommended for You</h2>
    <div class="row g-4">
        @foreach($books as $book)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="book-card">
                <div class="recommendation-badge">
                    <i class="fas fa-star"></i>
                    {{ rand(85, 98) }}% Match
                </div>
                <a href="{{ route('books.show', ['id' => $book['id']]) }}" class="text-decoration-none">
                    <img src="{{ asset('images/' . $book['image']) }}" alt="{{ $book['title'] }}" class="book-cover">
                </a>
                <div class="book-info">
                    <div>
                        <h3 class="book-title">{{ $book['title'] }}</h3>
                        <small class="text-muted">Based on your reading history</small>
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
</div>
@endsection

@section('additional_styles')
<style>
    .recommendation-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(187, 134, 252, 0.9);
        color: #000;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 1;
    }
    .recommendation-badge i {
        color: #FFD700;
        margin-right: 4px;
    }
</style>
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
@extends('layouts.app')

@section('title', 'Change Name')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4 section-title">Change Name</h2>
                    
                    @if(session('success'))
                    <div class="alert alert-success bg-success bg-opacity-25 text-success border-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger bg-danger bg-opacity-25 text-danger border-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('change.name.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="current_name" class="form-label">Current Name</label>
                            <input type="text" class="form-control" id="current_name" value="{{ Session::get('user')['name'] }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="new_name" class="form-label">New Name</label>
                            <input type="text" class="form-control" id="new_name" name="name" required 
                                   minlength="3" maxlength="50" placeholder="Enter your new name">
                            <div class="form-text text-muted">
                                Name should be between 3 and 50 characters
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-search">Update Name</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_styles')
<style>
    .card {
        border-color: #373737;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .form-label {
        color: #bb86fc;
    }
    .form-text {
        color: #8e8e8e !important;
    }
    input:disabled {
        background-color: #1e1e1e !important;
        border-color: #373737 !important;
        color: #8e8e8e !important;
    }
</style>
@endsection 
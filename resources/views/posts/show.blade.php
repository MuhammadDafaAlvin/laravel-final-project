@extends('layouts.app')
@section('title', 'Detail Post')
@section('content')

<div class="container mt-5">
    <div class="card shadow-lg">
        <h1 class="text-center mb-4">Detail Post</h1>
        <div class="card-header text-center">
            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Post" class="img-fluid rounded" style="max-width: 100%; max-height: 400px; object-fit: cover;">
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text"><strong>Slug:</strong> {{ $post->slug }}</p>
            <p class="card-text">
                <strong>Status:</strong>
                <span class="badge 
                    @if($post->status == 'publish') bg-success @else bg-warning @endif">
                    {{ ucfirst($post->status) }}
                </span>
            </p>
            <p><strong>Content:</strong></p>
            <p>{{ $post->content }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali ke Daftar Post</a>
        </div>
    </div>
</div>
@endsection
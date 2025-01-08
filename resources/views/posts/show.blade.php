@extends('layouts.app')
@section('title', 'Detail Post')
@section('content')

<div class="container mt-4">
    <div class="card">
        <h1 class="text-center mb-4 pt-4">Detail Post</h1>
        <div class="card-header text-center">
            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Post" class="img-fluid rounded" style="max-width: 100%; max-height: 400px; object-fit: cover;">
        </div>
        <div class="card-body p-4">
            <h3 class="card-title">{{ $post->title }}</h3>
            <p class="card-text"><strong>Slug:</strong>
                <a href="{{ url($post->slug) }}" target="_blank" class="text-primary">
                    {{ $post->slug }}
                </a>
            </p>
            <p class="card-text">
                <strong>Status:</strong>
                <span class="badge p-2
                    @if($post->status == 'publish') bg-success @else bg-warning @endif">
                    {{ ucfirst($post->status) }}
                </span>
            </p>
            <p class="card-text"><strong>Hits:</strong> {{ number_format($post->hits, 0, ',', '.') }}</p>
            <p><strong>Content:</strong></p>
            <p>{{ $post->content }}</p>
            <div class="text-center">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali ke Daftar Post</a>
            </div>
        </div>
    </div>
</div>
@endsection
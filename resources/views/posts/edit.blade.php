@extends('layouts.app')
@section('content')

<div class="container pt-4">
    <h1 class="text-center mb-4">Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $post->slug) }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Lama</label><br>
            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar" style="width: 100px; height: auto;"><br>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ganti Gambar</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="publish" {{ old('status', $post->status) === 'publish' ? 'selected' : '' }}>Publish</option>
                <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>
        <div class="d-flex my-4 gap-3">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
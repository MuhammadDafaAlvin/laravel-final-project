@extends('layouts.app')
@section('title', 'Tambah Post')
@section('content')

<div class="container pt-4">
    <h1 class="text-center mb-4">Tambah Post</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">ID User</label>
            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ old('user_id') }}" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="publish" {{ old('status') === 'publish' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="aktif" class="form-label">Aktif</label>
            <select name="aktif" id="aktif" class="form-select" required>
                <option value="1" {{ old('aktif') === '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('aktif') === '0' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <div class="d-flex my-4 gap-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
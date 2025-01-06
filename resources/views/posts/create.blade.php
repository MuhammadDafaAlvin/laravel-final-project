@extends('layouts.app')

@section('title', 'Tambah Post')

@section('content')
<h1>Tambah Post</h1>
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Konten</label>
        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Gambar</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="publish">Publish</option>
            <option value="draft">Draft</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="aktif" class="form-label">Aktif</label>
        <select name="aktif" id="aktif" class="form-select">
            <option value="Y">Ya</option>
            <option value="N">Tidak</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Daftar Post</h1>

    @if($posts->isEmpty())
    <p class="text-center">Belum ada data post.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->status }}</td>
                <td>
                    <a href="#" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
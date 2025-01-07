@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center pt-4">Daftar Post</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary my-4">Tambah</a>

    @if($posts->isEmpty())
    <p class="text-center">Belum ada data post.</p>
    @else

    <table class="table p-3 align-middle text-center table-bordered">
        <thead class="text-center ">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Konten</th>
                <th>Gambar</th>
                <th>Status</th>
                <th style="width: 15%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}" style="width: 100px; height: auto;">
                </td>
                <td>{{ $post->status }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>

                    <script>
                        function confirmDelete(event) {
                            event.preventDefault();
                            Swal.fire({
                                title: 'Apakah Anda yakin?',
                                text: 'Post ini akan dihapus secara permanen!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, Hapus!',
                                cancelButtonText: 'Batalin'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    event.target.submit();
                                }
                            });
                        }
                    </script>
                </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
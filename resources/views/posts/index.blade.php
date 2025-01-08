@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center pt-4">Daftar Post</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary my-4">Tambah</a>

    @if($posts->isEmpty())
    <p class="text-center">Belum ada data post.</p>
    @else

    <table class="table p-3 align-middle text-center table-bordered">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th style="width: 20%;">Slug</th>
                <th>Gambar</th>
                <th>Konten</th>
                <th>Aktif</th>
                <th>Status</th>
                <th style="width: 20%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    <a href="{{ url($post->slug) }}" class="text-primary" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $post->slug }}">
                        {{ $post->slug }}
                    </a>
                </td>
                <td>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}" style="width: 100px; height: auto;">
                </td>
                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    {{ $post->content }}
                    @if(strlen($post->content) > 100)
                    <i class="fas fa-ellipsis-h" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="Konten lebih panjang..."></i>
                    @endif
                </td>
                <td>
                    <span class="badge {{ $post->aktif === 'Y' ? 'bg-success px-4 py-2' : 'bg-warning text-dark px-3 py-2' }}">
                        {{ $post->aktif === 'Y' ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td>{{ $post->status }}</td>

                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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

    <script>
        let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    @endif
</div>
@endsection
<?php

namespace App\Http\Controllers;

use App\Models\TblPost;
use Illuminate\Http\Request;

class TblPostController extends Controller
{
    public function index()
    {
        $posts = TblPost::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        TblPost::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show(TblPost $tblPost)
    {
        //
    }

    public function edit($id)
    {
        $post = TblPost::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $post = TblPost::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $post = TblPost::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }
}

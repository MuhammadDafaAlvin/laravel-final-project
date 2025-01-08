<?php

namespace App\Http\Controllers;

use App\Models\TblPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TblPostController extends Controller
{
    public function index()
    {
        $posts = TblPost::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $posts = TblPost::all();
        return view('posts.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:tbl_posts,slug',
            'status' => 'required|in:publish,draft',
            'content' => 'required|string',
            'hits' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'aktif' => 'required|in:Y,N',
            'user_id' => 'required|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts_images', 'public');
        }

        TblPost::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
            'content' => $request->content,
            'hits' => $request->hits,
            'image' => $imagePath ?? 'Noimage.jpg',
            'aktif' => $request->aktif,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan.');
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
            'slug' => 'required|string|max:255|unique:tbl_posts,slug,' . $id,
            'content' => 'required|string',
            'hits' => 'required|integer|min:0',
            'aktif' => 'required|in:Y,N',
            'status' => 'required|in:publish,draft',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = TblPost::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($post->image && Storage::exists('public/' . $post->image)) {
                Storage::delete('public/' . $post->image);
            }
            $imagePath = $request->file('image')->store('posts_images', 'public');
        } else {
            $imagePath = $post->image;
        }

        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'aktif' => $request->aktif,
            'hits' => $request->hits,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function show($id)
    {
        $post = TblPost::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = TblPost::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }
}

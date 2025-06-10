<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // Eager load relasi user, comments.user, likes, likedByUsers
        $posts = Post::with(['user', 'comments.user', 'likes', 'likedByUsers'])
            ->latest()
            ->paginate(10);

        return view('home.homeindex', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/posts', $filename);
            $validated['image'] = $filename;
        }

        $validated['user_id'] = Auth::id();
        Post::create($validated);

        return redirect()->route('home.homeindex')->with('success', 'Post created successfully');
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete('posts/' . $post->image);
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/posts', $filename);
            $validated['image'] = $filename;
        }

        $post->update($validated);

        return redirect()->route('home.homeindex')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        if ($post->image) {
            Storage::disk('public')->delete('posts/' . $post->image);
        }

        $post->delete();

        return redirect()->route('home.homeindex')->with('success', 'Post deleted successfully');
    }

    // Method toggle like/unlike via AJAX
    public function toggle(Post $post)
    {
        $user = Auth::user();

        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            // Jika sudah like, hapus (unlike)
            $like->delete();
            $liked = false;
        } else {
            // Jika belum like, buat like baru
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
            $liked = true;
        }

        // Hitung ulang total likes terbaru
        $likesCount = $post->likes()->count();

        return response()->json([
            'liked' => $liked,
            'likesCount' => $likesCount,
        ]);
    }
}

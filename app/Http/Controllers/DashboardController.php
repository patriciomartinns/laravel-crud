<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::query()->latest()->get();

        return Inertia::render('Dashboard', [
            'posts' => $posts,
            'title' => 'Meus posts'
        ]);
    }

    public function create()
    {
        return Inertia::render('PostCreate');
    }

    public function store(StorePostRequest $request)
    {
        Post::query()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return back();
    }

    public function edit(Post $post)
    {
        return Inertia::render('DashboardEdit', [
            'post' => $post
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return to_route('dashboard');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return back();
    }
}

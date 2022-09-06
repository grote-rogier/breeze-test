<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(): Collection
    {
        return Post::with('user:id,name')->get();
    }

    public function store(PostRequest $request): Post
    {
        $post = new Post($request->validated());
        $post->user()->associate(auth()->id());
        $post->save();

        return $post;
    }

    public function show(Post $post): Post
    {
        return $post->load('user:id,name');
    }

    public function edit(Post $post): Post
    {
        $this->authorize('update', $post);

        return $post->load('user:id,name');
    }

    public function update(PostRequest $request, Post $post): Post
    {
        $this->authorize('update', $post);

        $post->update($request->validated());

        return $post;
    }

    public function destroy(Post $post): bool
    {
        $this->authorize('delete', $post);

        return $post->delete();
    }
}

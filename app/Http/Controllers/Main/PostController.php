<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(6);
        return view('main.post.index', ['posts' => $posts ]);
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('main.post.show', ['post' => $post]);
    }

    public function comment($id, CommentRequest $request)
    {
        $post = Post::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect(route('post.show', $id));
    }
}

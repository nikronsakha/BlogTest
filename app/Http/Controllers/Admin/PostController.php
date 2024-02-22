<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRequest;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Post;
use App\Service\Admin\PostService;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.index', ['posts' => $posts ]);
    }

    public function create()
    {
        return view('admin.create',);
    }


    public function store(StoreRequest $request , PostService $service)
    {
        $data = $request->validated();
        $service->store($data,$request);

        return redirect(route('admin.posts.index' ));
    }


    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view( 'admin.create',['post' => $post]);
    }

    public function edit(string $id)
    {

        $post = Post::findOrFail($id);
        return view( 'admin.edit',['post' => $post]);

    }

    public function update(UpdateRequest $request, string $id , PostService $service)
    {
        $post = Post::findOrFail($id);
        $data = $request->validated();
        $service->update($data,$request,$post);

        return redirect(route('admin.posts.index',));
    }

    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect(route('admin.posts.index',));
    }
}

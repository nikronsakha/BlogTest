<?php

namespace App\Service\Admin;

use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService
{

    public function store($data, StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $data['thumbnail'] = str_replace('public/posts', '', $request->file('thumbnail')->store('public/posts'));
            $post = Post::create($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }

    public function update($data, UpdateRequest $request, $post)
    {
        try {
            DB::beginTransaction();
            if ($request->has('thumbnail')) {
                $thumbnail = str_replace('public/posts', '', $request->file('thumbnail')->store('public/posts'));
                $data['thumbnail'] = $thumbnail;
            };
            $post->update($data);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
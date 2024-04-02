<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return view('main.main', ['posts' => $posts ]);
    }
}

<?php

namespace App\Http\Controllers;

// use App\Post;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostCollection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'data.attributes.body' => '',
        ]);

        // dd($data);

        $post = request()->user()->posts()->create($data['data']['attributes']);

        return new PostResource($post);
    }

    public function index()
    {
        // return new PostCollection(Post::all());
        return new PostCollection(request()->user()->posts);
    }
}

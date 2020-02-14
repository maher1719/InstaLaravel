<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    //
    public function create()
    {
        return view("posts.create");
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        Post::create($data);
        dd(request()->all());
        //return view("posts.create");
    }

}

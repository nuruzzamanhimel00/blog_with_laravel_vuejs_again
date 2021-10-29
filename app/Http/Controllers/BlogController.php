<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function singlePostById($id){

        $post = Post::with(['category','user'])->find($id);
        return response()->json([
            'post' => $post
        ]);
    }
}

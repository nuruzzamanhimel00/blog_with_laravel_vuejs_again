<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function singlePostById($id){

        // $post = Post::with(['category','user'])->find($id);
        $post = Post::with(['category','user'])->where('id',$id)->get();
        return response()->json([
            'post' => $post
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
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

    public function getAllPost(){
        $posts = Post::with(['category','user'])->orderBy('id','desc')->get();
        return response()->json([
            'posts' => $posts
        ]);
        // return $posts;

    }

    public function getAllCategory(){

        $category = Category::withCount(['posts'])->orderBy('id','desc')->get();

        return response()->json([
            'category' => $category
        ]);
    }

}

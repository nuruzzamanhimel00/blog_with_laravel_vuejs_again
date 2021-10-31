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

    public function getPostByCatid($id){
        $posts = Post::with(['category','user'])->where('cat_id',$id)->orderBy('id','desc')->get();
        return response()->json([
            'posts' => $posts
        ]);
        // dd($id);
    }

    public function getLatestPost(){
        $posts = Post::with(['category','user'])->orderBy('id','desc')->take(5)->get();
        return response()->json([
            'posts' => $posts
        ]);
    }

    public function readsearch(Request $request){
        $search = $request->search;

        if(!is_null($search)){
            $posts = Post::with(['user','category'])
        ->where('title','like',"%".$search."%")
        ->orWhere('description','like',"%".$search."%")
        ->orderBy('id','desc')
        ->get();
        }else{
            $posts = Post::with(['user','category'])
        ->orderBy('id','desc')
        ->get();
        }
        return response()->json([
            'posts' => $posts
        ]);
        // dd($request->all());
    }

}

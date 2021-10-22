<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:web');
    }


    public function index(){
        $posts = Post::with(['category','user'])->get();
        return $posts;



    }


}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Image;
use File;

class PostController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:web');
    }


    public function index(){
        $posts = Post::with(['category','user'])->orderBy('id','desc')->get();
        return response()->json([
            'posts' => $posts
        ]);
        // return $posts;

    }

    public function postByid($id){
        $posts = Post::with(['category','user'])->find($id);
        return response()->json([
            'posts' => $posts
        ]);
        // return $posts;
        // dd($id);
    }

    public function updatePost(Request $request,$id){

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'cat_id' => 'required',
            'user_id' => 'required',
            'photo' => 'required',
        ]);

        $posts = Post::find($id);

        if($posts->photo != $request->photo){

            $str_pos = strpos($request->photo,';');
            $string = substr($request->photo,0,$str_pos);
            $get_extention = substr(strrchr($string,'/'),1);

            $image_name = rand().".".$get_extention;
            $image_save = public_path('assets/images/'.$image_name);

            // dd($image_save);

            // read image from temporary file
            $img = Image::make($request->photo);
            $img->save($image_save);

            // old image delte
            $existing_image_url = public_path('assets/images/'.$posts->photo);
            if(file_exists($existing_image_url)){
                File::delete($existing_image_url);
            }

            $posts->update([
                'title' => $request->title,
                'description' => $request->description,
                'cat_id' => $request->cat_id,
                'user_id' => $request->user_id,
                'photo' => $image_name,
            ]);



            // dd($str_pos , $string, $get_extention, $request->photo);



        }else{
            $posts->update([
                'title' => $request->title,
                'description' => $request->description,
                'cat_id' => $request->cat_id,
                'user_id' => $request->user_id,
            ]);
        }

        return response()->json([
            'status' => 'success'
        ]);
        // dd($request->all() , $id);
    }

    public function postDelete($id){

        $posts = Post::find($id);

        // old image delte
        $existing_image_url = public_path('assets/images/'.$posts->photo);
        if(file_exists($existing_image_url)){
            File::delete($existing_image_url);
        }


        if($posts->delete()){
            return response()->json([
                'status' => 'success'
            ]);
        }

        // dd($id);
    }


}

<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:web');
    }

    public function addCategory(Request $request){

        $this->validate($request, [
            'cat_name' => 'required|string',

            ],[
                'cat_name.required' => "Category field name is required",
            ]
        );

        $category = Category::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Category Created Successfully'
        ]);

        return $category;

    }

    public function getAllCategory(){

        $category = Category::get();

        return response()->json([
            'category' => $category
        ]);
    }




}

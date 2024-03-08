<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categorypost(Request $request)
    {

       $validatedData = $request->validate([
       
           'name' =>'required|string',
           'status' => 'required',
           

       ]);


       $categoryPost = new Category();
       $categoryPost->name = $validatedData['name'];
       $categoryPost->status = $validatedData['status'];

       $categoryPost->save();

       return response()->json(['message' => 'Category post created successfully'], 200);

    }
}

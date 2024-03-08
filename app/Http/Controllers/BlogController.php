<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function blogpost(Request $request)
    {
       
        
        Blog::create($request->all());
       
        return response()->json(['message' => 'Blog post created successfully'], 200);
    }

    public function blogdetails(Request $request)
    {
        
        $blogs = Blog::find(1);
        return response()->json($blogs);
    }

    public function blogupdate(Request $request, $id)
    {
        
        $this->blogValidation($request);

        // Find the blog post by ID
        $blog = Blog::find($id);

        if ($blog) {
            $blog->update($request->all());

            return response()->json(['message' => 'Blog updated successfully']);
        } else {
            return response()->json(['message' => 'Blog not found'], 404);
        }

    }

    private function blogValidation($request)
    {
        $validatedData =  Validator::make($request->all(),[
            'category_id' => 'required',
            'title' => 'required',
            'image' => 'required',  
            'reading_time' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
    
        if($validatedData->fails()){
    
            return response()->json(['status' => false , 'message' => 'validation failed', 'data' => $validatedData->errors()]);
        }
    }

    public function blogdelete(Request $request, $id){
        
        $this->blogValidation($request);
    
        
        $blog = Blog::find($id);
    
        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }
        
        $blog->delete();
    
        // Return a JSON response indicating success
        return response()->json(['message' => 'Blog deleted successfully']);
    }
    

}


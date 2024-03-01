<?php

namespace App\Http\Controllers;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function emailpost(Request $request)
    {
        
       
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
            'status' => 'required',
        ]);

       
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $subscriber = new Newsletter();
        $subscriber->email = $request->input('email');
        $subscriber->status = $request->input('status');

      
        $subscriber->save();

     
        return response()->json(['message' => 'Subscriber added successfully'], 201);
    }

    public function getemail(){
      
        $newsletter = Newsletter::first();
        return response()->json($newsletter);
 
    }

    public function deleteemail($id){

        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        return response()->json($newsletter);
        
    }
}

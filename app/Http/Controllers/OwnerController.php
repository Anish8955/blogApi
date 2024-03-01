<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
class OwnerController extends Controller
{
    public function index()
    {
        $owner = Owner::find(1);
        return response()->json($owner);
    }

    public function ownerpost(Request $request)
{
    
    $data = $request->all();

    
    $owner = Owner::find(1);

    if ($owner) {
        
        $owner->update([
            'name' => $data['name'], 
            'image' => $data['image'], 
            'bio' => $data['bio'], 
            'instagram' => $data['instagram'], 
            'linkdin' => $data['linkdin'], 
        ]);

        return response()->json(['message' => 'Owner updated successfully']);
    } else {
        return response()->json(['message' => 'Owner not found'], 404);
    }
}

}

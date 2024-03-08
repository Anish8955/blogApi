<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $table = 'blogs'; 
   
    protected $fillable = ['category_id','title', 'image', 'reading_time', 'description', 'status ']; 
}

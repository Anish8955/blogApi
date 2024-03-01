<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners'; 
    protected $fillable = ['name', 'image', 'bio', 'instagram', 'linkedin']; 
}

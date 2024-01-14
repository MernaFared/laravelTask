<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExploreItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['image', 
    'title', 
    'rating', 
    'price', 
    'description',
    'is_featured'];

}
 

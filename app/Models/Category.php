<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable=[
        'name',
        'slug',
        'status',
        'meta_keyword',
        'meta_description',
        'meta_title',
        'image',
        'description',
        
    ];
}

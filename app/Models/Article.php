<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'Articles';
    protected $fillable = ['title', 'description', 'author', 'image', 'created_at'];
}

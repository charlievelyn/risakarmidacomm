<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'Team';
    protected $fillable = ['name', 'position', 'description', 'image_path'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingEvents extends Model
{
    protected $table = 'training_events';
    protected $fillable = ['path', 'title', 'description'];
}

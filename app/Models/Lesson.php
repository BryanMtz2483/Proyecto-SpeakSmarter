<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $guarded = [];

    public function categories (){
        return $this->belongsToMany(Category::class);
    }
    public function levels (){
        return $this->belongsTo(Level::class);
    }
}

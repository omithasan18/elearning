<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'image',
        'short_description',
        'lession_count',
        'course_for',
        'course_time',
    ];
}

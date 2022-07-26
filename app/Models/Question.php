<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'course_id',
        'question',
        'slug',
        'mark',
        'answer',
        'option_one',
        'option_two',
        'option_three',
        'option_four',
        'status',
    ];
    
    
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}

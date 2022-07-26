<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'page_category_id',
        'name',
        'slug',
        'image',
        'status',
        'long_description',
    ];
    
    public function pagecategory()
    {
        return $this->belongsTo(PageCategory::class, 'page_category_id', 'id');
    }
}

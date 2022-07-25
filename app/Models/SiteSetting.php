<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'favicon',
        'meta_image',
        'phone',
        'copyright',
        'meta_title',
        'keyword',
        'description',
        'address',
        'icon',
        'link',
    ];
}

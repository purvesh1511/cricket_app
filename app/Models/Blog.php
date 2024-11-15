<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'contents',
        'thumbnail',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];
}

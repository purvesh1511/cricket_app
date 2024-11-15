<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    use HasFactory;
    protected $table = 'cms';
    const CREATED_AT = 'page_published';
    const UPDATED_AT = 'page_modified';
    protected $fillable = [
        'page_name',
        'page_description',
        'page_image',
        'page_type',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'slug',
        'page_status',
        'status'
    ];
}

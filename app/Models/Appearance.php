<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'type',
        'title',
        'custom_link',
        'page_id',
        'slug'
    ];
}

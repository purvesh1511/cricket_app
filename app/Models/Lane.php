<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lane extends Model
{
    use HasFactory;
    public $table = "lane";
    public $timestamps = false;
    
    protected $fillable = [
        'lane_name',
        'lane_price',
        'status',
        'created_at',
        'updated_at'
    ];
}

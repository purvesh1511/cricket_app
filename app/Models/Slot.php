<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    public $table = "slot_master";
    public $timestamps = false;
    
    protected $fillable = [
        'slot_name',
        'status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'variation_type',
        'variation',
        'price',
        'discount',
        'stock'
    ];

    public function galleries() : HasMany {
        return $this->hasMany(Gallery::class,'stock_id');
    }
}

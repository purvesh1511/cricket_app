<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'title',
        'sku',
        'description',
        'status',
        'priority'
    ];

    public function variations(): HasMany {
        return $this->hasMany(Variation::class,'product_id');
    }

    public function stocks(): HasMany {
        return $this->hasMany(Stock::class,'product_id');
    }

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class,'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    public $table = "cart";
    public $timestamps = false;
    protected $fillable = [
        'session_id',
        'customer_id',
        'slot_id',
        'lane_id',
        'select_date'
    ];
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function stock(): BelongsTo {
        return $this->belongsTo(Stock::class,'stock_id');
    }
}

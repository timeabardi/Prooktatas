<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Cart;

class CartProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'unit_price',
    ];
    public function cart() {
        return $this->belongsTo(Cart::class);
    }
    public function product() {
        return $this->hasOne(Product::class);
    }
}
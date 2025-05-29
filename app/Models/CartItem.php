<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = "cart_items";
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'cart_id',
        'quantity',
        'isLike',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'isLike' => 'boolean'
        ];
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

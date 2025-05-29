<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that point to table
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'weight',
        'price',
        'discount_price',
        'image_url'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'weight' => 'float',
            'price' => 'integer',
            'discount_price' => 'integer',
            'image_url' => 'string'
        ];
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
}

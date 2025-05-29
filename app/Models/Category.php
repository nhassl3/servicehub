<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description',
        'price',
        'file_url',
        'discount_price',
        'weight',
        'unity_weight'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = $model->generateSlug($model->name);
        });
    }

    public function generateSlug($name)
    {
        $slug = self::transliterate($name);

        // Проверяем на уникальность
        $originalSlug = $slug;
        $count = 1;

        while (self::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}

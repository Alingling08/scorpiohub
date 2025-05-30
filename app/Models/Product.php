<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'sku',
        'category',
        'stock',
        'is_active',
        'image',
        'feature_id',
        'user_id'
    ];

    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function feature()
    {
        return $this->belongsTo(Features::class);
    }
}

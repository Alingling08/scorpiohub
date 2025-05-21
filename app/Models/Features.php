<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{

    protected $fillable = [
        'name',
        'description',
        'highlight',
        'is_active'
    ];


    /** @use HasFactory<\Database\Factories\FeaturesFactory> */
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

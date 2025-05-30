<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['email'];

    /** @use HasFactory<\Database\Factories\SubscriberFactory> */
    use HasFactory;
}

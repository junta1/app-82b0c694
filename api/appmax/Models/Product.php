<?php

namespace AppMax\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'sku',
        'quantity'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

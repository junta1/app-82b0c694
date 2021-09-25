<?php

namespace AppMax\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMoviment extends Model
{
    use HasFactory;

    protected $table = 'product_moviment';

    protected $fillable = [
        'sku',
        'quantity',
        'moviment'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = 'order_products';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'cost',
        'discount',
        'discount_type',
        'paid_total',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
}

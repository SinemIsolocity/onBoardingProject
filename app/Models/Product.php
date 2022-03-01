<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    // 1. Same feedback as in Inventory.php
    
    
    protected $fillable = [
        'name',
        'identification',
        'batch_number',
        'quantity',
        'price',
        'cost',
        'reorder_point',
        'active',
        'description'
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}

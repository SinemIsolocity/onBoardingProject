<?php


namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    
    // 1. Same feedback as in Inventory.php
    
    
    protected $fillable = [
        'product_id',
        'name',
        'original_name',
        'mime_type',
        'size'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

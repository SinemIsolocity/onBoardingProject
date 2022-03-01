<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    
    
    // 1. It is always good to Implement SoftDeletes Trait
    
    
    protected $fillable = [
        'product_id',
        'batch',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

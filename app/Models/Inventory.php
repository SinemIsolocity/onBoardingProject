<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
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

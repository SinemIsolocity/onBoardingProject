<?php


namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
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

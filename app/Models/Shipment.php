<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'product_id',
        'order_id',
        'shipment_number',
        'shipment_date',
        'tracking_details',
        'note',
        'status'
    ];
    protected $casts = [
        'shipment_date' => 'datetime:Y-m-d'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

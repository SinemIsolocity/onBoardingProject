<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'identification',
        'purchase_order_number',
        'order_date',
        'request_shipment_date',
        'actual_arrival_date',
        'note',
        'status'
    ];

   /*  protected $hidden = [
        'product_id', 'identification', 'created_at' //These items are hidden in resources json object.
    ]; */

    protected $casts = [
        'order_date' => 'datetime:Y-m-d',
        'request_shipment_date' => 'datetime:Y-m-d',
        'actual_arrival_date' => 'datetime:Y-m-d',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function shipment()
    {
        return $this->hasOne(Shipment::class);
    }
   

}

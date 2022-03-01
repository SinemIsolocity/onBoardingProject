<?php

namespace App\Http\Resources;

use App\Http\Resources\ShipmentResource;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    
    
    // 1. Looks Good!!
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'identification' => $this->identification,
            'order_date_details'=> "Order Date: " . $this->order_date . " Request order date: " . $this->request_order_date . " Actual arrival date: " . $this->actual_arrival_date,
            'purchase_order_number' => $this->purchase_order_number,
            'note' => $this->note,
            'status' => $this->order,
            'order_detail' => url('api/order/'. $this->id .'/'),
            //'shipment' => ShipmentResource::collection($this->shipment),
        ];
    }
}

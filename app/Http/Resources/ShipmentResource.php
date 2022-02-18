<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'order_details'=> "Product Id: " . $this->product_id . " Order Id: " . $this->order_id . "Shipment_number: " . $this->shipment_number,
            'shipment_date' => $this->shipment_date,
            'tracking_details' => $this->tracking_details,
            'status' => $this->status,
            'order_detail' => url('api/order/'. $this->id .'/'),
            'note' => $this->note
        ];
    }
}

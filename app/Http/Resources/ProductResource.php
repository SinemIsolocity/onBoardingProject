<?php

namespace App\Http\Resources;

use App\Http\Resources\OrderResource;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_name' => $this->name,
            'identification' => $this->identification,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'cost'=>$this->cost,
            'description'=>$this->description . ". Identification:  " . $this->identification,
            'product_detail' => url('api/products/'. $this->id .'/'),
           // 'order' => $this->order,
           'order' => OrderResource::collection($this->order)

        ];
    }

    public function with($request)
    {
        return [
            'version' => '0.0.1',
            'company' => 'Isolocity',
            'attribution' => url('/terms-of-service'),
            'valid_as_of' => date('D, d M Y H:i:s')
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
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

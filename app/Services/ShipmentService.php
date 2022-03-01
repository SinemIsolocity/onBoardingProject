<?php

namespace App\Services;

use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Hashing\Hasher;

use App\Models\Shipment;

class ShipmentService
{
    private $response;
    private $validator;
    private $hasher;
    
    
    // 1. Same feedback as in InventoryService.php
    
    

    public function __construct(
        Validator $validator,
        Response $response,
        Hasher $hasher
    ) {
        $this->response = $response;
        $this->validator = $validator;
        $this->hasher = $hasher;
    }

    public function all()
    {
        return Shipment::all();
    }


    public function create($request)
    {
        $request->validate([
            'product_id'=>'required',
            'order_id'=>'required',
            'shipment_number'=>'required',
            'shipment_date'=>'required',
            'tracking_details'=>'required',
            'note'=>'required',
            'status'=>'required'

        ]);
        return Shipment::create($request->all());

    }

    public function find($id)
    {
        return Shipment::find($id);

    }

    public function edit($request, $id)
    { 
        
        $shipment = Shipment::find($id);
        $shipment->update($request->all());
        return $shipment;
    }

    public function search($shipment_number)
    {
        return Shipment::where('shipment_number', $shipment_number)->get();

    }

    public function delete($id)
    {
        return Shipment::destroy($id);
    }



}

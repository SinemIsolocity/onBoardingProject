<?php

namespace App\Services;

use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Hashing\Hasher;

use App\Models\Order;

class OrderService
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
        return Order::all();
    }


    public function create($request)
    {
        $request->validate([
            'product_id'=>'required',
            'identification'=>'required',
            'purchase_order_number'=>'required',
            'order_date'=>'required',
            'request_shipment_date'=>'required',
            'actual_arrival_date'=>'required',
            'note'=>'required',
            'status'=>'required'

        ]);
        return Order::create($request->all());

    }

    public function find($id)
    {
        return Order::find($id);

    }

    public function edit($request, $id)
    { 
        $order = Order::find($id);
        $order->update($request->all());
        return $order;

    }

    public function search($identification)
    {
        return Order::where('identification', $identification)->get();

    }

    public function delete($id)
    {
        return Order::destroy($id);
    }



}

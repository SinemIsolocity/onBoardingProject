<?php

namespace App\Services;

use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Hashing\Hasher;

use App\Models\Product;

class ProductService
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
        return Product::all();
    }


    public function create($request)
    {
        $request->validate([
            'name'=>'required',
            'identification'=>'required',
            'batch_number'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'cost'=>'required',
            'reorder_point'=>'required',
            'active'=>'required',
            'description'=>'required'

        ]);
         
        return Product::create($request->all());
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function edit($request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    public function search($name)
    {
        return Product::where('name', 'like', '%'.$name.'%')->get();

    }

    public function delete($id)
    {
        return Product::destroy($id);

    }



}

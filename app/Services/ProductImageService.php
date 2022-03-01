<?php

namespace App\Services;

use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Hashing\Hasher;

use App\Models\ProductImage;

class ProductImageService
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
        return ProductImage::all();
    }


    public function create($request)
    {

        $request->validate([
            'product_id'=>'required',
            'name'=>'required',
            'original_name'=>'required',
            'mime_type'=>'required',
            'size'=>'required'
        ]);
        return ProductImage::create($request->all());

    }

    public function find($id)
    {
        return ProductImage::find($id);

    }

    public function edit($request, $id)
    { 
        $productImage = ProductImage::find($id);
        $productImage->update($request->all());
        return $productImage;

    }

    public function search($name)
    {
        return ProductImage::where('name', 'like', '%'.$name.'%')->get();
    }

    public function delete($id)
    {
        return ProductImage::destroy($id);

    }



}

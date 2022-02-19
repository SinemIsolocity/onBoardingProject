<?php

namespace App\Services;

use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Hashing\Hasher;

use App\Models\Inventory;

class InventoryService
{
    private $response;
    private $validator;
    private $hasher;

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
        return Inventory::all();
    }


    public function create($request)
    {
        $request->validate([
            'product_id'=>'required',
            'batch'=>'required',
            'quantity'=>'required'

        ]);
        return Inventory::create($request->all());

    }

    public function find($id)
    {
        return Inventory::find($id);
    }

    public function edit($request, $id)
    { 
        $inventory = Inventory::find($id);
        $inventory->update($request->all());
        return $inventory;

    }

    public function search($batch)
    {
        return Inventory::where('batch', $batch)->get();
    }

    public function delete($id)
    {
        return Inventory::destroy($id);
    }



}
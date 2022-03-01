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
    
    
    // 1. Validation looks good, but should be in Controller, Not in service.
    
    // 2. InventoryResource file created but never used. Reffer to DeviationController.php as an example
    
    // 3. Also can remove unnecessary imports "Illuminate\Contracts\Routing\ResponseFactory, Response, Validator and Hasher". These are never used
    
    // 4. Always use pagination to avoid performance issues. Real applications will probably have thowsands of records and loading them all with waste resources.
    

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
    
    
    // 5. function name is better as "update" inspead of "edit" to follow common standars

    public function edit($request, $id)
    { 
        $inventory = Inventory::find($id);
        $inventory->update($request->all());
        return $inventory;

    }
    
    // 6. It is adviced to use "LIKE" and "%" operator to avoid missing results

    public function search($batch)
    {
        return Inventory::where('batch', $batch)->get();
    }

    public function delete($id)
    {
        return Inventory::destroy($id);
    }



}

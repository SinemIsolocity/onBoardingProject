<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory; 
use App\Services\InventoryService;

class InventoryController extends Controller
{

    private $inventoryService;

    public function __construct(InventoryService $inventoryService) 
    {
        $this->inventoryService = $inventoryService;
    }
    
    // 1. Encouraged to use validation in a separate Request File. Reffer to DeviationController.php line 35 as an example
    // This applies to all Controller Methods (store, show ... etc)

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->inventoryService->all();
    }

    
    // 2. Well done! Service usage looks good!

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->inventoryService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->inventoryService->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->inventoryService->edit($request, $id);
    }
    
     /**
     * Search the specified resource from storage.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($batch)
    {
        return $this->inventoryService->search($batch);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->inventoryService->delete($id);
    }
}

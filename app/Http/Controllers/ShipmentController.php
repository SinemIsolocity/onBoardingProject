<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shipment; 
use App\Services\ShipmentService;

class ShipmentController extends Controller
{
    private $shipmentService;
    
    
    
    // 1. Same feedback as in InventoryController.php
    
    

    public function __construct(ShipmentService $shipmentService) 
    {
        $this->shipmentService = $shipmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->shipmentService->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->shipmentService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->shipmentService->find($id);
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
        return $this->shipmentService->edit($request, $id);
    }


    /**
     * Search the specified resource from storage.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($shipment_number)
    {
        return $this->shipmentService->search($shipment_number);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->shipmentService->delete($id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order; 

use App\Services\OrderService;

class OrderController extends Controller
{

    private $orderService;

    public function __construct(OrderService $orderService) 
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->orderService->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->orderService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->orderService->find($id);
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
        return $this->orderService->edit($request, $id);
    }


    /**
     * Search the specified resource from storage.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($identification)
    {
        return $this->orderService->search($identification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->orderService->delete($id);
    }
}

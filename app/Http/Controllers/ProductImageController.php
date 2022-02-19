<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Services\ProductImageService;

class ProductImageController extends Controller
{

    private $producImageService;

    public function __construct(ProductImageService $productImageService) 
    {
        $this->productImageService = $productImageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->productImageService->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->productImageService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->productImageService->find($id);
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
        return $this->productImageService->edit($request, $id);
    }

     /**
     * Search the specified resource from storage.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return $this->productImageService->search($name);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->productImageService->delete($id);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;

class ShipmentTest extends TestCase
{
    public function test_it_stores_new_shipment()
    {
        $response = $this->post('api/shipment', [
            'product_id' => '2',
            'order_id' => '4',
            'shipment_number' => '00001',
            'shipment_date' => '2022-02-20',
            'tracking_details' => 'p2 tracking detail.',
            'note' => 'test note',
            'status' => '1'
        ]);
        $response->assertStatus(201);
    
    
    }

    public function test_it_updates_shipment()
    {
        $response = $this->put('api/shipment/2', [
            'note' => 'update note'
            
        ]);
        $response->assertStatus(200);
    
    
    }
    public function test_it_searches_shipment()
    {
        $response = $this->get('api/shipment/search/2');
        //$response->assertOk();
        $response->assertStatus(200);
    
    }

    public function test_it_deletes_shipment()
    {
        $response = $this->delete('api/shipment/1');
        $response->assertStatus(200);
    
    }
}

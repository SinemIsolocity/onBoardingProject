<?php

namespace Tests\Unit;

use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_it_stores_new_order()
    {
        $response = $this->post('api/order', [
            'product_id' => '2',
            'identification' => '4',
            'purchase_order_number' => '30',
            'order_date' => '2022-02-01',
            'request_shipment_date' => '2022-02-14',
            'actual_arrival_date' => '2022-02-18',
            'note' => 'note order 4',
            'status' => '1'
        ]);
        $response->assertStatus(201);
    
    
    }

    public function test_it_update_order()
    {
        $response = $this->put('api/order/3', [
            'status' => '0',
            
        ]);
        $response->assertStatus(200);
    
    
    }
    public function test_it_search_order()
    {
        $response = $this->get('api/products/search/2');
        //$response->assertOk();
        $response->assertStatus(200);
    
    }

    public function test_it_delete_order()
    {
        $response = $this->delete('api/order/3');
        $response->assertStatus(200);
    
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;

class OrderTest extends TestCase
{
    public function setup(): void
    {
        parent::setUp();
    }
    public function test_it_stores_new_product()
    {
        $response = $this->post('api/products', [
            'name' => 'Product_9',
            'identification' => '00011',
            'batch_number' => '0000009',
            'quantity' => '10',
            'price' => '99.9',
            'cost' => '55',
            'reorder_point' => '30',
            'active' => '1',
            'description' => 'Description for product 9'
        ]);
        $response->assertStatus(201);
    
    
    }

    public function test_it_stores_new_order()
    {
        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);

        $response = $this->post('api/order', [
            'product_id' => $response->getData()[0]->id,
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
    

    public function test_it_updates_order()
    {
        $response = $this->get('api/order/search/4');
        $response->assertStatus(200);
        $response = $this->put('api/order/'.$response->getData()[0]->id, [
            'note' => 'update_note',
        ]);
    
    
    }
    public function test_it_search_order()
    {
        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);
        $this->json('GET', 'api/order/search/4', ['Accept'=> 'application/json'])
        ->assertStatus(200)
        ->assertJson([[
            'product_id' => $response->getData()[0]->id,
            'identification' => '4',
            'purchase_order_number' => '30',
            'order_date' => '2022-02-01',
            'request_shipment_date' => '2022-02-14',
            'actual_arrival_date' => '2022-02-18',
            'note' => 'update_note',
            'status' => '1'
        ]]);
    
    }

    public function test_it_delete_order()
    {
        $response = $this->get('api/order/search/4');
        $response->assertStatus(200);

        $response = $this->delete('api/order/'.$response->getData()[0]->id);
        $response->assertStatus(200);

        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);

        $response = $this->delete('api/products/'.$response->getData()[0]->id);
        $response->assertStatus(200);
    
    }
}

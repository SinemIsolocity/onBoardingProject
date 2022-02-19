<?php

namespace Tests\Unit;

use Tests\TestCase;

class InventoryTest extends TestCase
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
    public function test_it_stores_new_inventory()
    {

        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);


        $response = $this->post('api/inventory', [
            'product_id' => $response->getData()[0]->id,
            'batch' => 'A00001',
            'quantity' => '30'
        ]);
        $response->assertStatus(201);
    
    
    }

    public function test_it_updates_inventory()
    {

        $response = $this->get('api/inventory/search/A00001');
        $response->assertStatus(200);
        $response = $this->put('api/inventory/'.$response->getData()[0]->id, [
            'quantity' => '600',
        ]);
    
    }
    public function test_it_searches_inventory()
    {

        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);


        $this->json('GET', 'api/inventory/search/A00001', ['Accept'=> 'application/json'])
        ->assertStatus(200)
        ->assertJson([[
            'product_id' => $response->getData()[0]->id,
            'batch' => 'A00001',
            'quantity' => '600' 
        ]]);



        $response = $this->get('api/inventory/search/1');
        //$response->assertOk();
        $response->assertStatus(200);
    
    }

    public function test_it_deletes_inventory()
    {

        $response = $this->get('api/inventory/search/A00001');
        $response->assertStatus(200);

        $response = $this->delete('api/inventory/'.$response->getData()[0]->id);
        $response->assertStatus(200);

        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);

        $response = $this->delete('api/products/'.$response->getData()[0]->id);
        $response->assertStatus(200);

    }
}

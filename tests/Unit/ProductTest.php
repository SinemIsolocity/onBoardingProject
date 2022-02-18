<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProductTest extends TestCase
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

    public function test_it_updates_product()
    {
        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);
        $response = $this->put('api/products/'.$response->getData()[0]->id, [
            'name' => 'Product_update',
        ]);
        $response->assertStatus(200);
    
    
    }
    public function test_it_searches_product()
    {
        $this->json('GET', 'api/products/search/Product_update', ['Accept'=> 'application/json'])
        ->assertStatus(200)
        ->assertJson([[
            'name' => 'Product_update',
            'identification' => '00011',
            'batch_number' => '0000009',
            'quantity' => '10',
            'price' => '99.9',
            'cost' => '55',
            'reorder_point' => '30',
            'active' => '1',
            'description' => 'Description for product 9'
        ]]);
    
    }

    public function test_it_deletes_product()
    {
        $response = $this->get('api/products/search/Product_update');
        $response->assertStatus(200);

        $response = $this->delete('api/products/'.$response->getData()[0]->id);
        $response->assertStatus(200);
    
    }
}


<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_stores_new_product()
    {
        $response = $this->post('api/products', [
            'name' => 'Product 9',
            'identification' => '00009',
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

    public function test_it_update_product()
    {
        $response = $this->put('api/products/1', [
            'name' => 'Product update',
            
        ]);
        $response->assertStatus(200);
    
    
    }
    public function test_it_search_product()
    {
        $response = $this->get('api/products/search/product');
        //$response->assertOk();
        $response->assertStatus(200);
    
    }

    public function test_it_delete_product()
    {
        $response = $this->delete('api/products/1');
        $response->assertStatus(200);
    
    }
}


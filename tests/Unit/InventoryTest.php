<?php

namespace Tests\Unit;

use Tests\TestCase;

class InventoryTest extends TestCase
{
    public function test_it_stores_new_inventory()
    {
        $response = $this->post('api/inventory', [
            'product_id' => '2',
            'batch' => 'A00001',
            'quantity' => '30'
        ]);
        $response->assertStatus(201);
    
    
    }

    public function test_it_updates_inventory()
    {
        $response = $this->put('api/inventory/1', [
            'quantity' => '100',
            
        ]);
        $response->assertStatus(200);
    
    
    }
    public function test_it_searches_inventory()
    {
        $response = $this->get('api/inventory/search/1');
        //$response->assertOk();
        $response->assertStatus(200);
    
    }

    public function test_it_deletes_inventory()
    {
        $response = $this->delete('api/inventory/1');
        $response->assertStatus(200);
    
    }
}

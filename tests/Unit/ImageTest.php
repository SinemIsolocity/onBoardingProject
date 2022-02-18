<?php

namespace Tests\Unit;

use Tests\TestCase;

class ImageTest extends TestCase
{
    public function test_it_stores_new_image()
    {
        $response = $this->post('api/product-image', [
            'product_id' => '2',
            'name' => 'product 2 image 2',
            'original_name' => 'original p2 image 2',
            'mime_type' => 'png',
            'size' => '850'
        ]);
        $response->assertStatus(201);
    
    
    }

    public function test_it_updates_image()
    {
        $response = $this->put('api/product-image/1', [
            'size' => '100',
            
        ]);
        $response->assertStatus(200);
    
    
    }
    public function test_it_searches_image()
    {
        $response = $this->get('api/product-image/search/1');
        //$response->assertOk();
        $response->assertStatus(200);
    
    }

    public function test_it_deletes_images()
    {
        $response = $this->delete('api/product-image/3');
        $response->assertStatus(200);
    
    }
}

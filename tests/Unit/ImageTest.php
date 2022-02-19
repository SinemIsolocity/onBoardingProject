<?php

namespace Tests\Unit;

use Tests\TestCase;

class ImageTest extends TestCase
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

    public function test_it_stores_new_image()
    {


        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);

        $response = $this->post('api/product-image', [
            'product_id' => $response->getData()[0]->id,
            'name' => 'image_1',
            'original_name' => 'original p2 image 2',
            'mime_type' => 'png',
            'size' => '850'
        ]);
        $response->assertStatus(201);

    
    }

    public function test_it_updates_image()
    {
        $response = $this->get('api/product-image/search/image_1');
        $response->assertStatus(200);
        $response = $this->put('api/product-image/'.$response->getData()[0]->id, [
            'size' => '600',
        ]);
    
    }
    public function test_it_searches_image()
    {
        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);


        $this->json('GET', 'api/product-image/search/image_1', ['Accept'=> 'application/json'])
        ->assertStatus(200)
        ->assertJson([[
            'product_id' => $response->getData()[0]->id,
            'name' => 'image_1',
            'original_name' => 'original p2 image 2',
            'mime_type' => 'png',
            'size' => '600'
        ]]);
    
    }

    public function test_it_deletes_images()
    {
        $response = $this->get('api/product-image/search/image_1');
        $response->assertStatus(200);

        $response = $this->delete('api/product-image/'.$response->getData()[0]->id);
        $response->assertStatus(200);

        $response = $this->get('api/products/search/Product_9');
        $response->assertStatus(200);

        $response = $this->delete('api/products/'.$response->getData()[0]->id);
        $response->assertStatus(200);
    }
}

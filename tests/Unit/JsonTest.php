<?php

namespace Tests\Unit;


use Tests\TestCase;

class JsonTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_product_json()
    {
        $response = $this->get('api/json-order');
        $response->assertStatus(200);
    }
}

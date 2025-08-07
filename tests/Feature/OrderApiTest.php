<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_order_returns_expected_response()
    {
        $this->seed();

        $payload = [
            'customer_id' => 1,
            'items' => [
                ['product_id' => 1, 'quantity' => 2],
                ['product_id' => 2, 'quantity' => 1]
            ]
        ];

        $response = $this->postJson('/api/orders', $payload);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'total',
                'discount',
                'items' => [
                    '*' => ['product_id', 'unit_price', 'quantity', 'subtotal']
                ]
            ]);
    }
}
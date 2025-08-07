<?php

namespace Tests\Unit;

use App\Interfaces\PriceCalculatorInterface;
use App\Services\OrderService;
use PHPUnit\Framework\TestCase;

class OrderServiceTest extends TestCase
{
    public function test_process_returns_data_from_calculator()
    {
        $items = [
            ['product_id' => 1, 'quantity' => 2]
        ];

        $expected = [
            'total' => 200,
            'discount' => 0,
            'items' => [
                [
                    'product_id' => 1,
                    'unit_price' => 100,
                    'quantity' => 2,
                    'subtotal' => 200
                ]
            ]
        ];

        // Criando mock da interface
        $calculatorMock = $this->createMock(PriceCalculatorInterface::class);
        $calculatorMock->method('calculate')->willReturn($expected);

        // Injetando mock no service
        $service = new OrderService($calculatorMock);

        $result = $service->process($items);

        $this->assertEquals($expected, $result);
    }
}

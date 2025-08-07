<?php

namespace Tests\Unit;

use App\Repositories\ProductRepository;
use App\Services\DefaultPriceCalculator;
use PHPUnit\Framework\TestCase;

class DefaultPriceCalculatorTest extends TestCase
{
    public function test_calculates_total_without_discount()
    {
        $repository = new ProductRepository();
        $calculator = new DefaultPriceCalculator($repository);

        $items = [
            ['product_id' => 1, 'quantity' => 2], 
            ['product_id' => 3, 'quantity' => 1], 
        ];

        $result = $calculator->calculate($items);

        $this->assertEquals(400, $result['total']);
        $this->assertEquals(0, $result['discount']);
    }

    public function test_calculates_total_with_discount()
    {
        $repository = new ProductRepository();
        $calculator = new DefaultPriceCalculator($repository);

        $items = [
            ['product_id' => 1, 'quantity' => 2], 
            ['product_id' => 2, 'quantity' => 1],
        ];

        $result = $calculator->calculate($items);

        $this->assertEquals(495, $result['total']); 
        $this->assertEquals(55, $result['discount']);
    }
}

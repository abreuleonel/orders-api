<?php

namespace App\Services;

use App\Interfaces\PriceCalculatorInterface;

class OrderService
{
    public function __construct(
        private PriceCalculatorInterface $priceCalculator
    ) {}

    public function process(array $items): array
    {
        return $this->priceCalculator->calculate($items);
    }
}

<?php

namespace App\Interfaces;

interface PriceCalculatorInterface
{
    public function calculate(array $items): array;
}

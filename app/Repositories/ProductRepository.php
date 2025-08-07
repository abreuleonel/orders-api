<?php

namespace App\Repositories;

class ProductRepository
{
    public function getPriceById(int $productId): float
    {
        // Preços mockados
        $prices = [
            1 => 100.0,
            2 => 350.0,
            3 => 200.0,
        ];

        return $prices[$productId] ?? 0;
    }
}

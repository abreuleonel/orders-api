<?php

namespace App\Services;

use App\Interfaces\PriceCalculatorInterface;
use App\Repositories\ProductRepository;

class DefaultPriceCalculator implements PriceCalculatorInterface
{
    public function __construct(
        private ProductRepository $productRepository
    ) {}

    public function calculate(array $items): array
    {
        $subtotal = 0;
        $detailedItems = [];

        foreach ($items as $item) {
            $unitPrice = $this->productRepository->getPriceById($item['product_id']);
            $quantity = $item['quantity'];
            $lineTotal = $unitPrice * $quantity;

            $subtotal += $lineTotal;

            $detailedItems[] = [
                'product_id' => $item['product_id'],
                'unit_price' => $unitPrice,
                'quantity' => $quantity,
                'subtotal' => $lineTotal
            ];
        }

        $discount = $subtotal > 500 ? $subtotal * 0.1 : 0;
        $total = $subtotal - $discount;

        return [
            'total' => $total,
            'discount' => $discount,
            'items' => $detailedItems
        ];
    }
}

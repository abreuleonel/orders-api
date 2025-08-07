<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService) {}

    public function store(OrderRequest $request): JsonResponse
    {
        $result = $this->orderService->process($request->validated()['items']);
        return response()->json($result);
    }
}

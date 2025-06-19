<?php

namespace App\Services\Backend;

use App\Models\Order;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class OrderService
{
    public function all(): Collection
    {
        return Order::with('user:id,name')->get();
    }

    public function show(Order $order)
    {
        $order->load(['user', 'products', 'billingAddress', 'shippingAddress']);
        return $order;
    }
}

<?php

namespace App\Services\Backend;

use App\Models\Order;
use Illuminate\Support\Collection;

class OrderService
{
    public function all(): Collection
    {
        return Order::with('user:id,name')->get();
    }

    // public function create(array $data): OrderDetails
    // {
    //     return OrderDetails::create($data);
    // }

    // public function update(OrderDetails $orderDetail, array $data): OrderDetails
    // {
    //     $orderDetail->update($data);
    //     return $orderDetail;
    // }

    // public function delete(OrderDetails $orderDetail): void
    // {
    //     $orderDetail->delete();
    // }
}

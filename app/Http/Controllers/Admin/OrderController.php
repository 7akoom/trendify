<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Backend\OrderService;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function __construct(private OrderService $service) {}

    public function index()
    {
        $orders = $this->service->all();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        try {
            $order = $this->service->show($order);
            return view('admin.orders.show', compact('order'));
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
        }
    }
}

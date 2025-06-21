<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Enums\AddressType;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Front\OrderService;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CartRepositoryInterface;

class CheckoutController extends Controller
{
    public function __construct(
        private CartRepositoryInterface $cartRepo,
        private OrderService $orderService
    ) {}

    public function create()
    {
        if ($this->cartRepo->count() == 0) {
            return \redirect()->route('shop');
        }

        $cart = $this->cartRepo->get();
        $total = $this->cartRepo->total();
        return view('check-out', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        try {
            $order = $this->orderService->storeOrder($request->all());

            if ($order) {
                return redirect()->route('shop')
                    ->with('success', 'تم استلام طلبكم بنجاح شكرا لاستخدامكم متجرنا');;
            } else {
                return back()->withErrors('حدث خطأ أثناء تنفيذ الطلب');
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}

<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('order.index', compact('user'));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        // 開啟一個資料庫交易
        DB::transaction(function () use ($user, $request) {
            // 建立一個訂單
            $order = new Order;
            $order->address = $request->address;
            $order->total = 0;
            $order->closed = 0;
            $order->user_id = $user->id;
            $order->save();
            $total = 0;
            // 計算所有購物車內容的數量及價格
            foreach ($request->amount as $product_id => $amount) {
                $product = Product::find($product_id);
                $item = new OrderItem;
                $item->order_id = $order->id;
                $item->product_id = $product_id;
                $item->amount = $amount;
                $item->price = $product->price;
                $item->save();
                $total += $product->price * $amount;
            }
            // 更新訂單總金額
            $order->update(['total' => $total]);
            // 將下單的商品從購物車中移除
            $user->carts()->delete();
        });


    return redirect()->route('order.index');
    }

}

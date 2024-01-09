<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $user = $request->user();

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

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}

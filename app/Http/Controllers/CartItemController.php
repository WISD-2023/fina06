<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = auth()->user()->cartItems;
        $data = [
            'cartItems'=>$cartItems,
        ];
        return view('cart.index', $data);
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
    public function store(StoreCartItemRequest $request, Product $product)
    {
        $user = Auth::user();
        $cartItem = $user->cartItems()->where('product_id', $product->id)->first();

        if ($cartItem) {
            // 商品已存在於購物車，更新數量
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->input('quantity'),
            ]);
        } else {
            // 商品不存在於購物車，新增購物車項目
            $user->cartItems()->create([
                'product_id' => $product->id,
                'quantity' => $request->input('quantity'),
            ]);
        }

//        return redirect()->back()->with('success', '成功加入購物車!');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,$quantity)
    {
        if (Auth::check()) {
            $c= DB::table('carts')->where('id', $id)->value('cost');
            DB::table('carts')
                ->where('id', $id)
                ->update([
                    'quantity' => $quantity,
                    'total' => $c * $quantity
                ]);
            return Redirect::to(url()->previous());
        }
        else{return redirect()->route('login');}
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            Cart::destroy($id);
            return Redirect::to(url()->previous());
        }
        else{return redirect()->route('login');}
    }


    public function add($id)
    {

        if (Auth::check()) {
            $good = DB::table('products')->where('id', $id)->value('name');
            $price = DB::table('products')->where('id', $id)->value('price');
            $pr = DB::table('products')->where('id', $id)->value('price');
            $photo = DB::table('products')->where('id', $id)->value('image');
            DB::table('carts')->insert(
                [
                    'cost' => $price,
                    'name' => $good,
                    'image' => $photo,
                    'total' =>$pr,
                    'user_id'=>Auth::user()->id,
                    'product_id'=> $id,
                ]
            );
            return Redirect::to(url()->previous());
        }
        else{return redirect()->route('login');}
    }




}

<?php

use App\Http\Controllers\CartController;
use App\Models\Cart;

$total = CartController::total();
?>
@extends('layouts.master')

@section('title','購物車')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">購物車
            <small></small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('products.index')}}">菜單</a>
            </li>
            <li class="breadcrumb-item active">購物車</li>
        </ol>

        <!-- Blog Post -->


        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="accordion" id="accordionExample">
                    <div class="card card-bottom">
                        <div class="card-header  d-flex justify-content-between" id="headingOne">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                顯示購物車細節
                            </button>
                            <div class="h3 d-inline-block mt-2">
                                <strong>${{$total}}</strong>
                            </div>
                        </div>

                    </div>
                    <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">
                        <table class="table" >
                            @foreach($results as $item)
                                <thead>
                                <tr>
                                    <th width="20"></th>
                                    <th width="100"></th>
                                    <th> 商品名稱</th>
                                    <th>數量</th>
                                    <th class="text-center" width="120">小計</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <form action="{{route('carts.destroy',$item->id)}}" method="POST" style="display:inline">
                                        @method('delete')
                                        @csrf
                                        <td class="align-middle"><button type="submit" style="border: 0;background-color: white"><i class="far fa-trash-alt mr-3"></i></button></td>
                                    </form>
                                    <form action="{{route('carts.store')}}" method="POST" style="display:inline">
                                        @method('post')
                                        @csrf
                                        <td class="align-middle">
                                            <div class="card p-1 card-bottom">
                                                <img src="{{$item->img2}}"
                                                     alt="..." width="80px;">
                                            </div>
                                        </td>
                                        <td class="align-middle "> {{$item->name}}</td>
                                        <td class="align-middle">{{$item->quantity}}</td>
                                        <td class="align-middle text-right">${{($item->quantity)*($item->price)}}</td>
                                    </form>
                                </tr>
                                @endforeach

                                <tr class="text-right">
                                    <td colspan="4"><strong>合計</strong></td>
                                    <td><strong>${{$total}}</strong></td>
                                </tr>
                                </tbody>
                        </table>

                        <div class="mt-3 d-flex justify-content-end">
                            <button class="btn btn-secondary mr-2" style="background-color: white" ><a href="{{route('products.index')}}">繼續選購</a></button>

                            <button type="submit" onclick="return confirm('是否確認結帳?')" class="btn btn-primary">確認付款</button>
                            </form>
                        </div>




                        <!-- Pagination -->

                    </div>
                    <!-- /.container -->

@endsection

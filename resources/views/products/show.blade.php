@extends('layouts.app')
@section('name', $product->name)
@section('content')
    <div class="card">
        <div class="card-body product-info">
            <div class="row">
                <div class="col-sm-5">
                    <img class="img-fluid" src="{{ $imageUrl }}" alt="{{ $product->name }}">
                </div>
                <div class="col-sm-7">
                    <div class="h2">{{ $product->name }}</div>
                    <div class="h3">售價 {{ $product->price }}元</div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">

                        </div>

                        <div class="input-group-append">
                            <span class="input-group-text">數量：</span>
                            <input type="text" class="form-control input-sm" name="amount" value="1">
                            <span class="input-group-text">件</span>
                        </div>
                        <div class="input-group-append">
                            <a href="{{route('product.index')}}" class="btn btn-primary">加入購物車</a>
                        </div>
                    </div>
                    {!! $product->description !!}
                </div>
                <form action="{{route("cart_items.store")}}" method="POST">
                    @csrf
                    @method('POST')
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection




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
            </div>
        </div>
    </div>
@endsection




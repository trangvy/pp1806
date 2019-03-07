@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($product as $product)
                        <div class="product-list" style="width: 18rem; float: left; padding-left: 10px;" >
                            <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap">
                            <div class="card-body">
                                <p><span>Name: <strong class="card-title">{{ $product->product_name }}</strong> </span></p>
                                <p><span>Price: <strong class="card-text">{{ $product->price }}</strong></p> </span></p>
                                <a href="#" class="btn btn-primary">Buy</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

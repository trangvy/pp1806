@extends('layouts.app')

@section('content')

    @foreach ($categories as $category)
        <section class="product-list row " >
            <div class="category container">
                <form class="form-inline" action="/search ">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" name="search" placeholder="Search..">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>

                <div class="category-title">
                    <p class="h3" > Category {{ $category->name }}</p>
                </div>

                <div class="category-products">
                    @php ($i = 1)
                    @foreach ($category->products as $product)
                            @if ($i <= 6)
                            <div class="product-item card" style="width: 10rem;">
                                <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap">
                                <div class="card-body">
                                    <p><span>ID: <strong class="card-title">{{ $product->id }}</strong></span></p>
                                    <p><span>Name: <strong class="card-title">{{ $product->product_name }}</strong></span></p>
                                    <p><span>Price: <strong class="card-text">{{ $product->price }}</strong></span></p>
                                    <form method="POST" action="{{ route('orders.storeOrderProduct') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input id="total_price" type="hidden"  name="total_price" value="">
                                        <input id="description" type="hidden"  name="description" value="">
                                        <button type="submit" class="btn btn-primary"> Buy </button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        @php ($i++)
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

@endsection

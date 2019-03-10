@extends('layouts.app')

@section('content')

    @foreach ($categories as $category)
        <section class="product-list row " >
            <div class="category container">
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

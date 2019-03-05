@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Detail') }}</div>

                <div class="card-body">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <label class="col-md-4">{{ __('Category Id') }}</label>
                       <div class="col-md-6">
                            <p>{{ $product->category_id }}</p>
                        </div>
                    </div>
                   
                   <div class="row justify-content-center">
                        <label class="col-md-4">{{ __('Product Name') }}</label>
                       <div class="col-md-6">
                            <p>{{ $product->product_name }}</p>
                        </div>
                    </div>
                   <div class="row justify-content-center">
                        <label class="col-md-4">{{ __('Price') }}</label>
                       <div class="col-md-6">
                            <p>{{ $product->price }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <label class="col-md-4">{{ __('Quantity') }}</label>
                       <div class="col-md-6">
                            <p>{{ $product->quantity }}</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <label class="col-md-4">{{ __('Image') }}</label>
                       <div class="col-md-6">
                            <img src="{{ $product->image }}" style="width: 100%">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

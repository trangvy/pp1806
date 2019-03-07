@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category Id') }}</label>

                            <div class="col-md-6">
                                <input id="category_id" type="text" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ $product->category_id }}" autofocus>

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }}" name="product_name" value="{{ $product->product_name }}">

                                @if ($errors->has('product_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $product->price }}">

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ $product->image }}">

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ $product->quantity }}">

                                @if ($errors->has('quantity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avg_rating" class="col-md-4 col-form-label text-md-right">{{ __('avg_rating') }}</label>

                            <div class="col-md-6">
                                <input id="avg_rating" type="number" class="form-control{{ $errors->has('avg_rating') ? ' is-invalid' : '' }}" name="avg_rating" value="{{ $product->avg_rating }}">

                                @if ($errors->has('avg_rating'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avg_rating') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

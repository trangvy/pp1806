@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Order') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-warning"  role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                            <div class="col-md-6">
                                <input type="hidden"   name="user_id" value="{{ $order->user->id }}" placeholder="{{ $order->user->name }}">
                                <input type="text" readonly  name="user_name" value="{{ $order->user->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('Total price') }}</label>

                            <div class="col-md-6">
                                <input class="form-control{{ $errors->has('total_price') ? ' is-invalid' : '' }}" type="number" name="total_price" value="{{ $order->total_price }}" >
                                @if ($errors->has('total_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('total_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('Descrption') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} rounded-0" rows="5" id="exampleFormControlTextarea2" name="description">{{ $order->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" class="custom-select">
                                    <option value="1" {{ $order->status == 1 ? 'selected':'' }}>New</option>
                                    <option value="2" {{ $order->status == 2 ? 'selected':'' }}>Delivering</option>
                                    <option value="3" {{ $order->status == 3 ? 'selected':'' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __(' Update') }}
                                </button>
                                <a href="{{ route('orders.index') }}" class="btn btn-info"> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

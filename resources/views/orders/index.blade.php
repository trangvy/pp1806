@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Order List') }}</div>

                    <div class="card-body">
                        <table   class="table" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Total Product</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr class="row_{{ $order->id }}">
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>
                                        <a href="/users/{{ $order->user->id }}">{{ $order->user->name }}</a>
                                    </td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->products->count() }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case(config('orders.cancelled'))
                                            <span class="status badge badge-danger">{{ __('order.status.' . $order->status) }}</span>
                                            @break

                                            @case(config('orders.delivering'))
                                            <span class="status badge badge-warning">{{ __('order.status.' . $order->status) }}</span>
                                            @break

                                            @default
                                            <span class="status badge badge-primary">{{ __('order.status.' . $order->status) }}</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="users/{{ $order->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                        <a href="#" class="btn btn-info btn-del-user" role="button" data-user-id="{{ $order->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="alert alert-success" style="display: none">
                        </div>

                     <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                            <tr class="row_{{ $product->id }}">
                              <th scope="row">{{ $product->id }}</th>
                                <td>
                                    <a href="/products/{{ $product->id }}">{{ $product->product_name }}</a>
                                </td>
                              <td>{{ $product->price }}</td>
                              <td>{{ $product->quantity }}</td>
                              <td>
                                  <a href="products/{{ $product->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                  <a href="#" class="btn btn-info btn-del-product" role="button" data-product-id="{{ $product->id }}">Delete</a>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <a href="products/create" class="btn btn-info" role="button">Create Product</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $('.btn-del-product').click(function() {
            if (confirm('You are sure?')) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var productId = $(this).data('product-id');
                var url = '/products/' + productId;

                $.ajax({
                    url: url,
                    type: 'DELETE',

                    success: function(result) {
                        $('.row_' + productId).remove();
                        $('.alert-success').show().html('<p>' +  result.message + '</p>');
                        setTimeout(function(){  $('.alert-success').hide(); }, 5000);
                    },
                    error: function(result) {
                        alert(result.message, result.error);
                    }
                });
            }
        });
    });
</script>
@endsection

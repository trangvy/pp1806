<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderCreateRequest;
use App\Order;
use App\OrderProduct;
use App\Product;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        if(!$orders) {
            return redirect(route('home'))->with('status', 'Have not any order');
        }

        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->get('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return back()->with('status', 'Product not exist');
        }

        $data['total_price'] = $product->price;
        $data['description'] = "description";

        $currentUserId = auth()->id();

        $user = User::find($currentUserId);

        if () {
            # code...
        }
        try {
            $data['user_id'] = $currentUserId;
            $order = Order::create($data);

            $orderProduct['order_id'] = $order->id;
            $orderProduct['product_id'] = $product->id;
            $orderProduct['quantity'] = 1;
            $orderProduct['price'] = $product->price;
            OrderProduct::create($orderProduct);
        } catch (Exception $e) {
            return back()->with('status', 'Create fail');
        }

        return redirect("orders/$order->id")->with('status', 'Create successfuly !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderCreateRequest;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\User;
use function PhpParser\filesInDir;

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
    public function store(OrderCreateRequest $request)
    {
        $data = $request->only('total_price', 'description', 'status');
        $data['user_id'] = auth()->id();

        try {
            $order = Order::create($data);
        }catch (\Exception $e) {
            return back()->with('status', 'Failed to create order');
        }

        return redirect(route('orders.show', $order->id))->with('status', 'Create successfuly !');
    }

    public function storeOrderProduct (Request $request) {
        $productId = $request->get('product_id');
        $product = Product::find($productId);
        $currentUserId = auth()->id();
        $user = User::find($currentUserId);

        if (!$product) {
            return back()->with('status', 'Product does not exist');
        }

        $data['total_price'] = $product->price;
        $data['description'] = "description";
        $data['user_id'] = $currentUserId;
        $order = null;
        $flag = true;

        try {
            if (!$user->orders->isEmpty()) {
                foreach ($user->orders as $result) {
                    if ( $result->status == 1) {
                        $flag = false;
                        $data['total_price'] = $result->total_price + $product->price;
                        $result->update($data);
                        $order = Order::find($result->id);
                        break;
                    }
                }

                if ($flag) {
                    $order = Order::create($data);
                }
            } else {
                $order = Order::create($data);
            }

            $orderProduct['order_id'] = $order->id;
            $orderProduct['product_id'] = $product->id;
            $orderProduct['quantity'] = 1;
            $orderProduct['price'] = $product->price;
            OrderProduct::create($orderProduct);
        } catch (\Exception $e) {
            return back()->with('status', 'Create fail');
        }

        return redirect(route('orders.show', $order->id))->with('status', 'Create successfuly !');
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

        if (!$order) {
            return back()->with('status', 'Order not exist');
        }

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
        $order = Order::find($id);

        if (!$order) {
            return back()->with('status', 'Order does not exist');
        }

        return view('orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderCreateRequest $request, $id)
    {
        $validated = $request->validated();

        $data = $request->only('user_id', 'total_price', 'description', 'status');
        $order = Order::find($id);
        try {
            $order ->update($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('status', 'Update fail');
        }

        return redirect(route('orders.show', $order->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            $result = [
                'status' => false,
                'message' => 'Order does not exist',
            ];
        } else {
            try {

                $order->delete();
                $result = [
                    'status' => true,
                    'message' => ' Delete successfully',
                ];
            } catch (\Exception $e) {
                $result = [
                    'status' => true,
                    'message' => 'Failed to delete order',
                    'error' => $e->getMessage()
                ];
            }
        }

        return response()->json($result);
    }
}

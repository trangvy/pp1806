<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateProduct;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        if (!$products) {
            return redirect(route('home'))->with('status', 'Have not any product');
        }

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct $request)
    {
        $validated = $request->validated();
        $data = $request->only(['category_id', 'product_name', 'price', 'image', 'quantity', 'avg_rating']);
        $currentUserId = auth()->id();

        try {
            $data['user_id'] = $currentUserId;
            Product::create($data);
        } catch (\Exception $e) {

            return back()->with('status', $e->getMessage());
        }

        return redirect()->route('products.index')->with('status', 'Create successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return back()->with('status', 'Product have not exist');
        }

        return view ('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {

            return back()->with('status', 'Product have not exist');
        }

        if ($product->id != auth()->id()) {

            return back()->with('status', 'You have not permission');
        }

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProduct $request, $id)
    {
        $validated = $request->validated();
        $data = $request->only(['category_id', 'product_name', 'price', 'image', 'quantity', 'avg_rating']);
        $product = Product::find($id);

        try {
            $product->update($data);
        } catch (\Exception $e) {
            return back()->with('status', 'Update fail');
        }

        if ($product->id != auth()->id()) {

            return back()->with('status', 'You have not permission');
        }

        return redirect(route('products.show',$product->id))->with('status', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::destroy($id);
            $result = [
                'status' => true,
                'message' => 'Delete success'
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => false,
                'message' => 'Delete fail',
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result);
    }
}

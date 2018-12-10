<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$request->session()->regenerate();
			$product_id = $request->product_id;
			$amount = $request->amount;
            $unit = [$product_id => $amount];
            
            $text = '1:3';
			
			if($request->session()->has('cart')){
				$already = $request->session()->get('cart');
				$request->session()->forget('cart'); //delete
				$already[] = $text;
				$request->session()->put('cart', $already);
			}else{
				// $request->session()->put('cart', $unit);
				$request->session()->put('cart', $text);
			}
			dd($request->session()->get('cart'));
			
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
			$request->session()->regenerate();
			$product = Product::find($id);
			return view('about',[
				'product' => $product
			]);
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

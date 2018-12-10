<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use \App\Models\Product;
use \App\Models\Order;
use \App\Models\OrderContent;

use \App\Http\Requests\StoreOrder;


class OrdersController extends Controller
{
    //
    public function cart(Request $request)
    {
        $cartItems = session()->get("CART_ITEMS",[]);
        $cart = [];
        $current_subtotal = 0;
        $cart_detail['current_subtotal'] = 0;
        foreach($cartItems as $idx => $item){
            if(isset($cart[$item->id])){
                $cart[$item->id]['quantity']++;
            }else{
                $cart[$item->id]['quantity'] = 1;
                $cart[$item->id]['item_detail'] = $item;
            }
            $cart_detail['current_subtotal'] += $item->price;
        }
        $cart_detail['shipping_fee'] = config('app.shipping_fee');
        $cart_detail['total_pay'] = $cart_detail['current_subtotal'] + config('app.shipping_fee');

        return view("cart_view", [
            "cart" => $cart,
            "cart_detail" => $cart_detail
        ]);
    }
    public function add(Request $request)
    {
        // フォームから IDを読み込みDBへ問い合わせる
        $id = intval(request()->get("product_id"));
        $quantity = intval(request()->get("quantity"));
        $item = Product::find($id);
        if($item!=null){
            // セッションにデータを追加して格納
            $cartItems = session()->get("CART_ITEMS",[]);
            for($i = 0; $i < $quantity; $i++){
                $cartItems[] = $item;
            }
            session()->put("CART_ITEMS",$cartItems);
            return redirect("/order/cart");
        }else{
            return abort(404);
        }        
    }
    public function remove(Request $request)
    {
        $id = intval(request()->get("product_id"));
        $cartItems = session()->get("CART_ITEMS",[]);
        $session_index = 0;
        foreach($cartItems as $idx => $item){
            if($item->id == $id){
                $session_index = $idx;
                break;
            }
        }
        unset($cartItems[$session_index]);
        session()->put("CART_ITEMS",$cartItems);
    
        return redirect("/order/cart");
    }

    public function delete_all(Request $request)
    {
        session()->forget('CART_ITEMS');
        return redirect("/order/cart");
    }
    
    public function commit(Request $request)
    {
        $request->validate([
            'address_name' => 'required|max:255',
            'zip_1' => 'required|digits:3',
            'zip_2' => 'required|digits:4',
            'pref' => 'required|max:4',
            'address_detail' => 'required|max:255',
            'address_building' => 'nullable'
        ]);
        $cartItems = session()->get("CART_ITEMS",[]);
        if(count($cartItems) < 1){
            return redirect("/order/cart");
        }
        DB::beginTransaction();
        try {
            //order
            $order = new Order;
            $order->address_name = $request->address_name;
            $order->address_zip = $request->zip_1.'-'.$request->zip_2;
            $order->address_pref = $request->pref;
            $order->address_detail = $request->address_detail;
            $order->address_building = $request->address_building;
            $order->save();

            // ordercontent
            $countItem = [];
            foreach($cartItems as $index => $item){
                if(isset($countItem[$item->id])){
                    $countItem[$item->id] += 1;
                }else{
                    $countItem[$item->id] = 1;
                }
            }
            foreach($countItem as $item_id => $content_count){
                OrderContent::insert([
                    'order_id' => $order->id,
                    'product_id' => $item_id,
                    'amount' => $content_count,
                ]);
            }
            DB::commit();
            session()->forget("CART_ITEMS");
            return redirect("/order/finish");
        }catch (\PDOException $e){
            dd($e);
            DB::rollBack();
            return redirect("/order/cart");
        }
    }

    public function finish()
    {
        return view('finish');
    }
}

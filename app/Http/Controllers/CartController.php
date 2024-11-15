<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Stock;
use App\Models\Shipping;
use App\Models\Option;
use File;
use DB;

class CartController extends Controller
{
   
    public function addToCart(Request $request)
    {
        if(session()->has('customer')) {
            $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;
            $session_id = null;
        }else {
            $customer_id = null;
            if(session()->has('session_id')) {
                $session_id = session('session_id');
            }else {
                $session_id = (string) Str::uuid();
                session()->put('session_id',$session_id);
            }
        }
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $price = $request->price;
        $discount_price = $request->discount_price;
        $stock_id = $request->stock_id;
        $stock = Stock::findOrFail($stock_id);
        if((int) $stock->stock < $quantity) {
            return response()->json(
                [
                    'status' => 'Exceeds Available Stocks',
                    'stock' => $stock->stock
                ]
            );
        }
        $cartExists = Cart::where(
            [
                'product_id' => $product_id,
                'customer_id' => $customer_id,
                'session_id' => $session_id,
                'stock_id' => $stock_id
            ]
        )->exists();
        if($cartExists) {
            $cart = Cart::where(
                [
                    'product_id' => $product_id,
                    'customer_id' => $customer_id,
                    'session_id' => $session_id,
                    'stock_id' => $stock_id
                ]
            )->first();
            Cart::where(
                [
                    'product_id' => $product_id,
                    'customer_id' => $customer_id,
                    'session_id' => $session_id,
                    'stock_id' => $stock_id
                ]
            )->update(
                [
                    'quantity' => ((int) $quantity + (int)$cart->quantity),
                ]
            );
        }else {
            Cart::insert(
                [
                    'product_id' => $product_id,
                    'customer_id' => $customer_id,
                    'session_id' => $session_id,
                    'stock_id' => $stock_id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'discount_price' => $discount_price
                ]
            );
        }
        
        $stock->update(
            [
                'stock' => ( (int) $stock->stock - $quantity)
            ]
        );
        $cart_count = Cart::where(
            [
                'customer_id' => $customer_id,
                'session_id' => $session_id
            ]
        )->count();
        return response()->json(
            [
                'status' => 'Added to Cart',
                'stock' => $stock->stock,
                'cart_count' => $cart_count
            ]
        );
    } 

    public function cart() {
        if(session()->has('customer')) {
            $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;
            $session_id = null;
        }else {
            $customer_id = null;
            if(session()->has('session_id')) {
                $session_id = session('session_id');
            }else {
                $session_id = (string) Str::uuid();
                session()->put('session_id',$session_id);
            }
        }
        $carts = Cart::where(
            [
                'customer_id' => $customer_id,
                'session_id' => $session_id
            ]
        )->get();
        if($carts->count() > 0) {
            session()->put('ckeckout','');
        }
        $banner_image_exists = Option::where('option_name','banner_image')->exists();
        if($banner_image_exists) {
            $banner_image = Option::where('option_name','banner_image')->first()->option_value;
            if(!File::exists(public_path($banner_image))) {
                $banner_image = 'frontend/img/bg_banner.jpg';
            }
        }else {
            $banner_image = 'frontend/img/bg_banner.jpg';
        }
        return view('front.cart')->with(compact(['carts','banner_image']));
    }

    public function removeCart(Request $request) {
        $cart_id = $request->cart_id;
        $cart = Cart::findOrFail($cart_id);
        $stock = Stock::findOrFail($cart->stock_id);
        $stock->update(
            [
                'stock' => ( (int) $stock->stock + $cart->quantity)
            ]
        );
        $cart->delete();
        return redirect()->back();
    }

    public function updateCart(Request $request) {
        $cart_id = $request->cart_id;
        $quantity = $request->quantity;
        for ($i=0; $i < count($cart_id); $i++) { 
            Cart::where('id',$cart_id[$i])->update(
                [
                    'quantity' => $quantity[$i]
                ]
            );
        }
        return redirect()->back();
    }

    public function checkout() {
        
        if(session()->has('customer')) {
            $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;

        $cart_list=DB::table('cart AS c')->select('c.*','l.*','s.*')
                   ->leftjoin('lane AS l','l.id','=','c.lane_id')
                   ->leftjoin('slot_master AS s','s.id','=','c.slot_id')
                   ->where('c.customer_id',$customer_id)
                   ->get();
         
                   $customers=Customer::where('email',session('customer'))
                   ->first();
                   $customers_list=Customer::where('type','customer')->get();

        }else{
            return redirect()->route('login');
        }


       
       
        return view('front.checkout',compact('cart_list','customers','customers_list'));
    }
   
}

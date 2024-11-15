<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Customer;
use App\Models\Option;
use App\Models\CMS;
use File;
use Mail;
use DB;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function home() {
        $whoweare = CMS::where('id',34)->get();
        $cricademia_achievements  = DB::table('achievements')->where('status',1)->orderBy('sort_order','ASC')->get();
        return view('front.home',compact('whoweare','cricademia_achievements'));     
    }
    
    public function lane(Request $request){

        // if(isset($request->date)){
        //     $date=$request->date;
        //    }else{
        //     $date=date('Y-m-d');
        //    }
        //    $timestamp = strtotime($date);
        //    $day = date('l', $timestamp);

        $day_master  =DB::table('day_master')->orderBy('id','ASC')->get();
        $slot_master =DB::table('slot_master')->where('status',1)->orderBy('id','ASC')->get();
        $lane_master =DB::table('lane')->where('status',1)->orderBy('id','ASC')->get();

        if(session()->has('customer')) {
            $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;
            $session_id = 0;
    
            $cart_list=DB::table('cart AS c')->select('c.id as cartid','c.*','sm.*','l.*')
            ->leftjoin('slot_master AS sm','sm.id','=','c.slot_id')
            ->leftjoin('lane AS l','l.id','=','c.lane_id')
            ->where('customer_id',$customer_id)->get();
        }else {
            $customer_id = 0;
            if(session()->has('session_id')) {
                $session_id = session('session_id');
            }else {
                $session_id = (string) Str::uuid();
                session()->put('session_id',$session_id);
            }

            $cart_list=DB::table('cart AS c')->select('c.id as cartid','c.*','sm.*','l.*')
            ->leftjoin('slot_master AS sm','sm.id','=','c.slot_id')
            ->leftjoin('lane AS l','l.id','=','c.lane_id')
            ->where('session_id',$session_id)->get();
           
        }
           
        
        return view('front.lane',compact('day_master','slot_master','lane_master','cart_list'));
    }


    public function addTocart(Request $request){
        
       $slot_id    =$request->post_sloat_id;
       $lane_id    =$request->post_lane_id;
       $selectDate =$request->post_date;

       if(session()->has('customer')) {
        $customer_id = Customer::where('email',session('customer'))
        ->first(['email','id'])->id;
        $session_id = 0;

        $slotExist=DB::table('cart')->where('lane_id',$lane_id)->where('slot_id',$slot_id)->where('customer_id',$customer_id)->where('select_date',$selectDate)->exists();
    }else {
        $customer_id = 0;
        if(session()->has('session_id')) {
            $session_id = session('session_id');
        }else {
            $session_id = (string) Str::uuid();
            session()->put('session_id',$session_id);
        }
        $slotExist=DB::table('cart')->where('lane_id',$lane_id)->where('slot_id',$slot_id)->where('session_id',$session_id)->where('select_date',$selectDate)->exists();

    }


       
       if($slotExist){
          DB::table('cart')->where('lane_id',$lane_id)->where('slot_id',$slot_id)->delete();

          
          if(session()->has('customer')) {
            $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;

        $cart_list=DB::table('cart AS c')->select('c.*','l.*','s.*')
                   ->leftjoin('lane AS l','l.id','=','c.lane_id')
                   ->leftjoin('slot_master AS s','s.id','=','c.slot_id')
                   ->where('c.customer_id',$customer_id)
                   ->get();
        }else{

            if(session()->has('session_id')) {
                $session_id = session('session_id');
            }else {
                $session_id = (string) Str::uuid();
                session()->put('session_id',$session_id);
            }

            $cart_list=DB::table('cart AS c')->select('c.*','l.*','s.*')
                   ->leftjoin('lane AS l','l.id','=','c.lane_id')
                   ->leftjoin('slot_master AS s','s.id','=','c.slot_id')
                   ->where('c.session_id',$session_id)
                   ->get();
        }
         

          return response()->json([
            'status'=>'already exists',
            'data'=>$cart_list
         ]);
       }


        if(session()->has('customer')) {
            $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;
            $session_id = 0;
          DB::table('cart')->insert([
            'customer_id'=>$customer_id,
            'slot_id'    =>$slot_id,
            'lane_id'    =>$lane_id,
            'select_date'=>$selectDate
          ]);

        }else {
            $customer_id = 0;
            if(session()->has('session_id')) {
                $session_id = session('session_id');
            }else {
                $session_id = (string) Str::uuid();
                session()->put('session_id',$session_id);
            }

            DB::table('cart')->insert([
                'session_id'=>$session_id,
                'slot_id'    =>$slot_id,
                'lane_id'    =>$lane_id,
                'select_date'=>$selectDate
              ]);
        }

        if(session()->has('customer')) {
            $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;

        $cart_list=DB::table('cart AS c')->select('c.*','l.*','s.*')
                   ->leftjoin('lane AS l','l.id','=','c.lane_id')
                   ->leftjoin('slot_master AS s','s.id','=','c.slot_id')
                   ->where('c.customer_id',$customer_id)
                   ->get();
        }else{

            if(session()->has('session_id')) {
                $session_id = session('session_id');
            }else {
                $session_id = (string) Str::uuid();
                session()->put('session_id',$session_id);
            }

            $cart_list=DB::table('cart AS c')->select('c.*','l.*','s.*')
                   ->leftjoin('lane AS l','l.id','=','c.lane_id')
                   ->leftjoin('slot_master AS s','s.id','=','c.slot_id')
                   ->where('c.session_id',$session_id)
                   ->get();
        }

         return response()->json([
            'status'=>'cart added',
            'data'=>$cart_list
         ]);





    }

    public function thankyou() {
        if(session()->has('order_id')) {
            return view('front.thankyou');
        }else {
            return redirect()->route('home');
        }
    }

    public function eventthankYou(){
        if(session()->has('order_id')) {
            return view('front.eventthankyou');
        }else {
            return redirect()->route('home');
        }

    }
    
     

}

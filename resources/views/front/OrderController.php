<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Option;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use Razorpay\Api\Api;
use Barryvdh\DomPDF\Facade\Pdf;
use Mail;
use DB;
class OrderController extends Controller
{
    public function orders(Request $request) {
        if(session()->has('admin')) {
            // $orders = Orders::distinct()
            // ->orderBy('order_id','DESC')
            // ->get('order_id');

            $query = Orders::distinct();
            

            
            if (isset($request->start_date)) {
                
                $startDate=date("Y-m-d",strtotime($request->start_date));
                $endDate   =date("Y-m-d",strtotime($request->end_date));
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }

            if (isset($request->user_type)) {
                
                $subQryRes = DB::table('customers')->where('type', $request->user_type)->pluck('id');
                $query->whereIn('customer_id', $subQryRes);
            }
            $orders = $query->get('order_id');
            return view('admin.order.orders')->with(compact(['orders']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function refund_orders(Request $request){
        if(session()->has('admin')) {
            $orders = Orders::
            select('orders.*','orders.customer_id','orders.id as orderid','orders.order_id','orders.status')
            ->where('status','Refund Pending')
            ->orWhere('status','Accept Refund')
            ->orWhere('status','Payment Done')
            ->orWhere('status','Reject Refund')
            ->orderBy('order_id','DESC')
            ->get('order_id');

            
            return view('admin.order.refund_orders')->with(compact(['orders']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function event_refund_orders(Request $request){
        if(session()->has('admin')) {
            $orders = DB::table('event_order as eo')
            ->select('eo.*','e.*')
            ->leftjoin('events as e','e.event_id','=','eo.event_id')
            ->where('eo.status','Refund Pending')
            ->orWhere('eo.status','Accept Refund')
            ->orWhere('eo.status','Payment Done')
            ->orWhere('status','Reject Refund')
            ->orderBy('order_id','DESC')
            ->get();

            
            return view('admin.order.refund_event_orders')->with(compact(['orders']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function accept_refund(Request $request,$id){
        $updQry=DB::table('orders')->where('id',$id)->update([
            'status'=>'Accept Refund'
        ]);

        
      
        return redirect()->back()->with('success','Order Updated Successfully');
      
    }

    public function reject_refund(Request $request,$id){
        $updQry=DB::table('orders')->where('id',$id)->update([
            'status'=>'Reject Refund'
        ]);
        return redirect()->back()->with('success','Order Updated Successfully');
    }

    public function payment_refund(Request $request,$id){
        $updQry=DB::table('orders')->where('id',$id)->update([
            'status'=>'Payment Done'
        ]);
      
        return redirect()->back()->with('success','Order Updated Successfully');
      
    }


    public function event_accept_refund(Request $request,$id){
        $updQry=DB::table('event_order')->where('id',$id)->update([
            'status'=>'Accept Refund'
        ]);
      
        return redirect()->back()->with('success','Order Updated Successfully');
      
    }

    public function event_reject_refund(Request $request,$id){
        $updQry=DB::table('event_order')->where('id',$id)->update([
            'status'=>'Reject Refund'
        ]);
      
        return redirect()->back()->with('success','Order Updated Successfully');
      
    }

    public function event_payment_refund(Request $request,$id){
        $updQry=DB::table('event_order')->where('id',$id)->update([
            'status'=>'Payment Done'
        ]);
      
        return redirect()->back()->with('success','Order Updated Successfully');
      
    }
    


    public function orderDetails(Request $request) {
        if(session()->has('admin')) {
            $order_id = $request->order_id;
            $orders = DB::table('orders AS o')->select('o.*','l.*','sm.*')
            ->leftjoin('lane AS l','l.id','=','o.lane_id')
            ->leftjoin('slot_master AS sm','sm.id','=','o.slot_id')
            ->where('order_id',$order_id)->get();
            return view('admin.order.order-details')->with(compact(['orders']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function eventorderDetails(Request $request){
        if(session()->has('admin')) {
            $order_id = $request->order_id;
            $orders = DB::table('event_order AS eo')->select('eo.*','e.*','c.*')
            ->leftjoin('events AS e','e.event_id','=','eo.event_id')
            ->leftjoin('customers AS c','c.id','=','eo.customer_id')
            ->where('eo.order_id',$order_id)->get();
            return view('admin.order.event-order-details')->with(compact(['orders']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function eventorder(Request $request){
        if(session()->has('admin')) {
            // $orders = DB::table('event_order AS eo')
            // ->select('eo.*','e.*')
            // ->leftjoin('events AS e','e.event_id','=','eo.event_id')
            // ->get();

            $query = DB::table('event_order AS eo')
             ->select('eo.*','e.*')
             ->leftjoin('events AS e','e.event_id','=','eo.event_id');
            $query->orderBy('id', 'DESC');

            
            if (isset($request->start_date)) {
                
                $startDate=date("Y-m-d",strtotime($request->start_date));
                $endDate   =date("Y-m-d",strtotime($request->end_date));
                $query->whereBetween('order_date', [$startDate, $endDate]);
            }

            if (isset($request->event_name)) {
                
                $subQryRes = DB::table('events')->where('event_name', $request->event_name)->pluck('event_id');
                $query->whereIn('eo.event_id', $subQryRes);
            }
            $orders = $query->get();
            
            return view('admin.order.event-order')->with(compact(['orders']));

        }else {
            return redirect()->route('admin');
        } 
    }

    public function event_placeOrder(Request $request){
        
        if(session()->has('customer')) {
            $customer= Customer::where('email',session('customer'))->first();
            $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;
        }
        
            $fname = $request->fname;
            $lname = $request->lname;
            $email = $request->email;
            $phone = $request->phone;
            $address_line_1 = $request->address_line_1;
            $order_subtotal=$request->order_subtotal;
            $event_id=$request->event_id;
            $order_id = strtoupper(Str::random(6));
            $eventDet=DB::table('events')->where('event_id',$event_id)->first();

            $event_id=DB::table('event_order')->insertGetId([
                'customer_id'=>$customer_id,
                'order_id'=>$order_id,
                'event_id'=>$event_id,
                'order_amount'=>$eventDet->event_price,
                'order_date'=>date('Y-m-d'),
                'payment_mode'=>'ONLINE',
                'payment_status'=>1
            ]);
            session()->put('order_id',$order_id);
           // DB::table('events')->where('event_id', $event_id)->decrement('event_no_of_person');


            
            
            
             $site_name='Cricademia';
        $email = 'info@web.cricademia.com';
        //$email ='shusovanjob.roy@gmail.com';
        
        $CustomerDet=DB::table('customers')->where('id',$customer_id)->first();
        $OrderDet   =DB::table('event_order')->where('order_id',$order_id)->first();
        
        $EventDet    =DB::table('events')->where('event_id',$OrderDet->event_id)->first();
        
        $data = [
            'order_id' => $order_id,
            'site_name' => $site_name,
            'customer_name' =>  $CustomerDet->fname." ".$CustomerDet->lname,
            'event_name'=>$EventDet->event_name,
            'event_date'=>$EventDet->event_date,
            'event_time'=>$EventDet->event_time
        ];
        
        Mail::send('mail.event-booking',$data, function($message) use($email, $site_name) {
            $message->from(env("MAIL_FROM_ADDRESS"),$site_name);
            $message->to($email)->subject('Event Booking Confirmation');
        });
        
            
            \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));
            $productname = $eventDet->event_name;
            $totalprice =round($eventDet->event_price);
            $two0 = "00";
            $total = "$totalprice$two0";
            $orderid=$order_id;
    
            $session = \Stripe\Checkout\Session::create([
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'EUR',
                            'product_data' => [
                                "name" => $productname,
                            ],
                            'unit_amount'  => $total,
                        ],
                        'quantity'   => 1,
                    ],
                    
                ],
                'mode'        => 'payment',
                'success_url' => route('event-thank-you',['event_order_id' => $order_id]),
                'cancel_url'  => route('thank-you'),
            ]);
            return redirect($session->url);
        
       
    }

    public function placeOrder(Request $request) {
       
      
        if(session()->has('customer')) {
            $customer= Customer::where('email',session('customer'))->first();
        }
        if($customer->type=='coach'){
          $customer_id=$request->student_id;
          $customerDet=Customer::where('id',$customer_id)->first();

          $fname     = $customerDet->fname;
          $lname     = $customerDet->lname;
          $email     = $customerDet->email;
          $phone     = $customerDet->phone;
          $address_line_1 =$customerDet->address_line_1;
        }else{
            $fname = $request->fname;
            $lname = $request->lname;
            $email = $request->email;
            $phone = $request->phone;
            $address_line_1 = $request->address_line_1;
        }
       $order_subtotal=$request->order_subtotal;
        
        // $address_line_2 = $request->address_line_2;
        // $country = $request->country;
        // $state = $request->state;
        // $city = $request->city;
        // $zip_code = $request->zip_code;
        // if(session()->has('coupon_code') && Coupon::where('code',session('coupon_code'))->exists()) {
        //     $coupon = Coupon::where('code',session('coupon_code'))->first();
        //     $coupon_code  = $coupon->code;
        //     $coupon_type  = $coupon->coupon_type;
        //     $coupon_discount_amount = $coupon->amount;
        // }else {
        //     $coupon_code  = null;
        //     $coupon_type  = null;
        //     $coupon_discount_amount = 0;
        // }
        // if($request->has('note') && $request->note != '' && $request->note != null) {
        //     $note = $request->note;
        // }else {
        //     $note = null;
        // }
       
         if(session()->has('customer')) {

            $coach_id =0;
            if($customer->type=='coach'){
                $customer_id=$request->student_id;
                $coach_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;
            }else{
                $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;
            }
            
            $session_id = null;
         }
         if($customer->type=='coach'){
        $carts = Cart::where(
            [
                'customer_id' => $coach_id,
                'session_id' => $session_id
            ]
        )->get();
            } else{

                $carts = Cart::where(
                    [
                        'customer_id' => $customer_id,
                        'session_id' => $session_id
                    ]
                )->get(); 
            }
        $order_id = strtoupper(Str::random(6));
        if(Orders::where('order_id',$order_id)->exists()) {
            $order_id = strtoupper(Str::random(6));
        }
        $payment_mode = $request->payment_mode;
        foreach ($carts as $cart) {
           $LaneDet=DB::table('lane')->where('id',$cart->lane_id)->first(); 
            Orders::insert(
                [
                    'order_id' => $order_id,
                    'customer_id' => $customer_id,
                    'slot_date' => $cart->select_date,
                    'slot_id' => $cart->slot_id,
                    'lane_id' => $cart->lane_id,
                    'lane_price' => $LaneDet->lane_price,
                    'payment_mode' => $payment_mode,
                    'created_by'   =>$coach_id,
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s')
                ]
            );
            $cart = Cart::findOrFail($cart->id);
            $cart->delete();
        }
        session()->put('order_id',$order_id);
        DB::table('cart')->where('customer_id',$customer_id)->delete();
        $site_name='Cricademia';
        $email = 'info@web.cricademia.com';
        
        $CustomerDet=DB::table('customers')->where('id',$customer_id)->first();
        $OrderDet   =DB::table('orders')->where('order_id',session()->get('order_id'))->first();
        
        $SlotDet    =DB::table('slot_master')->where('id',$OrderDet->slot_id)->first();
        $LaneDet    =DB::table('lane')->where('id',$OrderDet->lane_id)->first();
        $data = [
            'order_id' => $order_id,
            'site_name' => $site_name,
            'customer_name' =>  $CustomerDet->fname." ".$CustomerDet->lname,
            'slot_date'=>$OrderDet->slot_date,
            'slot_name'=>$SlotDet->slot_name,
            'lane_name'=>$LaneDet->lane_name
        ];
        
        Mail::send('mail.lane-booking',$data, function($message) use($email, $site_name) {
            $message->from(env("MAIL_FROM_ADDRESS"),$site_name);
            $message->to($email)->subject('Lane Booking Confirmation');
        });
        
        
        
        if($payment_mode == 'Online Payment') {
          
            \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));
            $productname = ' Product Purchase';
            $totalprice =round($order_subtotal);
            $two0 = "00";
            $total = "$totalprice$two0";
            $orderid=strtoupper(Str::random(6));
    
            $session = \Stripe\Checkout\Session::create([
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'EUR',
                            'product_data' => [
                                "name" => $productname,
                            ],
                            'unit_amount'  => $total,
                        ],
                        'quantity'   => 1,
                    ],
                    
                ],
                'mode'        => 'payment',
                'success_url' => route('thank-you',['order_id' => $orderid]),
                'cancel_url'  => route('thank-you'),
            ]);
            //echo "<pre>"; print_r($session); exit;
            return redirect($session->url);
           
           
            // return redirect()->route('pay');
        }else {
            return redirect()->route('thank-you');
        }
    }

    public function updateOrderStatus(Request $request) {
        $order_id = $request->order_id;
        $status = $request->status;
        $shipped_at = null;
        $delivered_at = null;
        if($status == 'Shipped') {
            $shipped_at = Carbon::now();
        }
        if($status == 'Delivered') {
            $delivered_at = Carbon::now();
        }
        Order::where('order_id',$order_id)->update(
            [
                'status' => $status,
                'shipped_at' => $shipped_at,
                'delivered_at' => $delivered_at
            ]
        );
        $site_name_exists = Option::where('option_name','site_name')->exists();
        if($site_name_exists) {
            $site_name = Option::where('option_name','site_name')->first()->option_value;
        }else {
            $site_name = '';
        }
        $order = Order::where('order_id',$order_id)->first();
        $customer = Customer::where('id',$order->customer_id)
        ->first(['id','username','email']);
        $email = $customer->email;
        $data = [
            'username' => $customer->username,
            'site_name' => $site_name,
            'order_id' => $order_id,
            'order' => $order
        ];
        Mail::send('mail.order-status',$data, function($message) use($email, $site_name) {
            $message->from(env("MAIL_FROM_ADDRESS"),$site_name);
            $message->to($email)->subject('Order Status Updated');
        });
        return redirect()->back()
        ->with('success','Status Updated');
    }

    public function pay() {
        if(session()->has('order_id') && session()->has('customer')) {
            $razorpay_api_key_exists = Option::where('option_name','razorpay_api_key')->exists();
            if($razorpay_api_key_exists) {
                $razorpay_api_key = Option::where('option_name','razorpay_api_key')->first()->option_value;
            }else {
                return redirect()->route('home')
                ->with('error','Something went wrong');
            }
            $site_name_exists = Option::where('option_name','site_name')->exists();
            if($site_name_exists) {
                $site_name = Option::where('option_name','site_name')->first()->option_value;
            }else {
                $site_name = '';
            }
            $order_id = session('order_id');
            $orders = Order::where('order_id',$order_id)->get();
            return view('front.pay')->with(compact(['orders','razorpay_api_key','site_name']));
        }else {
            return redirect()->route('home');
        }
    }

    public function processPayment(Request $request) {
        if(session()->has('order_id')) {
            $order_id = session('order_id');
        }else {
            return redirect()->route('home')
            ->with('error','Something went wrong');
        }

        $razorpay_api_key_exists = Option::where('option_name','razorpay_api_key')->exists();
        if($razorpay_api_key_exists) {
            $razorpay_api_key = Option::where('option_name','razorpay_api_key')->first()->option_value;
        }else {
            return redirect()->back();
        }

        $razorpay_api_secret_exists = Option::where('option_name','razorpay_api_secret')->exists();
        if($razorpay_api_secret_exists) {
            $razorpay_api_secret = Option::where('option_name','razorpay_api_secret')->first()->option_value;
        }else {
            return redirect()->back();
        }
        $input = $request->all();
        $api = new Api ($razorpay_api_key, $razorpay_api_secret);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                
                Order::where('order_id',$order_id)->update(
                    [
                        'payment_id' => $response['id']
                    ]
                );
            } catch(Exception $e) {
                return redirect()->back();
            }
        }
        return redirect()->route('thank-you');
    }

    public function generateInvoice(Request $request) {
        $order_id = $request->order_id;
        $orders = Order::where('order_id',$order_id)->get();
        $site_name_exists = Option::where('option_name','site_name')->exists();
        if($site_name_exists) {
            $site_name = Option::where('option_name','site_name')->first()->option_value;
        }else {
            $site_name = '';
        }
        $data = [
            'order_id' => $order_id,
            'site_name' => $site_name,
            'orders' => $orders
        ];
        $pdf = Pdf::loadView('admin.order.invoice', $data)->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path()
        ]);;
        return $pdf->download('invoice_'.$order_id.'.pdf');
    }

    public function manual_booking(Request $request){

        
           $manual_booking=DB::table('manual_booking AS mb')->select('mb.*','c.fname','c.lname')
           ->leftjoin('customers AS c','c.id','=','mb.coach_id')->get();
           return view('admin.order.manual-booking-list',compact('manual_booking'));
        
            return redirect()->route('home')
            ->with('error','Something went wrong');
        

    }
}

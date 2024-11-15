<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Customer;

class EventsController extends Controller
{
    public function events(){

     $event_list =DB::table('events')->where('event_status',1)->orderBy('event_id','DESC')->get();
        return view('front.events',compact('event_list'));
    }

    public function event_booking(Request $request){

        if(session()->has('customer')) {
            $customer_id = Customer::where('email',session('customer'))
            ->first(['email','id'])->id;
         $event_id=decrypt($request->id);   

        $event_details=DB::table('events')->where('event_id',$event_id)->first();
         
        $customers=Customer::where('email',session('customer'))
                   ->first();
                   
            return view('front.eventcheckout',compact('customers','event_details'));
        }else{
            return redirect()->route('login');
        }


    }


    public function gallery(Request $request){
        $gallery_list = DB::table('media')->orderBy('id','DESC')->get();
        $gallery_category=DB::table('gallery_category')->orderBy('sort_order','ASC')->get();
        return view('front.gallery',compact('gallery_list','gallery_category'));
    }

    public function gallery_details(Request $request){
        $category_id=$request->category_id;
        $gallery_list=DB::table('media')->where('category_id',$category_id)->get();
        return view('front.gallery_details',compact('gallery_list'));
    }
}
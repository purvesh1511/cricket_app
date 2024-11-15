<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Option;
use Illuminate\Support\Facades\Hash;
use File;
use Mail;
use DB;

class CoachController extends Controller
{
    public function customers() {
        if(session()->has('admin')) {
            $customers = Customer::where('type','coach')->orderBy('id','DESC')->lazy();
            return view('admin.coach.all-customers')->with(compact(['customers']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function storeCustomer(Request $request) {
        if(session()->has('admin')) {
            $fname = $request->fname;
            $lname = $request->lname;
            $username = $request->username;
            $email = $request->email;
            $phone = $request->phone;
            $password = $request->password;
            
            $username_exists = Customer::where('username',$username)->exists();
            if($username_exists){
                return redirect()->back()
            ->with('error','Username Already Exists');
            }
            
            $email_exists = Customer::where('email',$email)->exists();
            if($email_exists){
                return redirect()->back()
            ->with('error','Email Already Exists');
            }
            
            $phone_exists = Customer::where('phone',$phone)->exists();
            if($phone_exists){
                return redirect()->back()
            ->with('error','Phone Already Exists');
            }
            $customer = Customer::updateOrCreate(
                [
                    'type' => 'coach',
                    'fname' => $fname,
                    'lname' => $lname,
                    'username' => $username,
                    'email' => $email,
                    'phone' => $phone
                ],
                [
                    'type' => 'coach',
                    'fname' => $fname,
                    'lname' => $lname,
                    'username' => $username,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => Hash::make($password)
                ]
            );
            $site_name_exists = Option::where('option_name','site_name')->exists();
            if($site_name_exists) {
                $site_name = Option::where('option_name','site_name')->first()->option_value;
            }else {
                $site_name = '';
            }
            $data = [
                'name' => $fname.' '.$lname,
                'email' => $email,
                'phone' => $phone,
                'username' => $username,
                'site_name' => $site_name
            ];
          
            return redirect()->back()
            ->with('success','Coach Added');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteCustomer(Request $request) {
        if(session()->has('admin')) {
            $customer_id = $request->customer_id;
            Customer::where('id',$customer_id)->delete();
            return redirect()->back()
            ->with('suucess','Coach Deleted');
        }else {
            return redirect()->route('admin');
        }
    }

    public function editCustomer(Request $request) {
        if(session()->has('admin')) {
            $customer_id = $request->customer_id;
            $customerExists=DB::table('customers')->where('id',$customer_id)->exists();
            if(!$customerExists){
                return redirect()->back();
            }
            $customer = Customer::findOrFail($customer_id);
            return view('admin.coach.edit-customer')->with(compact(['customer']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateCustomer(Request $request) {
        if(session()->has('admin')) {
            $customer_id = $request->customer_id;
            $fname = $request->fname;
            $lname = $request->lname;
            $username = $request->username;
            $email = $request->email;
            $phone = $request->phone;
            $usernameTaken = Customer::where('username',$username)
            ->where('id','!=',$customer_id)
            ->exists();
            $emailTaken = Customer::where('email',$email)
            ->where('id','!=',$customer_id)
            ->exists();
            $phoneNoTaken = Customer::where('phone',$phone)
            ->where('id','!=',$customer_id)
            ->exists();
            if($usernameTaken) {
                return redirect()->back()
                ->with('error','Username already taken');
            }
            if($emailTaken) {
                return redirect()->back()
                ->with('error','Email already registered');
            }
            if($phoneNoTaken) {
                return redirect()->back()
                ->with('error','Phone Number already registered');
            }
            Customer::where('id',$customer_id)->update(
                [
                    'fname' => $fname,
                    'lname' => $lname,
                    'username' => $username,
                    'email' => $email,
                    'phone' => $phone
                ]
            );
            if($request->has('password') && $request->password != '' && $request->password != null) {
                $password = $request->password;
                Customer::where('id',$customer_id)->update(
                    [
                        'password' => Hash::make($password)
                    ]
                );
            }
            return redirect()->back()
            ->with('success','Coach Details Updated');
        }else {
            return redirect()->route('admin');
        }
    }

    public function login() {
        if(session()->has('customer')) {
            return redirect()->route('customer-dashboard');
        }else {
            $banner_image_exists = Option::where('option_name','banner_image')->exists();
            if($banner_image_exists) {
                $banner_image = Option::where('option_name','banner_image')->first()->option_value;
                if(!File::exists(public_path($banner_image))) {
                    $banner_image = 'frontend/img/bg_banner.jpg';
                }
            }else {
                $banner_image = 'frontend/img/bg_banner.jpg';
            }
            return view('customer.login')->with(compact(['banner_image']));
        }
    }

    public function signup() {
        if(session()->has('customer')) {
            return redirect()->route('customer-dashboard');
        }else {
            $banner_image_exists = Option::where('option_name','banner_image')->exists();
            if($banner_image_exists) {
                $banner_image = Option::where('option_name','banner_image')->first()->option_value;
                if(!File::exists(public_path($banner_image))) {
                    $banner_image = 'frontend/img/bg_banner.jpg';
                }
            }else {
                $banner_image = 'frontend/img/bg_banner.jpg';
            }
            return view('customer.registration')->with(compact(['banner_image']));
        }
    }

    public function registration(Request $request) {
        $fname = $request->fname;
        $lname = $request->lname;
        $username = $request->username;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $usernameTaken = Customer::where('username',$username)->exists();
        $emailTaken = Customer::where('email',$email)->exists();
        $phoneNoTaken = Customer::where('phone',$phone)->exists();
        if($usernameTaken) {
            return redirect()->back()
            ->with('error','Username already taken');
        }
        if($emailTaken) {
            return redirect()->back()
            ->with('error','Email already registered');
        }
        if($phoneNoTaken) {
            return redirect()->back()
            ->with('error','Phone Number already registered');
        }
        $customer = Customer::updateOrCreate(
            [
                'fname' => $fname,
                'lname' => $lname,
                'username' => $username,
                'email' => $email,
                'phone' => $phone
            ],
            [
                'fname' => $fname,
                'lname' => $lname,
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'password' => Hash::make($password)
            ]
        );
        $site_name_exists = Option::where('option_name','site_name')->exists();
        if($site_name_exists) {
            $site_name = Option::where('option_name','site_name')->first()->option_value;
        }else {
            $site_name = '';
        }
        $data = [
            'name' => $fname.' '.$lname,
            'email' => $email,
            'phone' => $phone,
            'username' => $username,
            'site_name' => $site_name
        ];
        if($customer) {
            Mail::send('mail.customer-registration',$data, function($message) use($email, $site_name) {
                $message->from(env("MAIL_FROM_ADDRESS"),$site_name);
                $message->to($email)->subject('Thank you for signing up with '.$site_name.'');
            });
            Mail::send('mail.admin.customer-registration',$data, function($message) use($email, $site_name) {
                $message->from(env("MAIL_FROM_ADDRESS"),$site_name);
                $message->to(env("MAIL_FROM_ADDRESS"))->subject('New Customer Registration on '.$site_name.'');
            });
        }
        return redirect()->back()
        ->with('success','Successfully Registered');
    }

    public function customerAuth(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $customerExists = Customer::where('email',$email)
        ->orWhere('username',$email)
        ->exists();
        if($customerExists) {
            $customer = Customer::where('email',$email)
            ->orWhere('username',$email)
            ->first();
            if($customer->status == 0) {
                return redirect()->back()
                ->with('error','Your Account Deactivated');
            }
            if(Hash::check($password,$customer->password)) {
                session()->put('customer',$customer->email);
                if(session('session_id')) {
                    Cart::where('session_id',session('session_id'))->update(
                        [
                            'session_id' => null,
                            'customer_id' => $customer->id
                        ]
                    );
                }
                session()->forget('session_id');
                if(session()->has('target_url')) {
                    return redirect()->route(session('target_url'));
                }
                return redirect()->route('customer-dashboard');
            }else {
                return redirect()->back()
                ->with('error','Password not matched');
            }
        }else {
            return redirect()->back()
            ->with('error','Email or Username not registered');
        }
    }

    public function customerDashboard() {
        if(session()->has('customer')) {
            $customer = Customer::where('email',session('customer'))->first();
            $banner_image_exists = Option::where('option_name','banner_image')->exists();
            if($banner_image_exists) {
                $banner_image = Option::where('option_name','banner_image')->first()->option_value;
                if(!File::exists(public_path($banner_image))) {
                    $banner_image = 'frontend/img/bg_banner.jpg';
                }
            }else {
                $banner_image = 'frontend/img/bg_banner.jpg';
            }
            return view('customer.dashboard')->with(compact(['customer','banner_image']));
        }else {
            return redirect()->route('login');
        }
    }

    public function updateProfile(Request $request) {
        if(session()->has('customer')) {
            $customer = Customer::where('email',session('customer'))->first(['id','email']);
            $customer_id = $customer->id;
            $fname = $request->fname;
            $lname = $request->lname;
            $username = $request->username;
            $email = $request->email;
            $phone = $request->phone;
            $usernameTaken = Customer::where('username',$username)
            ->where('id','!=',$customer_id)
            ->exists();
            $emailTaken = Customer::where('email',$email)
            ->where('id','!=',$customer_id)
            ->exists();
            $phoneNoTaken = Customer::where('phone',$phone)
            ->where('id','!=',$customer_id)
            ->exists();
            if($usernameTaken) {
                return redirect()->back()
                ->with('error','Username already taken');
            }
            if($emailTaken) {
                return redirect()->back()
                ->with('error','Email already registered');
            }
            if($phoneNoTaken) {
                return redirect()->back()
                ->with('error','Phone Number already registered');
            }
            Customer::where('id',$customer_id)->update(
                [
                    'fname' => $fname,
                    'lname' => $lname,
                    'username' => $username,
                    'email' => $email,
                    'phone' => $phone
                ]
            );
            return redirect()->back()
            ->with('success','Profile Updated');
        }else {
            return redirect()->route('login');
        }
    }

    public function myOrders() {
        if(session()->has('customer')) {
            $customer = Customer::where('email',session('customer'))->first(['id','email']);
            $orders = Order::where('customer_id',$customer->id)
            ->orderBy('id','DESC')
            ->distinct()
            ->get('order_id');
            $banner_image_exists = Option::where('option_name','banner_image')->exists();
            if($banner_image_exists) {
                $banner_image = Option::where('option_name','banner_image')->first()->option_value;
                if(!File::exists(public_path($banner_image))) {
                    $banner_image = 'frontend/img/bg_banner.jpg';
                }
            }else {
                $banner_image = 'frontend/img/bg_banner.jpg';
            }
            return view('customer.orders')->with(compact(['orders','banner_image']));
        }else {
            return redirect()->route('login');
        }
    }

    public function myOrderDetails(Request $request) {
        if(session()->has('customer')) {
            $customer = Customer::where('email',session('customer'))->first(['id','email']);
            $orders = Order::where('order_id',$request->order_id)
            ->orderBy('id','DESC')
            ->get();
            $banner_image_exists = Option::where('option_name','banner_image')->exists();
            if($banner_image_exists) {
                $banner_image = Option::where('option_name','banner_image')->first()->option_value;
                if(!File::exists(public_path($banner_image))) {
                    $banner_image = 'frontend/img/bg_banner.jpg';
                }
            }else {
                $banner_image = 'frontend/img/bg_banner.jpg';
            }
            return view('customer.order-details')->with(compact(['orders','banner_image']));
        }else {
            return redirect()->route('login');
        }
    }

    public function changePassword() {
        if(session()->has('customer')) {
            $banner_image_exists = Option::where('option_name','banner_image')->exists();
            if($banner_image_exists) {
                $banner_image = Option::where('option_name','banner_image')->first()->option_value;
                if(!File::exists(public_path($banner_image))) {
                    $banner_image = 'frontend/img/bg_banner.jpg';
                }
            }else {
                $banner_image = 'frontend/img/bg_banner.jpg';
            }
            return view('customer.change-password')->with(compact(['banner_image']));
        }else {
            return redirect()->route('login');
        }
    }

    public function updatePassword(Request $request) {
        if(session()->has('customer')) {
            $customer = Customer::where('email',session('customer'))
            ->first(['id','email','password']);
            $customer_id = $customer->id;
            $password = $request->password;
            $confirmPassword = $request->confirmPassword;
            $oldPassword = $request->oldPassword;
            
            if($password != $confirmPassword) {
                return redirect()->back()
                ->with('error','Password Confirmation Failed');
            }
            if(!(Hash::check($oldPassword,$customer->password))) {
                return redirect()->back()
                ->with('error','Old password not match');
            }
            Customer::where('id',$customer_id)->update(
                [
                    'password' => Hash::make($password)
                ]
            );
            return redirect()->back()
            ->with('success','Password Changed');
        }else {
            return redirect()->route('login');
        }
    }

    public function changeCustomerStatus(Request $request) {
        $customer_id = $request->customer_id;
        $customer_status = Customer::firstWhere('id',$customer_id)->status;
        if($customer_status == 1) {
            Customer::where('id',$customer_id)->update(
                [
                    'status' => 0
                ]
            );
            return redirect()->back()
            ->with('success','Customer deactivated');
        }
        if($customer_status == 0) {
            Customer::where('id',$customer_id)->update(
                [
                    'status' => 1
                ]
            );
            return redirect()->back()
            ->with('success','Customer activated');
        }
        return redirect()->back();
    }

    public function exit() {
        if(session()->has('customer')) {
            session()->flush();
            return redirect()->route('home');
        }else {
            return redirect()->route('login');
        }
    }
}

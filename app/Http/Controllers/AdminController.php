<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Customer;
use App\Models\CMS;
use File;
use DB;

class AdminController extends Controller
{
    public function admin() {
        if(session()->has('admin')) {
            return redirect()->route('dashboard');
        }else {
            return view('admin.login');
        }
    }

    public function adminAuth(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $adminExists = Admin::where('email',$email)
        ->orWhere('username',$email)
        ->exists();
        if($adminExists) {
            $admin = Admin::where('email',$email)
            ->orWhere('username',$email)
            ->first();
            if(Hash::check($password,$admin->password)) {
                session()->put('admin',$admin->id);
                return response()->json(
                    [
                        'status' => 'Successfully Authenticated',
                        'email' => $email,
                        'password' => $password
                    ]
                );
            }else {
                return response()->json(
                    [
                        'status' => 'Password not match'
                    ]
                );
            }
        }else {
            return response()->json(
                [
                    'status' => 'Email or Username not registered'
                ]
            );
        }
    }

    public function dashboard() {
        if(session()->has('admin')) {
           
            $customer_count = Customer::count();
            $page_count = CMS::count();
            $event_count    =DB::table('events')->count();
            $customer_count =DB::table('customers')->count();
            $booking_count  =DB::table('orders')->count();
           
            
            return view('admin.dashboard')
            ->with(compact(['customer_count','page_count','event_count','customer_count','booking_count']));
        }else {
            return redirect()->route('admin');
        }
    }
    
    
     public function my_profile() {
        if(session()->has('admin')) {
           $admin = Admin::where('id',session('admin'))->first();
            return view('admin.my_profile')->with(compact(['admin']));
        }else {
            return redirect()->route('admin');
        }
    }
    
     public function update_profile(Request $request) {
        if(session()->has('admin')) {
            if($request->has('name') && $request->name != '' && $request->name != null) {
                $name = $request->name;
                Admin::where('id',session('admin'))->update(
                    [
                        'name' => $name
                    ]
                );
            }
    
            if($request->has('username') && $request->username != '' && $request->username != null) {
                $username = $request->username;
                Admin::where('id',session('admin'))->update(
                    [
                        'username' => $username
                    ]
                );
            }
    
            if($request->has('email') && $request->email != '' && $request->email != null) {
                $email = $request->email;
                $emailTaken = Admin::where('email',$email)
                ->where('id','!=',session('admin'))->exists();
                if($emailTaken) {
                    return redirect()->back()->with('error','Email Already Taken');
                }else {
                    Admin::where('id',session('admin'))->update(
                        [
                            'email' => $email
                        ]
                    );
                }
            }
    
            if($request->has('phone') && $request->phone != '' && $request->phone != null) {
                $phone = $request->phone;
                Admin::where('id',session('admin'))->update(
                    [
                        'phone' => $phone
                    ]
                );
            }
            
            if($request->has('image')) {
                $admin = Admin::where('id',session('admin'))->first(['id','image']);
                if(File::exists(public_path($admin->image))) {
                    File::delete(public_path($admin->image));
                }
                $image_file = $request->file('image');
                $image_file_name = time().$image_file->getClientOriginalName();
                $image = $image_file->move('profile',$image_file_name);
                Admin::where('id',session('admin'))->update(
                    [
                        'image' => $image
                    ]
                );
            }
            return redirect()->route('my-profile')->with('success','Profile Updated successfully');
        }else {
            return redirect()->route('admin');
        }
    }

    public function adminChangePassword() {
        if(session()->has('admin')) {
             return view('admin.change-password');
        }else {
             return redirect()->route('admin');
        }
    }

    public function updateAdminPassword(Request $request) {
        if(session()->has('admin')) {
            $password = $request->password;
            $confirm_password = $request->confirm_password;
            $old_password = $request->old_password;
            if($password == $confirm_password) {
                $admin = Admin::where('id',session('admin'))->first(['id','password']);
                if(Hash::check($old_password,$admin->password)) {
                    $admin = Admin::where('id',session('admin'))->update(
                        [
                            'password' => Hash::make($password)
                        ]
                    );
                    return redirect()->back()
                    ->with('success','Password Changed');
                }else {
                    return redirect()->back()
                    ->with('error','Old password not matched');
                }
            }else {
                return redirect()->back()
                ->with('error','Password Confirmation Failed');
            }
        }else {
                return redirect()->route('admin');
        }
    }
    
    
    public function logout() {
        session()->flush();
        return redirect()->route('admin');
    }

}

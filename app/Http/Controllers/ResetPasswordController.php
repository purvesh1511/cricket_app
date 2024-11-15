<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResetPassword;
use App\Models\Customer;
use App\Models\Admin;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Mail;

class ResetPasswordController extends Controller
{
    public function renderSendEmailForm(Request $request) {
        return view('customer.forgot-password.render-send-email-form');
    }

    public function renderLoginForm(Request $request) {
        return view('customer.forgot-password.render-login-form');
    }

    public function sendVerificationMail(Request $request) {
        $email = $request->email;
        if(Customer::where('email',$email)->exists()) {
            $customer = Customer::where('email',$email)->first(['id','email','fname']);
            $code = strtoupper(Str::random(6));
            ResetPassword::updateOrCreate(
                [
                    'customer_id' => $customer->id
                ],
                [
                    'customer_id' => $customer->id,
                    'code' => $code
                ]
            );
            $support_email_exists = Option::where('option_name','support_email')->exists();
            if($support_email_exists) {
                $support_email = Option::where('option_name','support_email')->first()->option_value;
            }else {
                $support_email = 'admin@marsportz.com';
            }
            $auto_reply_email_exists = Option::where('option_name','auto_reply_email')->exists();
            if($auto_reply_email_exists) {
                $auto_reply_email = Option::where('option_name','auto_reply_email')->first()->option_value;
            }else {
                $auto_reply_email = 'admin@marsportz.com';
            }
            $site_name_exists = Option::where('option_name','site_name')->exists();
            if($site_name_exists) {
                $site_name = Option::where('option_name','site_name')->first()->option_value;
            }else {
                $site_name = '';
            }
            $data = [
                'code' => $code,
                'fname' => $customer->fname,
                'email' => $email,
                'support_email' => $support_email
            ];
            $email = 'info@web.cricademia.com';
            Mail::send('customer.forgot-password.forgot-password-mail', $data, function($message) use($email, $site_name) {
                $message->from(env("MAIL_FROM_ADDRESS"),$site_name);
                $message->to($email)->subject('Reset Password');
            });
            session()->put('reset_password_customer_id',$customer->id);
            return response()->json(
                [
                    'status' => 'Code Sent'
                ]
            );
        }else {
            return response()->json(
                [
                    'status' => 'Email Not Registered'
                ]
            );
        }
    }

    public function renderVerificationForm(Request $request) {
        return view('customer.forgot-password.render-verification-form');
    }

    public function verifyEmail(Request $request) {
        if(session()->has('reset_password_customer_id')) {
            $customer_id = session('reset_password_customer_id');
            if(ResetPassword::where('customer_id',$customer_id)->exists()) {
                $code  = ResetPassword::where('customer_id',$customer_id)->first()->code;
                if($request->code == $code) {
                    ResetPassword::where('customer_id',$customer_id)->delete();
                    return response()->json(
                        [
                            'status' => 'Reset Password'
                        ]
                    );
                }else {
                    return response()->json(
                        [
                            'status' => 'Invalid Verification Code'
                        ]
                    );
                }
            }else {
                return response()->json(
                    [
                        'status' => 'Something went wrong'
                    ]
                );
            }
        }else {
            return response()->json(
                [
                    'status' => 'Something went wrong'
                ]
            );
        }
    }

    public function renderResetPasswordForm(Request $request) {
        return view('customer.forgot-password.render-reset-password-form');
    }

    public function resetPassword(Request $request) {
        if(session()->has('reset_password_customer_id')) {
            $password =  $request->password;
            $confirm_password = $request->confirm_password;
            if($password == $confirm_password) {
                $customer_id = session('reset_password_customer_id');
                Customer::find($customer_id)->update(
                    [
                        'password' => Hash::make($password)
                    ]
                );
                session()->forget('reset_password_customer_id');
                return response()->json(
                    [
                        'status' => 'Password Reset Successfully'
                    ]
                );
            }else {
                return response()->json(
                    [
                        'status' => 'Password confirmation not match'
                    ]
                );
            }
        }else {
            return response()->json(
                [
                    'status' => 'Something went wrong'
                ]
            );
        }
    }

    public function adminRenderSendEmailForm(Request $request) {
        return view('admin.forgot-password.render-send-email-form');
    }

    public function adminRenderLoginForm(Request $request) {
        return view('admin.forgot-password.render-login-form');
    }

    public function adminSendVerificationMail(Request $request) {
        $email = $request->email;
        if(Admin::where('email',$email)->exists()) {
            $admin = Admin::where('email',$email)->first(['id','email','name']);
            $code = strtoupper(Str::random(6));
            ResetPassword::updateOrCreate(
                [
                    'admin_id' => $admin->id
                ],
                [
                    'admin_id' => $admin->id,
                    'code' => $code
                ]
            );
            $support_email_exists = Option::where('option_name','support_email')->exists();
            if($support_email_exists) {
                $support_email = Option::where('option_name','support_email')->first()->option_value;
            }else {
                $support_email = 'admin@marsportz.com';
            }
            $auto_reply_email_exists = Option::where('option_name','auto_reply_email')->exists();
            if($auto_reply_email_exists) {
                $auto_reply_email = Option::where('option_name','auto_reply_email')->first()->option_value;
            }else {
                $auto_reply_email = 'admin@marsportz.com';
            }
            $site_name_exists = Option::where('option_name','site_name')->exists();
            if($site_name_exists) {
                $site_name = Option::where('option_name','site_name')->first()->option_value;
            }else {
                $site_name = '';
            }
            $data = [
                'code' => $code,
                'name' => $admin->name,
                'email' => $email,
                'reply_mail' => $auto_reply_email
            ];
            Mail::send('admin.forgot-password.forgot-password-mail', $data, function($message) use($email, $site_name) {
                $message->from(env("MAIL_FROM_ADDRESS"),$site_name);
                $message->to($email)->subject('Reset Password');
            });
            session()->put('reset_password_admin_id',$admin->id);
            return response()->json(
                [
                    'status' => 'Code Sent'
                ]
            );
        }else {
            return response()->json(
                [
                    'status' => 'Email Not Registered'
                ]
            );
        }
    }

    public function adminRenderVerificationForm(Request $request) {
        return view('admin.forgot-password.render-verification-form');
    }

    public function adminVerifyEmail(Request $request) {
        if(session()->has('reset_password_admin_id')) {
            $admin_id = session('reset_password_admin_id');
            if(ResetPassword::where('admin_id',$admin_id)->exists()) {
                $code  = ResetPassword::where('admin_id',$admin_id)->first()->code;
                if($request->code == $code) {
                    ResetPassword::where('admin_id',$admin_id)->delete();
                    return response()->json(
                        [
                            'status' => 'Reset Password'
                        ]
                    );
                }else {
                    return response()->json(
                        [
                            'status' => 'Invalid Verification Code'
                        ]
                    );
                }
            }else {
                return response()->json(
                    [
                        'status' => 'Something went wrong'
                    ]
                );
            }
        }else {
            return response()->json(
                [
                    'status' => 'Something went wrong'
                ]
            );
        }
    }

    public function adminRenderResetPasswordForm(Request $request) {
        return view('admin.forgot-password.render-reset-password-form');
    }

    public function adminResetPassword(Request $request) {
        if(session()->has('reset_password_admin_id')) {
            $password =  $request->password;
            $confirm_password = $request->confirm_password;
            if($password == $confirm_password) {
                $admin_id = session('reset_password_admin_id');
                Admin::find($admin_id)->update(
                    [
                        'password' => Hash::make($password)
                    ]
                );
                session()->forget('reset_password_admin_id');
                return response()->json(
                    [
                        'status' => 'Password Reset Successfully'
                    ]
                );
            }else {
                return response()->json(
                    [
                        'status' => 'Password confirmation not match'
                    ]
                );
            }
        }else {
            return response()->json(
                [
                    'status' => 'Something went wrong'
                ]
            );
        }
    }
}

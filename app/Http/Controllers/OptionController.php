<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use File;
use DB;
class OptionController extends Controller
{
    public function settings() {
        if(session()->has('admin')) {

            $site_url_exists = Option::where('option_name','site_url')->exists();
            if($site_url_exists) {
                $site_url = Option::where('option_name','site_url')->first()->option_value;
            }else {
                $site_url = '';
            }

            $site_name_exists = Option::where('option_name','site_name')->exists();
            if($site_name_exists) {
                $site_name = Option::where('option_name','site_name')->first()->option_value;
            }else {
                $site_name = '';
            }
            
            $site_description_exists = Option::where('option_name','site_description')->exists();
            if($site_description_exists) {
                $site_description = Option::where('option_name','site_description')->first()->option_value;
            }else {
                $site_description = '';
            }

            $support_email_exists = Option::where('option_name','support_email')->exists();
            if($support_email_exists) {
                $support_email = Option::where('option_name','support_email')->first()->option_value;
            }else {
                $support_email = '';
            }

            $auto_reply_email_exists = Option::where('option_name','auto_reply_email')->exists();
            if($auto_reply_email_exists) {
                $auto_reply_email = Option::where('option_name','auto_reply_email')->first()->option_value;
            }else {
                $auto_reply_email = '';
            }

            $date_format_exists = Option::where('option_name','date_format')->exists();
            if($date_format_exists) {
                $date_format = Option::where('option_name','date_format')->first()->option_value;
            }else {
                $date_format = '';
            }

            $time_format_exists = Option::where('option_name','time_format')->exists();
            if($time_format_exists) {
                $time_format = Option::where('option_name','time_format')->first()->option_value;
            }else {
                $time_format = '';
            }

            $razorpay_api_key_exists = Option::where('option_name','razorpay_api_key')->exists();
            if($razorpay_api_key_exists) {
                $razorpay_api_key = Option::where('option_name','razorpay_api_key')->first()->option_value;
            }else {
                $razorpay_api_key = '';
            }

            $razorpay_api_secret_exists = Option::where('option_name','razorpay_api_secret')->exists();
            if($razorpay_api_secret_exists) {
                $razorpay_api_secret = Option::where('option_name','razorpay_api_secret')->first()->option_value;
            }else {
                $razorpay_api_secret = '';
            }

            $header_code_exists = Option::where('option_name','header_code')->exists();
            if($header_code_exists) {
                $header_code = Option::where('option_name','header_code')->first()->option_value;
            }else {
                $header_code = '';
            }

            $footer_code_exists = Option::where('option_name','footer_code')->exists();
            if($footer_code_exists) {
                $footer_code = Option::where('option_name','footer_code')->first()->option_value;
            }else {
                $footer_code = '';
            }

            $google_analytics_code_exists = Option::where('option_name','google_analytics_code')->exists();
            if($google_analytics_code_exists) {
                $google_analytics_code = Option::where('option_name','google_analytics_code')->first()->option_value;
            }else {
                $google_analytics_code = '';
            }


            $from_email_exists = Option::where('option_name','from_email')->exists();
            if($from_email_exists) {
                $from_email = Option::where('option_name','from_email')->first()->option_value;
            }else {
                $from_email = '';
            }

            $from_email_exists = Option::where('option_name','site_mode')->exists();
            if($from_email_exists) {
                $site_mode = Option::where('option_name','site_mode')->first()->option_value;
            }else {
                $site_mode = '';
            }
            
            $AdminDet=DB::table('admins')->where('id',1)->first();
            $to_email = $AdminDet->email;

            $banner_image_exists = Option::where('option_name','banner_image')->exists();
            if($banner_image_exists) {
                $banner_image = Option::where('option_name','banner_image')->first()->option_value;
                if(!File::exists(public_path($banner_image))) {
                    $banner_image = 'frontend/img/bg_banner.jpg';
                }
            }else {
                $banner_image = 'frontend/img/bg_banner.jpg';
            }

            $cash_on_delivery_exists = Option::where(
                [
                    'option_name' => 'payment_option',
                    'option_value' => 'cash_on_delivery'
                ]
            )->exists();

            $online_payment_exists = Option::where(
                [
                    'option_name' => 'payment_option',
                    'option_value' => 'online_payment'
                ]
            )->exists();

            return view('admin.settings')->with(compact(['site_url','site_name','site_description','support_email','auto_reply_email','date_format','time_format','razorpay_api_key','razorpay_api_secret','header_code','footer_code','google_analytics_code','cash_on_delivery_exists','online_payment_exists','banner_image','from_email','to_email','site_mode']));
        }else {
            return view('admin.login');
        }
    }

    public function updateSettings(Request $request) {
       
        if($request->has('site_url') && $request->site_url != null) {
            $site_url = $request->site_url;
            Option::updateOrCreate(
                [
                    'option_name' => 'site_url'
                ],
                [
                    'option_name' => 'site_url',
                    'option_value' => $site_url
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'site_url'
                ]
            )->delete();
        }
        if($request->has('site_name') && $request->site_name != null) {
            $site_name = $request->site_name;
            Option::updateOrCreate(
                [
                    'option_name' => 'site_name'
                ],
                [
                    'option_name' => 'site_name',
                    'option_value' => $site_name
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'site_name'
                ]
            )->delete();
        }
 
        if($request->has('site_description') && $request->site_description != null) {
            $site_description = $request->site_description;
            Option::updateOrCreate(
                [
                    'option_name' => 'site_description'
                ],
                [
                    'option_name' => 'site_description',
                    'option_value' => $site_description
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'site_description'
                ]
            )->delete();
        }

        if($request->has('support_email') && $request->support_email != null) {
            $support_email = $request->support_email;
            Option::updateOrCreate(
                [
                    'option_name' => 'support_email'
                ],
                [
                    'option_name' => 'support_email',
                    'option_value' => $support_email
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'support_email'
                ]
            )->delete();
        }

        if($request->has('from_email') && $request->from_email != null) {
            $from_email = $request->from_email;
            Option::updateOrCreate(
                [
                    'option_name' => 'from_email'
                ],
                [
                    'option_name' => 'from_email',
                    'option_value' => $from_email
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'from_email'
                ]
            )->delete();
        }

        if($request->has('auto_reply_email') && $request->auto_reply_email != null) {
            $auto_reply_email = $request->auto_reply_email;
            Option::updateOrCreate(
                [
                    'option_name' => 'auto_reply_email'
                ],
                [
                    'option_name' => 'auto_reply_email',
                    'option_value' => $auto_reply_email
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'auto_reply_email'
                ]
            )->delete();
        }

        if($request->has('date_format') && $request->date_format != null) {
            $date_format = $request->date_format;
            Option::updateOrCreate(
                [
                    'option_name' => 'date_format'
                ],
                [
                    'option_name' => 'date_format',
                    'option_value' => $date_format
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'date_format'
                ]
            )->delete();
        }

        if($request->has('time_format') && $request->time_format != null) {
            $time_format = $request->time_format;
            Option::updateOrCreate(
                [
                    'option_name' => 'time_format'
                ],
                [
                    'option_name' => 'time_format',
                    'option_value' => $time_format
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'time_format'
                ]
            )->delete();
        }
        
        
        if($request->has('header_code') && $request->header_code != null) {
            $header_code = $request->header_code;
            Option::updateOrCreate(
                [
                    'option_name' => 'header_code'
                ],
                [
                    'option_name' => 'header_code',
                    'option_value' => $header_code
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'header_code'
                ]
            )->delete();
        }

        if($request->has('footer_code') && $request->footer_code != null) {
            $footer_code = $request->footer_code;
            Option::updateOrCreate(
                [
                    'option_name' => 'footer_code'
                ],
                [
                    'option_name' => 'footer_code',
                    'option_value' => $footer_code
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'footer_code'
                ]
            )->delete();
        }

        if($request->has('google_analytics_code') && $request->google_analytics_code != null) {
            $google_analytics_code = $request->google_analytics_code;
            Option::updateOrCreate(
                [
                    'option_name' => 'google_analytics_code'
                ],
                [
                    'option_name' => 'google_analytics_code',
                    'option_value' => $google_analytics_code
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'google_analytics_code'
                ]
            )->delete();
        }
   
        if($request->has('banner_image') && $request->banner_image != null) {
            $banner_image_exists = Option::where('option_name','banner_image')->exists();
            if($banner_image_exists) {
                $banner_image = Option::where('option_name','banner_image')->first()->option_value;
            /*    if(File::exists(public_path($banner_image))) {
                    File::delete(public_path($banner_image));
                } */
            }
            $banner_image_file = $request->file('banner_image');
            $banner_image_name = time().$banner_image_file->getClientOriginalName();
            $banner_image = $banner_image_file->move('page_banner_image',$banner_image_name);
            Option::updateOrCreate(
                [
                    'option_name' => 'banner_image'
                ],
                [
                    'option_name' => 'banner_image',
                    'option_value' => $banner_image
                ]
            );
        }

        Option::where(
            [
                'option_name' => 'payment_option'
            ]
        )->delete();

        if($request->has('payment_option') && $request->payment_option != null) {
            $payment_options = $request->payment_option;
            foreach($payment_options as $payment_option) {
                Option::updateOrCreate(
                    [
                        'option_name' => 'payment_option',
                        'option_value' => $payment_option
                    ],
                    [
                        'option_name' => 'payment_option',
                        'option_value' => $payment_option
                    ]
                );
            }
        }

        // if($request->has('site_mode') && $request->site_mode != null) {
            $site_mode = $request->site_mode ?? 0;
            Option::updateOrCreate(
                [
                    'option_name' => 'site_mode'
                ],
                [
                    'option_name' => 'site_mode',
                    'option_value' => $site_mode
                ]
            );
        // }else {
        //     Option::where(
        //         [
        //             'option_name' => 'site_mode'
        //         ]
        //     )->delete();
        // }
        // dd($request->all());

     /*   if($request->has('razorpay_api_key') && $request->razorpay_api_key != null) {
            $razorpay_api_key = $request->razorpay_api_key;
            Option::updateOrCreate(
                [
                    'option_name' => 'razorpay_api_key'
                ],
                [
                    'option_name' => 'razorpay_api_key',
                    'option_value' => $razorpay_api_key
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'razorpay_api_key'
                ]
            )->delete();
            Option::where(
                [
                    'option_name' => 'payment_option',
                    'option_value' => 'online_payment'
                ]
            )->delete();
        }

        if($request->has('razorpay_api_secret') && $request->razorpay_api_secret != null) {
            $razorpay_api_secret = $request->razorpay_api_secret;
            Option::updateOrCreate(
                [
                    'option_name' => 'razorpay_api_secret'
                ],
                [
                    'option_name' => 'razorpay_api_secret',
                    'option_value' => $razorpay_api_secret
                ]
            );
        }else {
            Option::where(
                [
                    'option_name' => 'razorpay_api_secret'
                ]
            )->delete();
            Option::where(
                [
                    'option_name' => 'payment_option',
                    'option_value' => 'online_payment'
                ]
            )->delete();
        } */
        
        return redirect()->back()
        ->with('success','Settings Updated');
    }

    public function deleteBannerImage() {
        if(session()->has('admin')) {
            $banner_image_exists = Option::where('option_name','banner_image')->exists();
            if($banner_image_exists) {
                $banner_image = Option::where('option_name','banner_image')->first()->option_value;
                if(File::exists(public_path($banner_image))) {
                    File::delete(public_path($banner_image));
                }
            }
            Option::where('option_name','banner_image')->delete();
            return redirect()->back()
            ->with('success','Banner deleted');
        }else {
            return redirect()->route('admin');
        }
    }
}

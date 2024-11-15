<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    public function pages(){

        $meet_the_coach=DB::table('cms')->where('id',35)->first();
        return view('front.pages',compact('meet_the_coach'));
    }
}
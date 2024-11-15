<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SchedualController extends Controller
{
    public function matchSchedule(){
        return view('front.matchSchedule'); 
    }
}
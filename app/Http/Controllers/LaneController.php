<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lane;
use Illuminate\Support\Facades\Hash;
use File;
use Mail;
use DB;

class LaneController extends Controller
{
    public function lanes() {
        if(session()->has('admin')) {
            $lanes = Lane::orderBy('id','ASC')->lazy();
            return view('admin.lane.all-lane')->with(compact(['lanes']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function storeLane(Request $request) {
        if(session()->has('admin')) {
            $lane_name = $request->lane_name;
            $lane_price = $request->lane_price;
            
            $lane = Lane::updateOrCreate(
                [
                    'lane_name' => $lane_name,
                    'lane_price' => $lane_price
                ],
                [
                    'lane_name' => $lane_name,
                    'lane_price' => $lane_price
                ]
            );

            
            return redirect()->back()
            ->with('success','Lane Added');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteLane(Request $request) {
        if(session()->has('admin')) {
            $lane_id = $request->lane_id;
            Lane::where('id',$lane_id)->delete();
            return redirect()->back()
            ->with('suucess','Lane Deleted');
        }else {
            return redirect()->route('admin');
        }
    }

    public function editLane(Request $request) {
        if(session()->has('admin')) {
            $lane_id = $request->lane_id;
            $laneExists=DB::table('lane')->where('id',$lane_id)->exists();
            if(!$laneExists){
                return redirect()->back();
            }
            $lane= Lane::findOrFail($lane_id);
            return view('admin.lane.edit-lane')->with(compact(['lane']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateLane(Request $request) {
        if(session()->has('admin')) {
            $lane_id   = $request->lane_id;
            $lane_name = $request->lane_name;
            $lane_price = $request->lane_price;
            
            Lane::where('id',$lane_id)->update(
                [
                    'lane_name' => $lane_name,
                    'lane_price' => $lane_price
                ]
            );
            
            return redirect()->back()
            ->with('success','Lane Details Updated');
        }else {
            return redirect()->route('admin');
        }
    }

    
   

    public function changeLaneStatus(Request $request) {
        $lane_id = $request->lane_id;
        $lane_status = Lane::firstWhere('id',$lane_id)->status;
        if($lane_status == 1) {
            Lane::where('id',$lane_id)->update(
                [
                    'status' => 0
                ]
            );
            return redirect()->back()
            ->with('success','Lane deactivated');
        }
        if($lane_status == 0) {
            Lane::where('id',$lane_id)->update(
                [
                    'status' => 1
                ]
            );
            return redirect()->back()
            ->with('success','Lane activated');
        }
        return redirect()->back();
    }

    
}

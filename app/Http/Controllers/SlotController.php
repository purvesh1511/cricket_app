<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slot;
use Illuminate\Support\Facades\Hash;
use File;
use Mail;
use DB;

class SlotController extends Controller
{
    public function slots() {
        if(session()->has('admin')) {
            $slots = Slot::orderBy('id','ASC')->lazy();
            return view('admin.slot.all-slot')->with(compact(['slots']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function storeSlot(Request $request) {
        if(session()->has('admin')) {
            $slot_name = $request->slot_name;
           
            
            $lane = Slot::updateOrCreate(
                [
                    'slot_name' => $slot_name
                ],
                [
                    'slot_name' => $slot_name
                ]
            );

            
            return redirect()->back()
            ->with('success','Slot Added');
        }else {
            return redirect()->route('admin');
        }
    }

    public function deleteSlot(Request $request) {
        if(session()->has('admin')) {
            $slot_id = $request->slot_id;
            Slot::where('id',$slot_id)->delete();
            return redirect()->back()
            ->with('suucess','Slot Deleted');
        }else {
            return redirect()->route('admin');
        }
    }

    public function editSlot(Request $request) {
        if(session()->has('admin')) {
            $slot_id = $request->slot_id;
            $slotExists=DB::table('slot_master')->where('id',$slot_id)->exists();
            if(!$slotExists){
                return redirect()->back();
            }
            $slot= Slot::findOrFail($slot_id);
            return view('admin.slot.edit-slot')->with(compact(['slot']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function updateSlot(Request $request) {
        if(session()->has('admin')) {
            $slot_id   = $request->slot_id;
            $slot_name = $request->slot_name;
            
            
            Slot::where('id',$slot_id)->update(
                [
                    'slot_name' => $slot_name
                ]
            );
            
            return redirect()->back()
            ->with('success','Slot Details Updated');
        }else {
            return redirect()->route('admin');
        }
    }

    
   

    public function changeSlotStatus(Request $request) {
        $slot_id = $request->slot_id;
        $slot_status = Slot::firstWhere('id',$slot_id)->status;
        if($slot_status == 1) {
            Slot::where('id',$slot_id)->update(
                [
                    'status' => 0
                ]
            );
            return redirect()->back()
            ->with('success','Slot deactivated');
        }
        if($slot_status == 0) {
            Slot::where('id',$slot_id)->update(
                [
                    'status' => 1
                ]
            );
            return redirect()->back()
            ->with('success','Slot activated');
        }
        return redirect()->back();
    }

    
}

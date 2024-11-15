<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Slug;
use File;
use DB;

class DisableSlotController extends Controller
{
    public function addDisableSlot() {
        if(session()->has('admin')) {
            
            $day_master  =DB::table('day_master')->orderBy('id','ASC')->get();
            $slot_master =DB::table('slot_master')->where('status',1)->orderBy('id','ASC')->get();
            $lane_master =DB::table('lane')->where('status',1)->orderBy('id','ASC')->get();
            return view('admin.disable-slot.add-lane-slot',compact('day_master','slot_master','lane_master'));
        }else {
            return redirect()->route('admin');
        }
    }

    public function StoreDisableSlot(Request $request) {
       

        $day_name =$request->day;
        $date =date('Y-m-d',strtotime($day_name));
        $DateExists=DB::table('disable_lane_slot')->where('date',$date)->exists();
        if($DateExists){
            return redirect()->route('manage-disable-slot')->with('error','Slot Already Exists'); 
        }
        $slot_master =DB::table('slot_master')->where('status',1)->orderBy('id','ASC')->get();
        $lane_master =DB::table('lane')->where('status',1)->orderBy('id','ASC')->get();
        foreach($slot_master as $slot){
            $slot_key="slot_".$slot->id;
            $slot_id =$request->$slot_key;
                 $comasepLaneIDs="";
                  foreach($lane_master as $lane){
                    $lane_key="lane_".$lane->id."_".$slot->id;
                    $lane_id=$request->$lane_key;
                        if(empty($comasepLaneIDs)){
                            $comasepLaneIDs=$lane_id;
                        }else{
                            $comasepLaneIDs=$comasepLaneIDs.",".$lane_id;
                        }
                  }
             if(!empty($comasepLaneIDs)){  
             DB::table('disable_lane_slot')->insert([
              'date'=>$date,
              'slot_id'=>$slot_id,
              'lane_ids'=>$comasepLaneIDs
             ]);
            }

        }
        return redirect()->route('manage-disable-slot')->with('success','Lane Slot Added Successfully');
    }

    public function ManageDisableSlot() {
        if(session()->has('admin')) {
            
            $day_master  =DB::table('disable_lane_slot')->orderBy('id','DESC')->get();
                     
            return view('admin.disable-slot.manage-lane-slot')->with(compact(['day_master']));
        }else {
            return redirect()->route('admin');
        }
    }


    public function EditDisableSlot(Request $request) {
        if(session()->has('admin')) {
            $day= $request->day;
            
            $slot_master =DB::table('slot_master')->where('status',1)->orderBy('id','ASC')->get();
            $lane_master =DB::table('lane')->where('status',1)->orderBy('id','ASC')->get();

            $DateExists=DB::table('disable_lane_slot')->where('date',$day)->exists();
            if(!$DateExists){
                return redirect()->route('manage-disable-slot')->with('error','Slot Already Exists'); 
            }
            $single_slot =DB::table('disable_lane_slot')->where('date',$day)->get();
            return view('admin.disable-slot.edit-lane-slot',compact('slot_master','lane_master','single_slot'));
        }else {
            return redirect()->route('admin');
        }
    }

    public function UpdateDisableSlot(Request $request){

        $day_name =$request->hid_day;
        
        $slot_master =DB::table('slot_master')->where('status',1)->orderBy('id','ASC')->get();
        $lane_master =DB::table('lane')->where('status',1)->orderBy('id','ASC')->get();
        foreach($slot_master as $slot){
            $slot_key="slot_".$slot->id;
            $slot_id =$request->$slot_key;
                 $comasepLaneIDs="";
                  foreach($lane_master as $lane){
                    $lane_key="lane_".$lane->id."_".$slot->id;

                    if (isset($_POST[$lane_key]) && $_POST[$lane_key] !== '') {
                        $lane_id=$request->$lane_key;
                    }else{

                        $lane_id=0;   
                    }
                    
                        if(empty($comasepLaneIDs)){
                            $comasepLaneIDs=$lane_id;
                        }else{
                            $comasepLaneIDs=$comasepLaneIDs.",".$lane_id;
                        }
                  }
             $SlotExists=DB::table('disable_lane_slot')->where('date',$day_name)->where('slot_id',$slot_id)->exists();  
             if($SlotExists){
                DB::table('disable_lane_slot')->where('date',$day_name)->where('slot_id',$slot_id)->update([
              
                    'lane_ids'=>$comasepLaneIDs
                   ]);
             } else{
                if(!empty($comasepLaneIDs)){  
                    DB::table('disable_lane_slot')->insert([
                     'date'=>$day_name,
                     'slot_id'=>$slot_id,
                     'lane_ids'=>$comasepLaneIDs
                    ]);
                   }
             }  
            

        }
        return redirect()->route('manage-disable-slot')->with('success','Lane Slot Updated Successfully');
        
    }

    

    
    public function DeleteDisableSlot(Request $request) {
        $id = $request->id;
        
        
        DB::table('disable_lane_slot')->where('id',$id)->delete();
        return redirect()->back()
        ->with('success','Sloat Deleted');
    }

    
}

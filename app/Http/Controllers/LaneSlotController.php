<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Slug;
use File;
use DB;

class LaneSlotController extends Controller
{
    public function addLaneSlot() {
        if(session()->has('admin')) {
            
            $day_master  =DB::table('day_master')->orderBy('id','ASC')->get();
            $slot_master =DB::table('slot_master')->where('status',1)->orderBy('id','ASC')->get();
            $lane_master =DB::table('lane')->where('status',1)->orderBy('id','ASC')->get();
            return view('admin.lane-slot.add-lane-slot',compact('day_master','slot_master','lane_master'));
        }else {
            return redirect()->route('admin');
        }
    }

    public function StoreLaneSlot(Request $request) {
       

        $day_name =$request->day;
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
                DB::table('lane_slot')->insert([
                    'day'=>$day_name,
                    'slot_id'=>$slot_id,
                    'lane_ids'=>$comasepLaneIDs
                   ]);
             }     
             

        }
        return redirect()->route('manage-lane-slot')->with('success','Lane Slot Added Successfully');
    }

    public function ManageLaneSlot() {
        if(session()->has('admin')) {
            
            $day_master  =DB::table('day_master')->orderBy('id','ASC')->get();
                     
            return view('admin.lane-slot.manage-lane-slot')->with(compact(['day_master']));
        }else {
            return redirect()->route('admin');
        }
    }


    public function EditLaneSlot(Request $request) {
        if(session()->has('admin')) {
            $day= $request->day;
            $day_master  =DB::table('day_master')->orderBy('id','ASC')->get();
            $slot_master =DB::table('slot_master')->where('status',1)->orderBy('id','ASC')->get();
            $lane_master =DB::table('lane')->where('status',1)->orderBy('id','ASC')->get();
            $slotExists =DB::table('lane_slot')->where('day',$day)->exists();
            if(!$slotExists){
                return redirect()->back();
            }
            $single_slot =DB::table('lane_slot')->where('day',$day)->get();
            return view('admin.lane-slot.edit-lane-slot',compact('day_master','slot_master','lane_master','single_slot'));
        }else {
            return redirect()->route('admin');
        }
    }

    public function UpdateLaneSlot(Request $request){

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
                  $SlotExists=DB::table('lane_slot')->where('day',$day_name)->where('slot_id',$slot_id)->exists(); 
                  if($SlotExists){ 
                    DB::table('lane_slot')->where('day',$day_name)->where('slot_id',$slot_id)->update([
              
                        'lane_ids'=>$comasepLaneIDs
                       ]);
                  }else{
                    if(!empty($comasepLaneIDs)){
                        DB::table('lane_slot')->insert([
                            'day'=>$day_name,
                            'slot_id'=>$slot_id,
                            'lane_ids'=>$comasepLaneIDs
                           ]);
                     }     

                  }   
             

        }
        return redirect()->route('manage-lane-slot')->with('success','Lane Slot Updated Successfully');
        
    }

    

    
    public function DeleteLaneSlot(Request $request) {
        $day = $request->day;
        
        
        DB::table('lane_slot')->where('day',$day)->delete();
        return redirect()->back()
        ->with('success','Sloat Deleted');
    }

    public function changeaAchivementStatus(Request $request){
        $page_id = $request->page_id; 
        $page=DB::table('achievements')->where('id',$page_id)->get();
        $status = $page[0]->status;
        if($status == 1) {
           DB::table('achievements')->where('id',$page_id)->update(['status'=>0]);
            return redirect()->back()
            ->with('success','Page deactivated');
        }
        if($status == 0) {
            DB::table('achievements')->where('id',$page_id)->update(['status'=>1]);
            return redirect()->back()
            ->with('success','Achivement activated');
        }
        return redirect()->back();
    }

    public function deletePageImage(Request $request) {
        $page_id = $request->page_id;
        $cms = CMS::where('id',$page_id)->first(['id','page_image']);
        if(File::exists(public_path($cms->page_image))) {
            File::delete(public_path($cms->page_image));
        }
        CMS::where('id',$page_id)->update(
            [
                'page_image' => ''
            ]
        );
        return redirect()->back()
        ->with('success','Image Removed');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Slug;
use File;
use DB;

class EventController extends Controller
{
    public function addEvent() {
        if(session()->has('admin')) {
            return view('admin.event.add-page');
        }else {
            return redirect()->route('admin');
        }
    }

    public function storeEvent(Request $request) {
        
        if(session()->has('admin')) {
           
            $event_date = date('Y-m-d',strtotime($request->event_date));
            $event_time = $request->event_time;
			$event_title = $request->event_title;
			$page_description = $request->page_description;
			$event_venue = $request->event_venue;
			$event_capacity = $request->event_capacity;
            $event_price = $request->event_price;
           
            
            
        /*    if($request->file('page_image')!='')
            {
            $image_file = $request->file('page_image');
            $image_file_name = time().$image_file->getClientOriginalName();
            $image = $image_file->move('page_image',$image_file_name);
        }else{
            $image='';
        }*/
        
        
            $insert=DB::table('events')->insert([
                'event_date'=>$event_date,
                'event_time'=>$event_time,
                'event_name'=>$event_title,
				'event_descrption'=>$page_description,
				'event_address'=>$event_venue,
				'event_no_of_person'=>$event_capacity,
                'event_price'=>$event_price
                ]);
           if($insert){  
            return redirect()->route('all-event')
            ->with('success','Event Added');
           }
        }else {
            
            return redirect()->route('admin');
        }
    }

    public function allEvent() {
        if(session()->has('admin')) {
            $pages = DB::table('events')->orderBy('event_id','DESC')->get();
            return view('admin.event.all-pages')->with(compact(['pages']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function editEvent(Request $request) {
        $page_id = $request->page_id;
        $eventExist = DB::table('events')->where('event_id',$page_id)->exists();
        if(!$eventExist){
            return redirect()->back();
        }
        $page = DB::table('events')->where('event_id',$page_id)->first();
        return view('admin.event.edit-page')->with(compact(['page']));
    }

    public function updateEvent(Request $request) {
        $page_id = $request->page_id;
            $event_date = date('Y-m-d',strtotime($request->event_date));
            $event_time = $request->event_time;
			$event_title = $request->event_title;
			$page_description = $request->page_description;
			$event_venue = $request->event_venue;
			$event_capacity = $request->event_capacity;
            $event_price = $request->event_price;
        
        
        DB::table('events')->where('event_id',$page_id)->update([
            'event_date'=>$event_date,
            'event_time'=>$event_time,
            'event_name'=>$event_title,
            'event_descrption'=>$page_description,
            'event_address'=>$event_venue,
            'event_no_of_person'=>$event_capacity,
            'event_price'=>$event_price
            ]);
       
        
        return redirect()->back()
        ->with('success','Event Updated');
    }

    public function deleteEvent(Request $request) {
        $page_id = $request->page_id;
        
        
        DB::table('events')->where('event_id',$page_id)->delete();
        return redirect()->back()
        ->with('success','Event Deleted');
    }

    public function changeaEventStatus(Request $request){
        $page_id = $request->page_id; 
        $page=DB::table('events')->where('event_id',$page_id)->get();
        $status = $page[0]->event_status;
        if($status == 1) {
           DB::table('events')->where('event_id',$page_id)->update(['event_status'=>0]);
            return redirect()->back()
            ->with('success','Event deactivated');
        }
        if($status == 0) {
            DB::table('events')->where('event_id',$page_id)->update(['event_status'=>1]);
            return redirect()->back()
            ->with('success','Event activated');
        }
        return redirect()->back();
    }

    public function deletePageImage(Request $request) {
        $page_id = $request->page_id;
        $cms = CMS::where('id',$page_id)->first(['event_id','page_image']);
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

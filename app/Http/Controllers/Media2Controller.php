<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Slug;
use File;
use DB;


class Media2Controller extends Controller
{
    public function addMedia() {
        if(session()->has('admin')) {
            return view('admin.media2.add-page');
        }else {
            return redirect()->route('admin');
        }
    }

    public function storeMedia(Request $request) {
        
        if(session()->has('admin')) {
           
            
            
            
            if($request->file('page_image')!='')
            {
            $image_file = $request->file('page_image');
            $image_file_name = time().$image_file->getClientOriginalName();
            $image = $image_file->move('page_image',$image_file_name);
        }else{
            $image='';
        }
        $image_url=env("APP_URL").'public/page_image/'.$image_file_name;
        
        
            $insert=DB::table('gallery')->insert([
                'file_name'=>$image_file_name,
                'image_link'=>$image_url
                ]);
           if($insert){  
            // return redirect()->route('add-media')
            // ->with('success','Media Added');
            return view('admin.media2.add-page',compact('image_url'));
           }
        }else {
            
            return redirect()->route('admin');
        }
    }

    public function allMedia() {
        if(session()->has('admin')) {
            $pages = DB::table('gallery')->orderBy('id','DESC')->get();
            return view('admin.media2.all-pages')->with(compact(['pages']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function editMedia(Request $request) {
        $page_id = $request->page_id;
        $pageExists = DB::table('gallery')->where('id',$page_id)->exists();
        if(!$pageExists){
            return redirect()->back();
        }
        $page = DB::table('gallery')->where('id',$page_id)->get();
        return view('admin.media2.edit-page')->with(compact(['page']));
    }

    public function updateMedia(Request $request) {
        $page_id = $request->page_id;
        
        $page = DB::table('gallery')->where('id',$page_id)->first();
        if($request->has('page_image')) {
            if(File::exists(public_path('page_image/'.$page->file_name))) {
                File::delete(public_path('page_image/'.$page->file_name));
            } 
            $image_file = $request->file('page_image');
            $image_file_name = time().$image_file->getClientOriginalName();
            $image = $image_file->move('page_image',$image_file_name);
            $image_url=env("APP_URL").'public/page_image/'.$image_file_name;
            DB::table('gallery')->where('id',$page_id)->update(['file_name'=>$image_file_name,'image_link'=>$image_url]);
        }
        return redirect()->back()
        ->with('success','Media Updated');
    }

    public function deleteMedia(Request $request) {
        $page_id = $request->page_id;
        $page = DB::table('gallery')->where('id',$page_id)->first();
        if(File::exists(public_path('page_image/'.$page->file_name))) {
            File::delete(public_path('page_image/'.$page->file_name));
        } 
        
        DB::table('gallery')->where('id',$page_id)->delete();
        return redirect()->back()
        ->with('success','Media Deleted');
    }

    public function changeaMediaStatus(Request $request){
        $page_id = $request->page_id; 
        $page=DB::table('gallery')->where('id',$page_id)->get();
        $status = $page[0]->status;
        if($status == 1) {
           DB::table('gallery')->where('id',$page_id)->update(['status'=>0]);
            return redirect()->back()
            ->with('success','Media deactivated');
        }
        if($status == 0) {
            DB::table('gallery')->where('id',$page_id)->update(['status'=>1]);
            return redirect()->back()
            ->with('success','Media activated');
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

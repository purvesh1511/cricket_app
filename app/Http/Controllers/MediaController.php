<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Slug;
use File;
use DB;


class MediaController extends Controller
{
    public function addMedia() {
        if(session()->has('admin')) {
            $gallery_category=DB::table('gallery_category')->orderBy('id','DESC')->get();
            return view('admin.media.add-page',compact('gallery_category'));
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
        
        
            $insert=DB::table('media')->insert([
                'category_id'=>$request->category_id,
                'file_name'=>$image_file_name,
                'image_link'=>$image_url
                ]);
           if($insert){  
            // return redirect()->route('add-media')
            // ->with('success','Media Added');
            $gallery_category=DB::table('gallery_category')->orderBy('id','DESC')->get();
            return view('admin.media.add-page',compact('image_url','gallery_category'));
           }
        }else {
            
            return redirect()->route('admin');
        }
    }

    public function allMedia() {
        if(session()->has('admin')) {
            $pages = DB::table('media')->orderBy('id','DESC')->get();
            return view('admin.media.all-pages')->with(compact(['pages']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function editMedia(Request $request) {
        $page_id = $request->page_id;
        $pageExists = DB::table('media')->where('id',$page_id)->exists();
        if(!$pageExists){
            return redirect()->back();
        }
        $page = DB::table('media')->where('id',$page_id)->get();
        $gallery_category=DB::table('gallery_category')->orderBy('id','DESC')->get();
        return view('admin.media.edit-page')->with(compact(['page','gallery_category']));
    }

    public function updateMedia(Request $request) {
        $page_id = $request->page_id;
       
        $page = DB::table('media')->where('id',$page_id)->first();
        if($request->has('page_image')) {
            if(File::exists(public_path('page_image/'.$page->file_name))) {
                File::delete(public_path('page_image/'.$page->file_name));
            } 
            $image_file = $request->file('page_image');
            $image_file_name = time().$image_file->getClientOriginalName();
            $image = $image_file->move('page_image',$image_file_name);
            $image_url=env("APP_URL").'public/page_image/'.$image_file_name;
            DB::table('media')->where('id',$page_id)->update(['file_name'=>$image_file_name,'image_link'=>$image_url,'category_id'=>$request->category_id]);
        }
        DB::table('media')->where('id',$page_id)->update(['category_id'=>$request->category_id]);
        return redirect()->back()
        ->with('success','Media Updated');
    }

    public function deleteMedia(Request $request) {
        $page_id = $request->page_id;
        $page = DB::table('media')->where('id',$page_id)->first();
        if(File::exists(public_path('page_image/'.$page->file_name))) {
            File::delete(public_path('page_image/'.$page->file_name));
        } 
        
        DB::table('media')->where('id',$page_id)->delete();
        return redirect()->back()
        ->with('success','Media Deleted');
    }

    public function changeaMediaStatus(Request $request){
        $page_id = $request->page_id; 
        $page=DB::table('media')->where('id',$page_id)->get();
        $status = $page[0]->status;
        if($status == 1) {
           DB::table('media')->where('id',$page_id)->update(['status'=>0]);
            return redirect()->back()
            ->with('success','Media deactivated');
        }
        if($status == 0) {
            DB::table('media')->where('id',$page_id)->update(['status'=>1]);
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

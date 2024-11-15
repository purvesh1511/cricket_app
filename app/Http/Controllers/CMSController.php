<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Slug;
use File;


use DB;

class CMSController extends Controller
{
    public function addPage() {
        if(session()->has('admin')) {
            return view('admin.page.add-page');
        }else {
            return redirect()->route('admin');
        }
    }

    public function storePage(Request $request) {
        
        if(session()->has('admin')) {
           
            $page_name = $request->page_name;
            $page_description = $request->page_description;
           
            $meta_title = $request->meta_title;
            $meta_keyword = $request->meta_keyword;
            $meta_description = $request->meta_description;
            $slug = $request->slug;
            $slugExists = Slug::where('slug',$slug)
            ->exists();
            if($slugExists) {
                return redirect()->back()
                ->with('error','Slug already taken');
            }
            
            if($request->file('page_image')!='')
            {
            $image_file = $request->file('page_image');
            $image_file_name = time().$image_file->getClientOriginalName();
            $image = $image_file->move('page_image',$image_file_name);
        }else{
            $image='';
        }
        
            CMS::updateOrCreate(
                [
                    'page_name' => $page_name,
                    'page_description' => $page_description
                ],
                [
                    'page_name' => $page_name,
                    'page_description' => $page_description,
                    'meta_title'=>$meta_title,
                    'meta_keyword'=>$meta_keyword,
                    'meta_description'=>$meta_description,
                    'slug'=> $slug,
                    'page_image' => $image
                ]
            );
            Slug::updateOrCreate(
                [
                    'slug' => $slug,
                    'type' => 'page'
                ],
                [
                    'slug' => $slug,
                    'type' => 'page'
                ]
            );
             
            return redirect()->route('all-pages')
            ->with('success','Page Added');
        }else {
            
            return redirect()->route('admin');
        }
    }

    public function allPages() {
        if(session()->has('admin')) {
            $pages = CMS::orderBy('id','DESC')->lazy();
            return view('admin.page.all-pages')->with(compact(['pages']));
        }else {
            return redirect()->route('admin');
        }
    }

    public function editPage(Request $request) {
        $page_id = $request->page_id;
        $pageExists=DB::table('cms')->where('id',$page_id)->exists();
        if(!$pageExists){
            return redirect()->back();
        }
        $page = CMS::find($page_id);
        return view('admin.page.edit-page')->with(compact(['page']));
    }

    public function updatePage(Request $request) {
        $page_id = $request->page_id;
        $page_name = $request->page_name;
        $page_description = $request->page_description;
       
        $meta_title = $request->meta_title;
        $meta_keyword = $request->meta_keyword;
        $meta_description = $request->meta_description;
        $slug = $request->slug;
        $slugExists = CMS::where('slug',$slug)
        ->where('id','!=',$page_id)
        ->exists();
        $nonPageSlugExists = Slug::where('slug',$slug)
        ->where('type','!=','page')
        ->exists();
        if($slugExists || $nonPageSlugExists) {
            return redirect()->back()
            ->with('error','Slug already taken');
        }
        $cms = CMS::where('id',$page_id)->first(['id','page_image','slug']);
        CMS::where('id',$page_id)->update(
            [
                'page_name' => $page_name,
                'page_description' => $page_description,
                
                'meta_title' => $meta_title,
                'meta_keyword' => $meta_keyword,
                'meta_description' => $meta_description,
                'slug'=> $slug
            ]
        );
        if($slug != $cms->slug) {
            Slug::where('slug',$cms->slug)->delete();
            Slug::updateOrCreate(
                [
                    'slug' => $slug,
                    'type' => 'page'
                ],
                [
                    'slug' => $slug,
                    'type' => 'page'
                ]
            );
        }
        if($request->has('page_image')) {
            if(File::exists(public_path($cms->page_image))) {
                File::delete(public_path($cms->page_image));
            } 
            $image_file = $request->file('page_image');
            $image_file_name = time().$image_file->getClientOriginalName();
            $image = $image_file->move('page_image',$image_file_name);
            CMS::where('id',$page_id)->update(
                [
                    'page_image' => $image
                ]
            );
        }
        return redirect()->back()
        ->with('success','Page Updated');
    }

    public function deletePage(Request $request) {
        $page_id = $request->page_id;
        $cms = CMS::where('id',$page_id)->first(['id','page_image','slug']);
        if(File::exists(public_path($cms->page_image))) {
            File::delete(public_path($cms->page_image));
        }
        Slug::where(
            [
                'slug' => $cms->slug,
                'type' => 'page'
            ]
        )->delete();
        CMS::where('id',$page_id)->delete();
        return redirect()->back()
        ->with('success','Page Deleted');
    }

    public function changePageStatus(Request $request){
        $page_id = $request->page_id; 
        $page = CMS::findOrFail($page_id);
        $status = $page->status;
        if($status == 1) {
            CMS::where('id',$page_id)->update(
                [
                    'status' => 0
                ]
            );
            return redirect()->back()
            ->with('success','Page deactivated');
        }
        if($status == 0) {
            CMS::where('id',$page_id)->update(
                [
                    'status' => 1
                ]
            );
            return redirect()->back()
            ->with('success','Page activated');
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

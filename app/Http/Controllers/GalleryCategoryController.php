<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Slug;
use File;
use DB;

class GalleryCategoryController extends Controller
{
    public function addGallerycategory()
    {

        if (session()->has('admin')) {
            return view('admin.gallery-category.add-page');
        } else {
            return redirect()->route('admin');
        }
    }

    public function storeGallerycategory(Request $request)
    {
        if (session()->has('admin')) {
            $page_name = $request->page_name;
            $page_description = $request->page_description;
            $sort_order = $request->sort_order;
            if ($request->file('page_image') != '') {
                $image_file = $request->file('page_image');
                $image_file_name = time() . $image_file->getClientOriginalName();
                $image = $image_file->move('page_image', $image_file_name);
            } else {
                $image = '';
            }
            $insert = DB::table('gallery_category')->insert([
                'heading' => $page_name,
                'description' => $page_description,
                'image' => $image_file_name,
                'sort_order' => $sort_order
            ]);
            if ($insert) {
                return redirect()->route('all-gallerycategory')->with('success', 'Category Added');
            }
        } else {

            return redirect()->route('admin');
        }
    }

    public function allGallerycategory()
    {
        if (session()->has('admin')) {
            $pages = DB::table('gallery_category')->orderBy('id', 'DESC')->get();
            return view('admin.gallery-category.all-pages')->with(compact(['pages']));
        } else {
            return redirect()->route('admin');
        }
    }

    public function editGallerycategory(Request $request)
    {
        $page_id = $request->page_id;
        $achiveExists = DB::table('gallery_category')->where('id', $page_id)->exists();
        if (!$achiveExists) {
            return redirect()->back();
        }
        $page = DB::table('gallery_category')->where('id', $page_id)->get();
        return view('admin.gallery-category.edit-page')->with(compact(['page']));
    }

    public function updateGallerycategory(Request $request)
    {
        $page_id = $request->page_id;
        $page_name = $request->page_name;
        $page_description = $request->page_description;
        $sort_order = $request->sort_order ?? 1;
        $page = DB::table('gallery_category')->where('id', $page_id)->first();
        DB::table('gallery_category')->where('id', $page_id)->update([
            'heading' => $page_name,
            'description' => $page_description,
            'sort_order' => $sort_order ?? 1
        ]);

        if ($request->has('page_image')) {
            if (File::exists(public_path('page_image/' . $page->image))) {
                File::delete(public_path('page_image/' . $page->image));
            }
            $image_file = $request->file('page_image');
            $image_file_name = time() . $image_file->getClientOriginalName();
            $image = $image_file->move('page_image', $image_file_name);
            DB::table('gallery_category')->where('id', $page_id)->update(['image' => $image_file_name]);
        }
        return redirect()->back()
            ->with('success', 'Gallery Category Updated');
    }

    public function deleteGallerycategory(Request $request)
    {
        $page_id = $request->page_id;
        $page = DB::table('gallery_category')->where('id', $page_id)->first();
        if (File::exists(public_path('page_image/' . $page->image))) {
            File::delete(public_path('page_image/' . $page->image));
        }

        DB::table('gallery_category')->where('id', $page_id)->delete();
        return redirect()->back()
            ->with('success', 'Gallery Category Deleted');
    }

    public function changeaGallerycategoryStatus(Request $request)
    {
        $page_id = $request->page_id;
        $page = DB::table('gallery_category')->where('id', $page_id)->get();
        $status = $page[0]->status;
        if ($status == 1) {
            DB::table('gallery_category')->where('id', $page_id)->update(['status' => 0]);
            return redirect()->back()
                ->with('success', 'Category deactivated');
        }
        if ($status == 0) {
            DB::table('gallery_category')->where('id', $page_id)->update(['status' => 1]);
            return redirect()->back()
                ->with('success', 'Category activated');
        }
        return redirect()->back();
    }
}

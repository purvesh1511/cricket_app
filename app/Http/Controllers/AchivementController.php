<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use App\Models\Slug;
use File;
use DB;

class AchivementController extends Controller
{
    public function addAchivement()
    {

        if (session()->has('admin')) {
            return view('admin.achivement.add-page');
        } else {
            return redirect()->route('admin');
        }
    }

    public function storeAchivement(Request $request)
    {
        if (session()->has('admin')) {
            $page_name = $request->page_name;
            $page_description = $request->page_description;
            $sort_order = $request->sort_order;
            $image_file_name = "";
            if ($request->file('page_image') != '') {
                $image_file = $request->file('page_image');
                $image_file_name = time() . $image_file->getClientOriginalName();
                $image = $image_file->move('page_image', $image_file_name);
            } else {
                $image = '';
            }
            $insert = DB::table('achievements')->insert([
                'heading' => $page_name,
                'description' => $page_description,
                'image' => $image_file_name,
                'sort_order' => $sort_order
            ]);
            if ($insert) {
                return redirect()->route('all-achivement')->with('success', 'Achivement Added');
            }
        } else {
            return redirect()->route('admin');
        }
    }

    public function allAchivement()
    {
        if (session()->has('admin')) {
            $pages = DB::table('achievements')->orderBy('id', 'DESC')->get();
            return view('admin.achivement.all-pages')->with(compact(['pages']));
        } else {
            return redirect()->route('admin');
        }
    }

    public function editAchivement(Request $request)
    {
        $page_id = $request->page_id;
        $achiveExists = DB::table('achievements')->where('id', $page_id)->exists();
        if (!$achiveExists) {
            return redirect()->back();
        }
        $page = DB::table('achievements')->where('id', $page_id)->get();
        return view('admin.achivement.edit-page')->with(compact(['page']));
    }

    public function updateAchivement(Request $request)
    {
        $page_id = $request->page_id;
        $page_name = $request->page_name;
        $page_description = $request->page_description;
        $sort_order = $request->sort_order;
        $page = DB::table('achievements')->where('id', $page_id)->first();

        DB::table('achievements')->where('id', $page_id)->update([
            'heading' => $page_name,
            'description' => $page_description,
            'sort_order' => $sort_order
        ]);

        if ($request->has('page_image')) {
            if (File::exists(public_path('page_image/' . $page->image))) {
                File::delete(public_path('page_image/' . $page->image));
            }
            $image_file = $request->file('page_image');
            $image_file_name = time() . $image_file->getClientOriginalName();
            $image = $image_file->move('page_image', $image_file_name);
            DB::table('achievements')->where('id', $page_id)->update(['image' => $image_file_name]);
        }
        return redirect()->back()
            ->with('success', 'Achivement Updated');
    }

    public function deleteAchivement(Request $request)
    {
        $page_id = $request->page_id;
        $page = DB::table('achievements')->where('id', $page_id)->first();
        if (File::exists(public_path('page_image/' . $page->image))) {
            File::delete(public_path('page_image/' . $page->image));
        }

        DB::table('achievements')->where('id', $page_id)->delete();
        return redirect()->back()
            ->with('success', 'Achivement Deleted');
    }

    public function changeaAchivementStatus(Request $request)
    {
        $page_id = $request->page_id;
        $page = DB::table('achievements')->where('id', $page_id)->get();
        $status = $page[0]->status;
        if ($status == 1) {
            DB::table('achievements')->where('id', $page_id)->update(['status' => 0]);
            return redirect()->back()
                ->with('success', 'Page deactivated');
        }
        if ($status == 0) {
            DB::table('achievements')->where('id', $page_id)->update(['status' => 1]);
            return redirect()->back()
                ->with('success', 'Achivement activated');
        }
        return redirect()->back();
    }

    public function deletePageImage(Request $request)
    {
        $page_id = $request->page_id;
        $cms = DB::table('achievements')->where('id', $page_id)->first(['id', 'image']);
        if (File::exists(public_path($cms->image))) {
            File::delete(public_path($cms->image));
        }
        DB::table('achievements')->where('id', $page_id)->update(
            [
                'image' => ''
            ]
        );
        return redirect()->back()
            ->with('success', 'Image Removed');
    }
}

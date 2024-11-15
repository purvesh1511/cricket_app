<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slug;
use App\Models\CMS;
use App\Models\Tag;
use App\Models\Option;
use File;

class SlugController extends Controller
{
    public function registerSlug() {
        if(session()->has('admin')) {
            $pages = CMS::get(['id','slug']);
            foreach ($pages as $page) {
                Slug::updateOrCreate(
                    [
                        'slug' => $page->slug,
                        'type' => 'page'
                    ]
                );
            }
            $tags = Tag::get(['id','slug']);
            foreach ($tags as $tag) {
                Tag::updateOrCreate(
                    [
                        'slug' => $tag->slug,
                        'type' => 'tag'
                    ]
                );
            }
            return redirect()->back()
            ->with('success','All Slugs Registered');
        }else {
            return redirect()->route('admin');
        }
    }

    public function slug($slug) {
        $slugExists = Slug::where('slug',$slug)
        ->exists();
        if($slugExists) {
            $slug = Slug::where('slug',$slug)
            ->first();
            if($slug->type == 'page') {
                $pageExists = CMS::where('slug',$slug->slug)
                ->where('status',1)
                ->exists();
                if($pageExists) {
                    $banner_image_exists = Option::where('option_name','banner_image')->exists();
                    if($banner_image_exists) {
                        $banner_image = Option::where('option_name','banner_image')->first()->option_value;
                        if(!File::exists(public_path($banner_image))) {
                            $banner_image = 'frontend/img/bg_banner.jpg';
                        }
                    }else {
                        $banner_image = 'frontend/img/bg_banner.jpg';
                    }
                    $page = CMS::where('slug',$slug->slug)->first();
                    return view('front.page')->with(compact(['page','banner_image']));
                }else {
                    abort(404);
                }
            }
            if($slug->type == 'tag') {
                $tagExists = Tag::where('slug',$slug->slug)
                ->where('status',1)
                ->exists();
                if($tagExists) {
                    $tag = Tag::where('slug',$slug->slug)->first();
                    return view('front.tag')->with(compact(['tag']));
                }else {
                    abort(404);
                }
            }
        }else {
            abort(404);
        }
    }
}

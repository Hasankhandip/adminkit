<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendBanner;
use Exception;
use Illuminate\Http\Request;

class BannerController extends Controller {
    public function index() {
        $pageTitle      = "Manage Banner Section";
        $bannerContents = FrontendBanner::first();
        return view('admin.frontend.banner.index', compact('pageTitle', 'bannerContents'));
    }

    public function store(Request $request) {

        $request->validate([
            'title'         => 'required|string',
            'description'   => 'required|string|max:1000',
            'button_name_1' => 'required|string',
            'button_name_2' => 'required|string',
            'button_link_1' => 'required|string',
            'button_link_2' => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $frontendBanner = FrontendBanner::first();

        if (! $frontendBanner) {
            $frontendBanner = new FrontendBanner();
        }

        $frontendBanner->title         = $request->title;
        $frontendBanner->description   = $request->description;
        $frontendBanner->button_name_1 = $request->button_name_1;
        $frontendBanner->button_name_2 = $request->button_name_2;
        $frontendBanner->button_link_1 = $request->button_link_1;
        $frontendBanner->button_link_2 = $request->button_link_2;

        if ($request->hasFile('image')) {
            try {
                $folderPath            = "assets/images/frontend/banner/image/";
                $imageName             = uploadImage($request->image, $folderPath, $frontendBanner->image);
                $frontendBanner->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }

        $frontendBanner->save();
        return back()->with('success', 'The banned content has been updated');
    }
}

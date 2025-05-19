<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendAbout;
use Exception;
use Illuminate\Http\Request;

class AboutController extends Controller {
    public function index() {
        $pageTitle    = "Manage About Content";
        $aboutContent = FrontendAbout::first();
        return view('admin.frontend.about.index', compact('pageTitle', 'aboutContent'));
    }

    public function store(Request $request) {
        $request->validate([
            'subtitle'        => 'required|string',
            'title'           => 'required|string',
            'description'     => 'required|string|max:1000',
            'button_name_one' => 'required|string',
            'button_link_one' => 'required|string',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $about = FrontendAbout::first();
        if (! $about) {
            $about = new FrontendAbout();
        }
        $about->subtitle        = $request->subtitle;
        $about->title           = $request->title;
        $about->description     = $request->description;
        $about->button_name_one = $request->button_name_one;
        $about->button_link_one = $request->button_link_one;

        if ($request->hasFile('image')) {
            try {
                $folderPath   = "assets/images/frontend/about/image/";
                $imageName    = uploadImage($request->image, $folderPath, $about->image);
                $about->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be updated");
            }
        }
        $about->save();
        return back()->with('success', 'The about content has been updated');
    }
}

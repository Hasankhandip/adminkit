<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendAbout;
use Exception;
use Illuminate\Http\Request;

class AboutController extends Controller {
    public function index() {
        $pageTitle     = "Manage About Section";
        $aboutContents = FrontendAbout::first();
        return view('admin.manageFrontend.about', compact('pageTitle', 'aboutContents'));
    }

    public function store(Request $request) {
        $request->validate([
            'subtitle'      => 'required|string',
            'title'         => 'required|string',
            'description'   => 'required|string|max:1000',
            'button_name_1' => 'required|string',
            'button_link_1' => 'required|string',
            'image'         => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $frontendAbout = FrontendAbout::first();
        if (! $frontendAbout) {
            $frontendAbout = new FrontendAbout();
        }
        $frontendAbout->subtitle      = $request->subtitle;
        $frontendAbout->title         = $request->title;
        $frontendAbout->description   = $request->description;
        $frontendAbout->button_name_1 = $request->button_name_1;
        $frontendAbout->button_link_1 = $request->button_link_1;
        if ($request->hasFile('image')) {
            try {
                $folderPath   = "assets/images/frontend/about/image/";
                $oldImagePath = public_path($folderPath . $frontendAbout->image);
                if ($frontendAbout->image && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path($folderPath), $imageName);
                $frontendAbout->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }
        $frontendAbout->save();
        return redirect()->route('index')->with('success', 'Your Category has been created! ');
    }
}

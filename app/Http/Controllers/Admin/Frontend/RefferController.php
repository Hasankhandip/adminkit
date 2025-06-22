<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendReffer;
use Exception;
use Illuminate\Http\Request;

class RefferController extends Controller {
    public function index() {
        $pageTitle     = "Manage Reffer Content";
        $refferContent = FrontendReffer::first();
        return view('admin.frontend.reffer.index', compact('pageTitle', 'refferContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'title'       => 'required|string',
            'description' => 'required|string|max:1000',
            'button_name' => 'required|string',
            'button_link' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $refferContent = FrontendReffer::first();
        if (! $refferContent) {
            $refferContent = new FrontendReffer();
        }

        $refferContent->title       = $request->title;
        $refferContent->description = $request->description;
        $refferContent->button_name = $request->button_name;
        $refferContent->button_link = $request->button_link;

        if ($request->hasFile('image')) {
            try {
                $folderPath           = "assets/images/frontend/reffer/image/";
                $imageName            = uploadImage($request->image, $folderPath, $refferContent->image);
                $refferContent->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }

        $refferContent->save();
        return back()->withSuccess('The reffer content has been updated');
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegisterItem;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function index() {
        $siteTitle       = "Register";
        $pageTitle       = "Manage Register Content";
        $registerContent = RegisterItem::first();

        return view('admin.register.index', compact('siteTitle', 'pageTitle', 'registerContent'));
    }

    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
            'info'     => 'required|string',
            'thumb'    => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $registerContent = RegisterItem::first();
        if (! $registerContent) {
            $registerContent = new RegisterItem();
        }

        $registerContent->subtitle = $request->subtitle;
        $registerContent->title    = $request->title;
        $registerContent->info     = $request->info;

        if ($request->hasFile('thumb')) {
            try {
                $folderPath             = "assets/images/register/thumb/";
                $imageName              = uploadImage($request->thumb, $folderPath, $registerContent->thumb);
                $registerContent->thumb = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }

        $registerContent->save();

        return back()->withSuccess("The register content has been updated");
    }
}

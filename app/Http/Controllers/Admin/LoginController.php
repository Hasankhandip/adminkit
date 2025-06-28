<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginItem;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller {
    public function index() {
        $pageTitle    = "Login";
        $loginContent = LoginItem::first();

        return view('admin.login.index', compact('pageTitle', 'loginContent'));
    }

    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
            'info'     => 'required|string',
            'thumb'    => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $loginContent = LoginItem::first();
        if (! $loginContent) {
            $loginContent = new LoginItem();
        }

        $loginContent->subtitle = $request->subtitle;
        $loginContent->title    = $request->title;
        $loginContent->info     = $request->info;

        if ($request->hasFile('thumb')) {
            try {
                $folderPath          = "assets/images/login/thumb/";
                $imageName           = uploadImage($request->thumb, $folderPath, $loginContent->thumb);
                $loginContent->thumb = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }

        $loginContent->save();

        return back()->withSuccess("The login content has been updated");
    }
}

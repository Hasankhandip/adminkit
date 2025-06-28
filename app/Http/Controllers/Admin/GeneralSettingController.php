<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use DateTimeZone;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller {
    public function index() {

        $pageTitle = "General Setting";
        $setting   = GeneralSetting::first();
        $timezones = DateTimeZone::listIdentifiers();

        return view('admin.general_setting.index', compact('pageTitle', 'setting', 'timezones'));
    }

    public function store(Request $request) {
        $request->validate([
            'site_name'       => 'required|string|max:255',
            'timezone'        => 'required|timezone',
            'currency_code'   => 'required|string',
            'currency_symbol' => 'required|string',
        ]);

        $setting = GeneralSetting::first();
        $setting->update($request->only([
            'site_name', 'timezone', 'currency_code', 'currency_symbol',
        ]));

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}

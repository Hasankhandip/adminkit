<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use DateTimeZone;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller {
    public function index() {
        $siteTitle = "General Setting";
        $pageTitle = "Manage General Settings";
        $setting   = GeneralSetting::firstOrCreate([]);
        $timezones = DateTimeZone::listIdentifiers();

        return view('admin.generalSetting.index', compact('siteTitle', 'pageTitle', 'setting', 'timezones'));
    }

    public function store(Request $request) {
        $request->validate([
            'site_name'       => 'required|string|max:255',
            'timezone'        => 'required|timezone',
            'currency'        => 'required|string|max:10',
            'currency_symbol' => 'required|string|max:5',
        ]);

        $setting = GeneralSetting::first();
        $setting->update($request->only([
            'site_name', 'timezone', 'currency', 'currency_symbol',
        ]));

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}

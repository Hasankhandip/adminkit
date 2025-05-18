<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendWork;
use Illuminate\Http\Request;

class WorkController extends Controller {
    public function index() {
        $pageTitle   = "Manage Work Section";
        $WorkContent = FrontendWork::first();
        return view('admin.frontend.work.index', compact('pageTitle', 'WorkContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
        ]);

        $frontendWork = FrontendWork::first();

        if (! $frontendWork) {
            $frontendWork = new FrontendWork();
        }

        $frontendWork->subtitle = $request->subtitle;
        $frontendWork->title    = $request->title;

        $frontendWork->save();
        return back()->with('success', 'The work content has been updated');
    }
}

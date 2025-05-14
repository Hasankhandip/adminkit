<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendService;
use Illuminate\Http\Request;

class ServiceController extends Controller {
    public function index() {
        $pageTitle       = "Manage Service Section";
        $serviceContents = FrontendService::first();
        return view('admin.manageFrontend.service', compact('pageTitle', 'serviceContents'));
    }
    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
        ]);

        $frontendService = FrontendService::first();

        if (! $frontendService) {
            $frontendService = new FrontendService();
        }

        $frontendService->subtitle = $request->subtitle;
        $frontendService->title    = $request->title;

        $frontendService->save();
        return redirect()->route('index')->with('success', 'Your Category has been created! ');
    }
}

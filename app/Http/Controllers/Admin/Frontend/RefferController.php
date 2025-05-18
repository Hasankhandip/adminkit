<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendReffer;
use Illuminate\Http\Request;

class RefferController extends Controller {
    public function index() {
        $pageTitle     = "Manage Reffer Section";
        $refferContent = FrontendReffer::first();
        return view('admin.frontend.reffer.index', compact('pageTitle', 'refferContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'title'           => 'required|string',
            'description'     => 'required|string|max:1000',
            'button_name_one' => 'required|string',
            'button_name_two' => 'required|string',
            'button_link_one' => 'required|string',
            'button_link_two' => 'required|string',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
    }
}

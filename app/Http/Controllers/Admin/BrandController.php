<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller {
    public function index() {
        $pageTitle = "Manage Brand";
        $brands    = Brand::all();
        return view('admin.brand.index', compact('pageTitle', 'brands'));
    }
    public function create() {
        $pageTitle = "Create Brand";
        return view('admin.brand.create', compact('pageTitle'));
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name'  => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $brands       = new Brand();
        $brands->name = $request->name;
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $brands->image = $imageName;
        $brands->save();

        return redirect()->route('admin.brand.index')->with('success', 'Your brand has been created!');
    }

    public function status($id) {
        $brand = Brand::findOrFail($id);
        if ($brand) {
            if ($brand->status) {
                $brand->status = 0;
            } else {
                $brand->status = 1;
            }
            $brand->save();
        }
        return back();
    }
    public function edit($id) {
        $pageTitle = "Edit Brand";
        $brandEdit = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('pageTitle', 'brandEdit'));
    }

    public function update($id, Request $request) {
        $validate = $request->validate([
            'name'  => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $brands       = Brand::findOrFail($id);
        $brands->name = $request->name;
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images'), $imageName);
            $brands->image = $imageName;
        }
        $brands->save();
        return redirect()->route('admin.brand.index')->with('success', 'Your brand has been updated!');
    }
}
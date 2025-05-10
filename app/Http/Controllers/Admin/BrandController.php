<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller {
    public function index() {
        $pageTitle = "Manage Brand";
        $brands    = Brand::orderBy('id', 'desc')->get();
        return view('admin.brand.index', compact('pageTitle', 'brands'));
    }
    public function create() {
        $pageTitle = "Create Brand";
        return view('admin.brand.create', compact('pageTitle'));
    }
    public function store(Request $request) {
        $request->validate([
            'name'  => 'required|unique:brands,name',
            'image' => 'nullable|mimes:png,jpg,jpeg',
        ]);

        $brand       = new Brand();
        $brand->name = $request->name;
        $brand->slug = str()->slug($request->name);

        if ($request->hasFile('image')) {
            try {
                $folderPath = 'assets/images/brand/';
                $imageName  = time() . '.' . $request->image->extension();
                $request->image->move(public_path($folderPath), $imageName);
                $brand->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }

        $brand->save();
        return redirect()->route('admin.brand.index')->with('success', 'Your brand has been created !');
    }

    public function edit($id) {
        $pageTitle = "Edit Brand";
        $brand     = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('pageTitle', 'brand'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'   => 'required|unique:brands,name,' . $id,
            'status' => 'required|boolean',
            'image'  => 'nullable|mimes:png,jpg,jpeg',
        ]);

        $brand       = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = str()->slug($request->name);

        if ($request->hasFile('image')) {
            try {
                $folderPath   = "assets/images/brand/";
                $oldImagePath = public_path($folderPath . $brand->image);

                if ($brand->image && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path($folderPath), $imageName);
                $brand->image = $imageName;

            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }

        $brand->status = $request->status ?? 0;
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Your brand has been updated !');
    }
}
<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        $pageTitle  = "Manage Category";
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.index', compact('pageTitle', 'categories'));
    }

    public function create() {
        $pageTitle = "Create Category";
        return view('admin.category.create', compact('pageTitle'));
    }

    public function store(Request $request) {

        $request->validate([
            'name'   => 'required|unique:categories,name',
            'status' => 'required|boolean',
            'image'  => 'required|mimes:png,jpg,jpeg',
        ]);

        $category       = new Category();
        $category->name = $request->name;
        $category->slug = str()->slug($request->name);

        if ($request->hasFile('image')) {
            try {
                $folderPath = "assets/images/category/";
                $imageName  = time() . '.' . $request->image->extension();
                $request->image->move(public_path($folderPath), $imageName);
                $category->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }

        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Your Category has been created! ');
    }

    public function edit($id) {
        $pageTitle = "Edit Category";
        $category  = Category::findOrFail($id);
        return view('admin.category.edit', compact('pageTitle', 'category'));
    }

    public function update(Request $request, $id) {

        $request->validate([
            'name'  => 'required|unique:categories,name,' . $id,
            'image' => 'nullable|mimes:png,jpg,jpeg',
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = str()->slug($request->name);

        if ($request->hasFile('image')) {
            try {
                $folderpath   = "assets/images/category/";
                $oldImagePath = public_path($folderpath . $category->image);

                if ($category->image && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path($folderpath), $imageName);
                $category->image = $imageName;

            } catch (Exception $ex) {

                return back()->with('error', "The image couldn't be uploaded");
            }
        }

        $category->status = $request->status ?? 0;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Your Category has been updated! ');
    }
}

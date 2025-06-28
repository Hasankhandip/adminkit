<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        $pageTitle  = "Category";
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.index', compact('pageTitle', 'categories'));
    }

    public function create() {
        $pageTitle = "Category";
        return view('admin.category.create', compact('pageTitle'));
    }

    public function store(Request $request) {

        $request->validate([
            'name'  => 'required|unique:categories,name',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
        ]);

        $category       = new Category();
        $category->name = $request->name;
        $category->slug = generatSlug($request->name);

        if ($request->hasFile('image')) {
            try {
                $folderPath      = "assets/images/category/";
                $imageName       = uploadImage($request->image, $folderPath, $category->image);
                $category->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }

        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Your Category has been created! ');
    }

    public function edit($id) {
        $pageTitle = "Category";
        $category  = Category::findOrFail($id);
        return view('admin.category.edit', compact('pageTitle', 'category'));
    }

    public function update(Request $request, $id) {

        $request->validate([
            'name'   => 'required|unique:categories,name,' . $id,
            'status' => 'required|boolean',
            'image'  => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = str()->slug($request->name);

        if ($request->hasFile('image')) {
            try {
                $folderPath      = "assets/images/category/";
                $imageName       = uploadImage($request->image, $folderPath, $category->image);
                $category->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be updated");
            }
        }

        $category->status = $request->status ?? 0;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Your Category has been updated! ');
    }

    public function delete($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->withSuccess('Category Item has been deleted');
    }

}

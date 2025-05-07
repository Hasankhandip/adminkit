<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        $pageTitle = "Manage Category";
        // $categories = ['categories' => Category::all()];
        return view('admin.category.index', ['categories' => Category::all()], compact('pageTitle'));
    }

    public function create() {
        $pageTitle = "Create Category";
        return view('admin.category.create', compact('pageTitle'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name'  => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
        ]);

        $imageName = null;
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $categories        = new Category();
        $categories->name  = $request->name;
        $categories->image = $imageName;
        // $categories->status = $request->status;
        $categories->save();

        return redirect()->route('admin.category.index')->with('success', 'Your post has been created! ');
    }
}

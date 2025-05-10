<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $pageTitle = "Manage Product";
        $products  = Product::orderBy('id', 'desc')->get();
        return view('admin.product.index', compact('products', 'pageTitle'));
    }

    public function create() {
        $pageTitle  = "Create Product";
        $categories = Category::orderBy('id', 'desc')->get();
        $brands     = Brand::orderBy('id', 'desc')->get();
        return view('admin.product.create', compact('brands', 'categories', 'pageTitle'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'        => 'required|unique:products,name',
            'brand_id'    => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'code'        => 'required|unique:products,code',
            'description' => 'required|string|max:1000',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
        ]);

        $product              = new Product();
        $product->name        = $request->name;
        $product->slug        = str()->slug($request->name);
        $product->brand_id    = $request->brand_id;
        $product->category_id = $request->category_id;
        if ($request->hasFile('thumbnail')) {
            try {
                $folderPath = "assets/images/product/";
                $imageName  = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path($folderPath), $imageName);
                $product->thumbnail = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }
        $product->code        = $request->code;
        $product->description = $request->description;
        $product->quantity    = $request->quantity;
        $product->price       = $request->price;

        $product->save();
        return redirect()->route('admin.product.index')->with('success', "Product has been created !");
    }

    public function edit($id) {
        $pageTitle  = "Edit Product";
        $product    = Product::findOrFail($id);
        $categories = Category::orderBy('id', 'desc')->get();
        $brands     = Brand::orderBy('id', 'desc')->get();
        return view('admin.product.edit', compact('product', 'brands', 'categories', 'pageTitle'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'        => 'required|unique:products,name,' . $id,
            'brand_id'    => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'code'        => 'required|unique:products,code,' . $id,
            'description' => 'required|string|max:1000',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
        ]);

        $product              = Product::findOrFail($id);
        $product->name        = $request->name;
        $product->slug        = str()->slug($request->name);
        $product->brand_id    = $request->brand_id;
        $product->category_id = $request->category_id;
        if ($request->hasFile('thumbnail')) {
            try {
                $folderPath   = "assets/images/product/";
                $oldImagePath = public_path($folderPath . $product->image);
                if ($product->image && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $imageName = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path($folderPath), $imageName);
                $product->thumbnail = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }
        $product->code        = $request->code;
        $product->description = $request->description;
        $product->quantity    = $request->quantity;
        $product->price       = $request->price;
        $product->save();
        return redirect()->route('admin.product.index')->with('success', "Product has been Updated !");
    }
}

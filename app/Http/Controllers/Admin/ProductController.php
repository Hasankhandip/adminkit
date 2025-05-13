<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
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
        $categories = Category::where('status', 1)->orderBy('name')->get();
        $brands     = Brand::where('status', 1)->orderBy('name')->get();
        return view('admin.product.create', compact('brands', 'categories', 'pageTitle'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'            => 'required|unique:products,name',
            'brand_id'        => 'required|exists:brands,id',
            'category_id'     => 'required|exists:categories,id',
            'thumbnail'       => 'required|image|mimes:jpg,jpeg,png',
            'description'     => 'required|string|max:1000',
            'price'           => 'required|numeric|gt:0',
            'quantity'        => 'required|numeric|gt:0',
            'image_gallery'   => 'required|array|min:1',
            'image_gallery.*' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $product              = new Product();
        $product->name        = $request->name;
        $product->slug        = str()->slug($request->name);
        $product->brand_id    = $request->brand_id;
        $product->category_id = $request->category_id;

        if ($request->hasFile('thumbnail')) {
            try {
                $folderPath = "assets/images/product/thumb/";
                $imageName  = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path($folderPath), $imageName);
                $product->thumbnail = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }

        $productCode           = max(Product::max('id'), 1) + 1000;
        $product->product_code = $productCode;
        $product->description  = $request->description;
        $product->quantity     = $request->quantity;
        $product->price        = $request->price;
        $product->save();

        foreach (($request->file('image_gallery') ?? []) as $galleryImage) {
            try {
                $productImage = new ProductImage();
                $folderPath   = "assets/images/product/image/";
                $imageName    = time() . '.' . $galleryImage->extension();
                $galleryImage->move(public_path($folderPath), $imageName);
                $productImage->product_id = $product->id;
                $productImage->image      = $imageName;
                $productImage->save();
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }
        return redirect()->route('admin.product.index')->withSuccess("Product has been created !");
    }

    public function edit($id) {
        $pageTitle  = "Edit Product";
        $product    = Product::with('productImages')->findOrFail($id);
        $categories = Category::orderBy('id', 'desc')->get();
        $brands     = Brand::orderBy('id', 'desc')->get();
        return view('admin.product.edit', compact('product', 'brands', 'categories', 'pageTitle'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'            => 'required|unique:products,name,' . $id,
            'brand_id'        => 'required|exists:brands,id',
            'category_id'     => 'required|exists:categories,id',
            'thumbnail'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description'     => 'required|string|max:1000',
            'quantity'        => 'required|integer|min:0',
            'price'           => 'required|numeric|min:0',
            'image_gallery'   => 'array|min:1',
            'image_gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,PNG,JPG',
        ]);

        $product              = Product::findOrFail($id);
        $product->name        = $request->name;
        $product->slug        = str()->slug($request->name);
        $product->brand_id    = $request->brand_id;
        $product->category_id = $request->category_id;
        if ($request->hasFile('thumbnail')) {
            try {
                $folderPath   = "assets/images/product/thumb/";
                $oldImagePath = public_path($folderPath . $product->thumbnail);
                if ($product->thumbnail && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $imageName = time() . '.' . $request->thumbnail->extension();
                $request->thumbnail->move(public_path($folderPath), $imageName);
                $product->thumbnail = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }
        $product->description = $request->description;
        $product->quantity    = $request->quantity;
        $product->price       = $request->price;
        $product->save();

        foreach (($request->file('image_gallery') ?? []) as $galleryImage) {
            try {
                $productImage = new ProductImage();
                $folderPath   = "assets/images/product/image/";
                $imageName    = time() . '.' . $galleryImage->extension();
                $galleryImage->move(public_path($folderPath), $imageName);
                $productImage->product_id = $product->id;
                $productImage->image      = $imageName;
                $productImage->save();
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }

        return redirect()->route('admin.product.index')->withSuccess("Product has been Updated !");
    }

    public function deleteImage($id, $productId) {

        $productImage = ProductImage::where('product_id', $productId)->findOrFail($id);
        $imageCount   = ProductImage::where('product_id', $productId)->count();

        if ($imageCount <= 1) {
            return back()->withError('At least one image required to the image gallery');
        }
        try {
            $folderPath   = "assets/images/product/image/";
            $oldImagePath = public_path($folderPath . $productImage->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $productImage->delete();
            return back()->withsuccess('The image deleted succesfully');
        } catch (Exception $ex) {
            return back()->withError("The image couldn't be deleted");
        }
    }
}

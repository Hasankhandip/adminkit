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
            'thumbnail'       => 'required|image|mimes:jpg,jpeg,png,webp',
            'description'     => 'required|string|max:1000',
            'price'           => 'required|numeric|gt:0',
            'image_gallery'   => 'required|array|min:1',
            'image_gallery.*' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $product              = new Product();
        $product->name        = $request->name;
        $product->slug        = generatSlug($request->name);
        $product->brand_id    = $request->brand_id;
        $product->category_id = $request->category_id;

        if ($request->hasFile('thumbnail')) {
            try {
                $folderPath         = "assets/images/product/thumb/";
                $imageName          = uploadImage($request->thumbnail, $folderPath, $product->thumbnail);
                $product->thumbnail = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }

        $product->description = $request->description;
        $product->price       = $request->price;
        $latestCode           = Product::max('code') ?? 1000;
        $product->code        = $latestCode + 1;
        $product->save();

        foreach (($request->file('image_gallery') ?? []) as $k => $galleryImage) {
            try {
                $productImage = new ProductImage();
                $folderPath   = "assets/images/product/image/";
                $imageName    = $k . "_" . time() . '.' . $galleryImage->extension();
                $galleryImage->move($folderPath, $imageName);
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
            'price'           => 'required|numeric|min:0',
            'stock'           => 'required|boolean',
            'image_gallery'   => 'array|min:1',
            'image_gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,PNG,JPG,webp',
        ]);

        $product              = Product::findOrFail($id);
        $product->name        = $request->name;
        $product->slug        = generatSlug($request->name);
        $product->brand_id    = $request->brand_id;
        $product->category_id = $request->category_id;
        if ($request->hasFile('thumbnail')) {
            try {
                $folderPath         = "assets/images/product/thumb/";
                $imageName          = uploadImage($request->thumbnail, $folderPath, $product->thumbnail);
                $product->thumbnail = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }
        $product->description = $request->description;
        $product->stock       = $request->stock ?? 0;
        $product->price       = $request->price;
        $product->save();

        foreach (($request->file('image_gallery') ?? []) as $galleryImage) {
            try {
                $productImage = new ProductImage();

                $folderPath               = "assets/images/product/image/";
                $imageName                = uploadImage($galleryImage, $folderPath);
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
            $oldImagePath = $folderPath . $productImage->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $productImage->delete();
            return back()->withsuccess('The image deleted succesfully');
        } catch (Exception $ex) {
            return back()->withError("The image couldn't be deleted");
        }
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->withSuccess('Product Item has been deleted');
    }

}

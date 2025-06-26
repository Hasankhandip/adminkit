<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller {
    public function index($categid = 0) {
        $siteTitle    = "product";
        $pageTitle    = "Products";
        $categories   = Category::where('status', 1)->get();
        $productQuery = Product::orderBy('id', 'desc');

        if ($categid) {
            $products = $productQuery->where('category_id', $categid)->paginate(8);
        }
        $products = $productQuery->paginate(8);
        return view('frontend.product.index', compact('siteTitle', 'pageTitle', 'products', 'categories'));
    }

    public function details($id) {
        $siteTitle = "Product Details";
        $pageTitle = "Product Details";
        $product   = Product::with('category')->findOrFail($id);
        $products  = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('id', 'desc')
            ->paginate(8);
        return view('frontend.product.details', compact('siteTitle', 'pageTitle', 'product', 'products'));
    }

    public function categoryProducts($categoryId) {
        $category  = Category::findOrFail($categoryId);
        $pageTitle = $category->name;
        $products  = Product::where('category_id', $categoryId)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('frontend.product.categoryProduct', compact('pageTitle', 'products'));
    }

    public function brandProducts($brandId) {
        $brand     = Brand::findOrFail($brandId);
        $pageTitle = $brand->name;
        $products  = Product::where('brand_id', $brandId)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('frontend.product.categoryProduct', compact('pageTitle', 'products'));
    }
}

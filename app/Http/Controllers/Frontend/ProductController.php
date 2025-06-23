<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller {
    public function index($categid = 0) {
        $pageTitle    = "Products";
        $categories   = Category::where('status', 1)->get();
        $productQuery = Product::orderBy('id', 'desc');
        if ($categid) {
            $products = $productQuery->where('category_id', $categid)->paginate(8);
        }
        $products = $productQuery->paginate(8);
        return view('frontend.product.index', compact('pageTitle', 'products', 'categories'));
    }
    public function details() {
        $pageTitle = "Product Details";
        return view('frontend.product.details', compact('pageTitle'));
    }
}

<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ProductController extends Controller {
    public function index() {
        $headTitle  = "BinaryEcom - Product";
        $innerTitle = "Products";
        return view('frontend.product.index', compact('headTitle', 'innerTitle'));
    }
    public function details() {
        $headTitle  = "BinaryEcom - Product Details";
        $innerTitle = "Product Details";
        return view('frontend.product.details', compact('headTitle', 'innerTitle'));
    }
}

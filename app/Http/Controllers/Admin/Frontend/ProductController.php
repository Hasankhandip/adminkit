<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendProduct;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $pageTitle      = "Product";
        $productContent = FrontendProduct::first();
        return view('admin.frontend.product.index', compact('pageTitle', 'productContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
        ]);

        $frontendProduct = FrontendProduct::first();

        if (! $frontendProduct) {
            $frontendProduct = new FrontendProduct();
        }

        $frontendProduct->subtitle = $request->subtitle;
        $frontendProduct->title    = $request->title;

        $frontendProduct->save();
        return back()->withSuccess('The product content has been updated');
    }

}

<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendProduct;
use App\Models\Frontend\FrontendProductItem;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $pageTitle      = "Manage Product Content";
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

    // item start
    public function itemIndex() {
        $pageTitle           = "Manage Product Item";
        $productItemContents = FrontendProductItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.product.item.index', compact('pageTitle', 'productItemContents'));
    }

    public function itemCreate() {
        $pageTitle           = "Create Product Item";
        $productItemContents = new FrontendProductItem();
        return view('admin.frontend.product.item.create', compact('pageTitle', 'productItemContents'));
    }

    public function itemStore(Request $request) {
        $request->validate([
            'image'       => 'required|image|mimes:png,jpg,jpeg',
            'name'        => 'required|string',
            'price'       => 'required|numeric|gt:0',
            'button_name' => 'required|string',
            'button_link' => 'required|string',
        ]);

        $frontendProductItem = new FrontendProductItem();
        if ($request->hasFile('image')) {
            try {
                $folderPath                 = "assets/images/frontend/product/item/images/";
                $imageName                  = uploadImage($request->image, $folderPath, $frontendProductItem->image);
                $frontendProductItem->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendProductItem->name        = $request->name;
        $frontendProductItem->price       = $request->price;
        $frontendProductItem->button_name = $request->button_name;
        $frontendProductItem->button_link = $request->button_link;

        $frontendProductItem->save();

        return redirect()->route('admin.frontend.product.item.index')->withSuccess("Product has been created !");
    }

    public function itemEdit($id) {
        $pageTitle           = "Edit Product Item";
        $frontendProductItem = FrontendProductItem::findOrFail($id);
        return view('admin.frontend.product.item.edit', compact('pageTitle', 'frontendProductItem'));
    }

    public function itemUpdate(Request $request, $id) {
        $request->validate([
            'image'       => 'nullable|image|mimes:png,jpg,jpeg',
            'name'        => 'required|string',
            'stock'       => 'required|boolean',
            'price'       => 'required|numeric|gt:0',
            'button_name' => 'required|string',
            'button_link' => 'required|string',
        ]);
        $frontendProductItem = FrontendProductItem::findOrFail($id);

        if ($request->hasFile('image')) {
            try {
                $folderPath                 = "assets/images/frontend/product/item/images/";
                $imageName                  = uploadImage($request->image, $folderPath, $frontendProductItem->image);
                $frontendProductItem->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendProductItem->name        = $request->name;
        $frontendProductItem->price       = $request->price;
        $frontendProductItem->stock       = $request->stock ?? 0;
        $frontendProductItem->button_name = $request->button_name;
        $frontendProductItem->button_link = $request->button_link;

        $frontendProductItem->save();
        return redirect()->route('admin.frontend.product.item.index')->withSuccess('The product item has been updated');
    }

    public function itemDelete($id) {
        $frontendProductItem = FrontendProductItem::findOrFail($id);
        $frontendProductItem->delete();
        return back()->withSuccess('The product item has been deleted');
    }

    // item end
}

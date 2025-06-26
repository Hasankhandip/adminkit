<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;

class CartController extends Controller {

    public function index() {
        $pageTitle = "Cart";
        // 🧮 Tax Calculation (e.g., 10% tax)
        $taxRate      = 0.10;
        $subTotal     = Cart::getSubTotal();
        $taxAmount    = $subTotal * $taxRate;
        $totalWithTax = $subTotal + $taxAmount;

        $cartContents = Cart::getContent();
        return view('frontend.cart.index', compact('pageTitle', 'taxRate', 'subTotal', 'taxAmount', 'totalWithTax', 'cartContents'));
    }

    public function cartAdd($productId) {

        $product = Product::find($productId);

        if (! $product) {
            return response()->json([
                'success' => false,
                'message' => "The product is not found",
            ]);
        }
        if (! $product->stock) {
            return response()->json([
                'success' => false,
                'message' => "The product is not availabe to the stock",
            ]);
        }

        // add the product to cart
        $quantity    = request()->quantity ?? 1;
        $cartProduct = Cart::getContent()->where('id', $product->id)->first();
        if ($cartProduct) {
            Cart::update($product->id, [
                'quantity' => $quantity,
            ]);
        } else {
            Cart::add([
                'id'         => $product->id,
                'name'       => $product->name,
                'price'      => $product->price,
                'quantity'   => $quantity,
                'attributes' => [
                    'thumbnail' => $product->thumbnail,
                ],
            ]);
        }

        $cartContent = Cart::getContent();

        return response()->json([
            'success' => true,
            'message' => "Product added successfully",
            'data'    => [
                'cart_count'   => $cartContent->count(),
                'cart_total'   => Cart::getTotal(),
                'cart_content' => $cartContent,
            ],
        ]);

    }
}

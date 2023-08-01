<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function cartView()
    {
        // dd(Cart::content());
        return view('client.carts.index');
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        // dd($product);
        if ($product == null) {
            return response()->json([
                'status' => false,
            ]);
        }

        if (Cart::count() > 0) {
            // echo "Sẵn sàng thêm vào giỏ hàng";
            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach ($cartContent as $item) {
                if ($item->id == $product->id) {
                    $productAlreadyExist = true;
                }
            }

            if ($productAlreadyExist == false) {
                Cart::add([
                    'id' => $request->id,
                    'name' => $product->product_name,
                    'qty' => $request->quantity,
                    'price' => $product->selling_price,
                    'weight' => 1,
                    'options' => [
                        'image' => $product->product_image,
                        'color' => $request->color,
                        'size' => $request->size,
                    ],
                ]);
                $status = true;
            }else {
                $status = false;
            }
        } else {
            Cart::add([

                'id' => $request->id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            $status = true;
        }

        return response()->json([
            'status' => $status,
            'success' => 'Successfully Added on Your Cart'
        ]);
    }

    public function getCart(){
        $carts = Cart::content();
        return response()->json(array(
            'carts' => $carts,
        ));
    }
}

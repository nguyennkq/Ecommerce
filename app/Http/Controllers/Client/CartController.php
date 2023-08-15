<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use Illuminate\Support\Carbon;

class CartController extends Controller
{
    public function cartView()
    {
        // dd((float)(str_replace([',', ''], '', (Cart::total()))));
        // dd(Cart::total());
        return view('client.carts.index');
    }

    public function addToCart(Request $request)
    {

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::find($request->id);

        if ($product->discount_price == NULL) {
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
        }else{
            Cart::add([
                'id' => $request->id,
                'name' => $product->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
        }

        return response()->json([
            'success' => 'Successfully Added on Your Cart'
        ]);
    }
    //? ⬆️ Hàm thêm sản phẩm vào giỏ hàng


    public function getCart()
    {
        $carts = Cart::content();
        return response()->json(array(
            'carts' => $carts,
        ));
    }
    //? ⬆️ Hàm lấy dữ liệu sản phẩm để hiển thị ra giỏ hàng

    public function cartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('name', $coupon_name)->first();

            $discount = $coupon->discount;
            $cartTotal = (float)(str_replace([',', ''], '', (Cart::subtotal())));
            $discountAmount = round($cartTotal * $discount / 100);
            $totalAmount = round($cartTotal - $cartTotal * $discount / 100);

            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'discount' => $discount,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount
            ]);
        }
        return response()->json('Decrement');
    }
    //? ⬆️ Hàm giảm số lượng sản phẩm ở giỏ hàng


    public function cartIncrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('name', $coupon_name)->first();

            $discount = $coupon->discount;
            $cartTotal = (float)(str_replace([',', ''], '', (Cart::subtotal())));
            $discountAmount = round($cartTotal * $discount / 100);
            $totalAmount = round($cartTotal - $cartTotal * $discount / 100);

            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'discount' => $discount,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount
            ]);
        }
        return response()->json('Decrement');
    }
    //? ⬆️ Hàm giảm số lượng sản phẩm ở giỏ hàng


    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('name', $request->coupon_name)->where('end_date', '>=', Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            $discount = $coupon->discount;
            $cartTotal = (float)(str_replace([',', ''], '', (Cart::subtotal())));
            $discountAmount = round($cartTotal * $discount / 100);
            $totalAmount = round($cartTotal - $discountAmount);

            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'discount' => $discount,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'

            ));
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }
    //? ⬆️ Hàm xử lí mã giảm giá


    public function Calculation()
    {

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => (float)(str_replace([',', ''], '', (Cart::subtotal()))),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'discount' => session()->get('coupon')['discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::subtotal(),
            ));
        }
    }
    //? ⬆️ Hàm tính toán tổng tiền



    public function countCart()
    {
        $countCart = Cart::count();

        return response()->json(array(
            'countCart' => $countCart
        ));
    }
    //? ⬆️ Hàm đếm số lượng sản phẩm trong giỏ hàng



    public function removeCart($rowId)
    {

        Cart::remove($rowId);

        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('name', $coupon_name)->first();

            $discount = $coupon->discount;
            $cartTotal = (float)(str_replace([',', ''], '', (Cart::subtotal())));
            $discountAmount = round($cartTotal * $discount / 100);
            $totalAmount = round($cartTotal - $cartTotal * $discount / 100);

            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'discount' => $discount,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount
            ]);
        }


        return response()->json(['success' => 'Successfully Remove From Cart']);
    }

    public function couponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }

    public function Checkout()
    {
        if (Cart::total()) {
            $carts = Cart::content();
            $cartTotal = (float)(str_replace([',', ''], '', (Cart::subtotal())));

            return view('client.checkout.index', compact('carts', 'cartQuantity', 'cartTotal'));
        }
    }
}

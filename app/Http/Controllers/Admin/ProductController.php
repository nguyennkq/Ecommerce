<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use voku\helper\ASCII;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.products.index', compact('product'));
    }

    public function add(ProductRequest $request)
    {
        $category = Category::all();

        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);

            if ($request->hasFile('product_image') && $request->file('product_image')->isValid()) {
                $request->product_image = uploadFile('images/product', $request->file('product_image'));
            }

            $product = new Product();

            $ascii_slug = ASCII::to_ascii($request->product_name);
            $product->category_id = $request->category_id;
            $product->product_name = $request->product_name;
            $product->product_size = $request->product_size;
            $product->product_color = $request->product_color;
            $product->product_quantity = $request->product_quantity;
            $product->selling_price = $request->selling_price;
            $product->discount_price = $request->discount_price;
            $product->description = $request->description;
            $product->product_image = $request->product_image;
            $product->product_slug = Str::slug($ascii_slug, "-");

            $product->save();

            if ($product->save()) {
                $notification = array(
                    "message" => "Add product successfully",
                    "alert-type" => "success",
                );
                return redirect()->route('product.index')->with($notification);
            }
        }
        return view('admin.products.add', compact('category'));
    }

    public function edit(ProductRequest $request, $id)
    {
        $detail = Product::findOrFail($id);
        $category = Category::all();
        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);

            $ascii_slug = ASCII::to_ascii($request->product_name);

            $update = Product::where('id', $id);
            if ($request->hasFile('product_image') && $request->file('product_image')->isValid()) {
                $img = $request->product_image = uploadFile('images/product', $request->file('product_image'));
            } else {
                $img = '';
            }
            $update->update([
                'category_id' => $request->category_id,
                'product_name' => $request->product_name,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'product_quantity' => $request->product_quantity,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'description' => $request->description,
                'product_image' => $img,
                'product_slug' => Str::slug($ascii_slug, "-"),
            ]);
            $notification = array(
                "message" => "Update product successfully",
                "alert-type" => "success",
            );
            return redirect()->route('product.index')->with($notification);
        }
        return view('admin.products.edit', compact('detail', 'category'));
    }

    public function delete($id)
    {
        if ($id) {
            $product = Product::where('id', $id);
            $deleted = $product->delete();
            if ($deleted) {
                $notification = array(
                    "message" => "Deleted Product successfully",
                    "alert-type" => "success",
                );
            } else {
                $notification = array(
                    "message" => "Delete product failed",
                    "alert-type" => "error",
                );

            }
        }
        return redirect()->back()->with($notification);
    }


    public function active($id)
    {
        $activeProduct = Product::findOrFail($id);
        $activeProduct->update([
            'status' => 'inactive'
        ]);

        $notification = array(
            "message" => "Product Inactive",
            "alert-type" => "success",
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        $inactiveProduct = Product::findOrFail($id);
        $inactiveProduct->update([
            'status' => 'active'
        ]);

        $notification = array(
            "message" => "Product Active",
            "alert-type" => "success",
        );
        return redirect()->back()->with($notification);
    }

    public function shop(){
        return view('client.products.index');
    }

    public function productDetail($slug){
        $product_detail = Product::where('product_slug', $slug)->first();
        return view('client.products.detail', compact('product_detail'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use voku\helper\ASCII;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
use App\Models\MultiImage;

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

            $productId = $product->id;



            if ($request->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $image) {
                    if ($image->isValid()) {
                        $fileName = uploadFile('images/multi-image', $image);

                        $imgs = new MultiImage();
                        $imgs->product_id = $productId;
                        $imgs->image = $fileName;

                        $imgs->save();
                    }
                }
            }

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


    public function edit(Request $request, $id)
    {
        $multiImgs = MultiImage::where('product_id', $id)->get();
        $detail = Product::findOrFail($id);
        $category = Category::all();
        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);

            $ascii_slug = ASCII::to_ascii($request->product_name);

            $update = Product::where('id', $id);
            if ($request->hasFile('product_image') && $request->file('product_image')->isValid()) {
                Storage::delete('/public/' . $detail->product_image);
                $img = $request->product_image = uploadFile('images/product', $request->file('product_image'));
            } else {
                $img = $detail->product_image;
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
        return view('admin.products.edit', compact('detail', 'category', 'multiImgs'));
    }

    public function editMultiImage(Request $request)
    {
        // $imgs = $request->image;
        // dd($imgs);
        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);

            // Check if 'image' files were uploaded
            if ($request->hasFile('image')) {
                $imgs = $request->file('image');
                foreach ($imgs as $id => $img) {
                    $update = MultiImage::findOrFail($id);

                    if ($img->isValid()) {
                        Storage::delete('/public/' . $update->image);

                        $fileName = uploadFile('images/multi-image', $img);

                        $multi = $request->image = $fileName;
                    } else {
                        $multi = $update->image; // Use the existing image if no new image was uploaded
                    }

                    MultiImage::where('id', $id)->update([
                        'image' => $multi
                    ]);
                }
            }

            $notification = [
                'message' => 'Update MultiImage successfully',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        }
    }


    public function deleteMultiImage($id)
    {
        if ($id) {
            $image = MultiImage::find($id);

            if ($image) {
                Storage::delete('/public/' . $image->image);
                $deleted = $image->delete();
                if ($deleted) {
                    $notification = array(
                        "message" => "Deleted MultiImage successfully",
                        "alert-type" => "success",
                    );
                } else {
                    $notification = array(
                        "message" => "Delete MultiImage failed",
                        "alert-type" => "error",
                    );
                }
            } else {
                $notification = array(
                    "message" => "MultiImage not found",
                    "alert-type" => "error",
                );
            }
            return redirect()->back()->with($notification);
        }
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

    public function deleted()
    {
        $product = Product::onlyTrashed()->get();
        return view('admin.products.delete', compact('product'));
    }

    public function restore($id)
    {
        $softDeletedProduct = Product::onlyTrashed()->find($id);

        if ($softDeletedProduct) {
            $softDeletedProduct->restore();
            $notification = array(
                "message" => "Product restore successfully",
                "alert-type" => "success",
            );
        } else {
            $notification = array(
                "message" => "Product restore failed",
                "alert-type" => "error",
            );
        }

        return redirect()->back()->with($notification);
    }

    public function permanentlyDelete($id)
    {
        if ($id) {
            $product = Product::where('id', $id);
            $deleted = $product->forceDelete();
            if ($deleted) {
                $notification = array(
                    "message" => "Deleted product successfully",
                    "alert-type" => "success",
                );
            } else {
                $notification = array(
                    "message" => "Delete Product unsuccessful",
                    "alert-type" => "error",
                );
            }
        }
        return redirect()->back()->with($notification);
    }

    public function shop()
    {
        $products = Product::where('status', 'active')->get();
        return view('client.products.index', compact('products'));
    }

    public function productDetail($slug)
    {
        $product_detail = Product::where('product_slug', $slug)->first();
        $product_id = $product_detail->id;
        $multiImage = MultiImage::where('product_id', $product_id)->get();
        return view('client.products.detail', compact('product_detail', 'multiImage'));
    }


    public function changeStatus(Request $request)
    {

        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['success' => 'Status Change Successfully']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use voku\helper\ASCII;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.categories.index', compact('category'));
    }

    public function add(CategoryRequest $request)
    {
        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);

            if ($request->hasFile('category_image') && $request->file('category_image')->isValid()) {
                $request->category_image = uploadFile('images/category', $request->file('category_image'));
            }

            $category = new Category();

            $ascii_slug = ASCII::to_ascii($request->category_name);
            $category->category_name = $request->category_name;
            $category->category_image = $request->category_image;
            $category->category_slug = Str::slug($ascii_slug, "-");

            $category->save();

            if ($category->save()) {
                $notification = array(
                    "message" => "Add category successfully",
                    "alert-type" => "success",
                );
                return redirect()->route('category.index')->with($notification);
            }
        }

        return view('admin.categories.add');
    }


    public function edit(CategoryRequest $request, $id)
    {
        $detail = Category::findOrFail($id);
        if ($request->isMethod('post')) {
            $params = $request->post();
            unset($params['_token']);

            $ascii_slug = ASCII::to_ascii($request->category_name);

            $update = Category::where('id', $id);
            if ($request->hasFile('category_image') && $request->file('category_image')->isValid()) {
                Storage::delete('/public/' .$detail->category_image);
                $img = $request->category_image = uploadFile('images/category', $request->file('category_image'));
                // $update->update($request->except('_token'));
            } else {
                $img = $detail->category_image;
                // $update->update($request->except('_token', 'category_image'));
            }

            $update->update([
                'category_name' => $request->category_name,
                'category_image' => $img,
                'category_slug' => Str::slug($ascii_slug, "-"),
            ]);
            $notification = array(
                "message" => "Update category successfully",
                "alert-type" => "success",
            );
            return redirect()->route('category.index')->with($notification);
        }

        return view('admin.categories.edit', compact('detail'));
    }

    public function delete($id)
    {
        if ($id) {
            $category = Category::where('id', $id);
            $deleted = $category->delete();
            if ($deleted) {
                $notification = array(
                    "message" => "Deleted category successfully",
                    "alert-type" => "success",
                );
            } else {
                $notification = array(
                    "message" => "Delete category failed",
                    "alert-type" => "error",
                );
            }
        }
        return redirect()->back()->with($notification);

    }

    public function deleted(){
        $category = Category::onlyTrashed()->get();
        return view('admin.categories.delete', compact('category'));
    }

    public function restore($id){
        $softDeletedCategory = Category::onlyTrashed()->find($id);

        if($softDeletedCategory){
            $softDeletedCategory->restore();
            $notification = array(
                "message" => "Category restore successfully",
                "alert-type" => "success",
            );
        }else {
            $notification = array(
                "message" => "Category restore failed",
                "alert-type" => "error",
            );
        }

        return redirect()->back()->with($notification);
    }

    public function permanentlyDelete($id)
    {
        if ($id) {
            $category = Category::where('id', $id);
            $deleted = $category->forceDelete();
            if ($deleted) {
                $notification = array(
                    "message" => "Deleted category successfully",
                    "alert-type" => "success",
                );
            } else {
                $notification = array(
                    "message" => "Delete category unsuccessful",
                    "alert-type" => "error",
                );
            }
        }
        return redirect()->back()->with($notification);
    }

    public function productCategory($slug){
        $productCate = Category::where('category_slug', $slug)->first();

        $products = Product::where('category_id', $productCate->id)->where('status','active')->get();
        return view('client.products.product-category', compact("products","productCate"));
    }

    public function changeStatus(Request $request)
    {

        $category = Category::find($request->category_id);
        $category->status = $request->status;
        $category->save();

        return response()->json(['success' => 'Status Change Successfully']);
    }
}

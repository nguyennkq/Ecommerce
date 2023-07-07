<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use voku\helper\ASCII;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function ListCategory(){
        $category = Category::all();
        return view('admin.categories.list', compact('category'));
    }

    public function CreateCategory(){
        return view('admin.categories.create');
    }

    public function StoreCategory(Request $request){
        $ascii_slug= ASCII::to_ascii($request->category_name);
        Category::create([
            "category_name" => $request->category_name,
            "category_slug" => Str::slug($ascii_slug,"-"),
        ]);

        $notification = array(
            "alert-type"=>"success",
            "message"=>"Thêm danh mục thành công"
        );

        return redirect()->route('category.list')->with($notification);
    }
}

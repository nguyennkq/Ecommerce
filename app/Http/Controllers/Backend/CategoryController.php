<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function ListCategory(){
        $category = Category::all();
        return view('admin.categories.list', compact('category'));
    }
}

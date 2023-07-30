<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 'active')->latest()->take(3)->get();
        // $categories = Category::where('status','active')->get();

        $categories = Category::select('categories.*', DB::raw('COUNT(products.id) as product_count'))
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->where('categories.status', 'active')
            ->where('products.status', 'active')
            ->groupBy('categories.id')
            ->get();

        $products = Product::where('status', 'active')->get();

        return view('client.index', compact('categories', 'products'));
        // return view('client.index', compact('banners', 'categories'));
    }


}

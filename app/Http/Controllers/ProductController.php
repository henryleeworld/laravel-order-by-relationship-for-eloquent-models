<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select(['products.*', 'categories.name as category_name'])
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->orderBy('categories.name')
            ->paginate(20);

        return view('products.index', compact('products'));
    }
}

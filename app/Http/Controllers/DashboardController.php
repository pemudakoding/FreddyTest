<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {



        return view('pages.dashboard.index');
    }

    public function products()
    {
        $products = Product::select(['id', 'name', 'type', 'price', 'stock'])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.product.index')
            ->with('products', $products);
    }
}

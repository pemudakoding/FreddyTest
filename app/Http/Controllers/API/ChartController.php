<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ChartController extends Controller
{
    public function dashboard()
    {
        $pieQuery = Product::select('type')
            ->selectRaw('count(type) as total')
            ->groupBy('type')
            ->get();
        $barQuery = Product::select(['name', 'stock'])
            ->get();


        $pieData = [];
        $barData = [];
        foreach ($pieQuery as $pie) {
            $pieData['pie']['labels'][] = $pie->type;
            $pieData['pie']['total'][] = $pie->total;
        }
        foreach ($barQuery as $bar) {
            $pieData['bar']['labels'][] = $bar->name;
            $pieData['bar']['total'][] = $bar->stock;
        }

        return response()->json($pieData);
    }
}

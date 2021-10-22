<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function store(Request $request)
    {

        Product::create($request->all());
        return response()->json([
            'code' => 200,
            'type' => 'success',
            'msg'  => 'Berhasil Menambahkan Data'
        ]);
    }

    public function detail(Request $request)
    {
        $data = Product::select(['name', 'type', 'stock', 'price'])
            ->where('id', $request->id)
            ->first();
        return response()->json([
            'code' => 200,
            'type' => 'success',
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $data = $product->update($request->all());

        return response()->json([
            'code' => 200,
            'type' => 'success',
            'msg'  => 'Berhasil Mengubah Data',
            'data' => $data
        ]);
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $data = $product->delete();

        return response()->json([
            'code' => 200,
            'type' => 'success',
            'msg'  => 'Berhasil Menghapus Data',
        ]);
    }
}

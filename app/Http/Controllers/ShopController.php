<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return Shop::latest()->get();
    }

    public function store(Request $request)
    {
        $shop = Shop::create($request->all());

        return response()->json($shop, 201);
    }

    public function show(Shop $shop)
    {
        return $shop;
    }

    public function update(Request $request, Shop $shop)
    {
        $shop->update($request->all());

        return response()->json($shop, 200);
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();

        return response()->json(null, 204);
    }
}
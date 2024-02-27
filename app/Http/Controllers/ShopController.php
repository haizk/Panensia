<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with('products')->get();
        return view('shops.index', compact('shops'));
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'logo_path' => 'required',
            'address' => 'required',
            'link_ig' => 'nullable',
        ]);

        $shop = Shop::create($validatedData);

        return redirect()->route('shops.index')->with('success', 'Shop created successfully');
    }

    public function edit(Shop $shop)
    {
        return view('shops.edit', compact('shop'));
    }

    public function update(Request $request, Shop $shop)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'logo_path' => 'required',
            'address' => 'required',
            'link_ig' => 'nullable',
        ]);

        $shop->update($validatedData);

        return redirect()->route('shops.index')->with('success', 'Shop updated successfully');
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();

        return redirect()->route('shops.index')->with('success', 'Shop deleted successfully');
    }
}

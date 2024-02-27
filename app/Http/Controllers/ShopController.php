<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function index()
    {
        return Shop::latest()->get();
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'desc' => 'required|string',
            'logo_path' => 'required|string',
            'address' => 'required|string',
            'link_ig' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Buat data toko baru
        $shop = Shop::create($request->all());

        return response()->json($shop, 201);
    }

    public function show(Shop $shop)
    {
        return $shop;
    }

    public function update(Request $request, Shop $shop)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'desc' => 'required|string',
            'logo_path' => 'required|string',
            'address' => 'required|string',
            'link_ig' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Update data toko
        $shop->update($request->all());

        return response()->json($shop, 200);
    }

    public function uploadLogo(Request $request, Shop $shop)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->storeAs('logos', 'logo_' . $shop->id . '.' . $logo->getClientOriginalExtension(), 'public');

            $shop->update(['logo_path' => '/storage/' . $logoPath]);

            return response()->json(['logo_path' => '/storage/' . $logoPath], 200);
        }

        return response()->json(['error' => 'Logo not provided.'], 400);
    }

    public function destroy(Shop $shop)
    {
        // Hapus data toko
        $shop->delete();

        return response()->json(null, 204);
    }
}

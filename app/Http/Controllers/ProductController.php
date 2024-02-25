<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::with('shop', 'image')->get();
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function getProductByShopId($id)
    {
        $products = Product::with('image')->whereHas('shop', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function getProductById($id)
    {
        $products = Product::with('shop', 'image')->find($id);
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function createProduct(Request $request)
    {
        $product = new Product();
        $product->validate([]);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->link_tokped = $request->link_tokped;
        $product->link_shopee = $request->link_shopee;
        $product->save();

        $filePaths = [];
        if ($request->hasfile('files')) {

            foreach ($request->file('files') as $file) {
                $path = $file->store('public/product_images');
                $filePaths[] = str_replace('public/', '', $path);
            }
        }

        foreach ($filePaths as $order => $path) {
            $productImage = new ProductImage();
            $productImage->path = $path;
            $productImage->order = $order + 1;
            $productImage->product_id = $product->id;
            $productImage->save();
        }

        return response()->json([
            'message' => 'Product created successfully',
            'filePaths' => $filePaths
        ], 201);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        ProductImage::where('product_id', $id)->delete();
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ], 200);
    }

    public function editProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->link_tokped = $request->link_tokped;
        $product->link_shopee = $request->link_shopee;
        $product->product_shop_id = $request->product_shop_id;
        $product->save();

        $filePaths = [];
        if ($request->hasfile('files')) {

            foreach ($request->file('files') as $file) {
                $path = $file->store('public/product_images');
                $filePaths[] = str_replace('public/', '', $path);
            }
        }

        if (count($filePaths) > 0) {
            $images = ProductImage::where('product_id', $product->id)->get();
            $orderStart = count($images) + 1;

            foreach ($filePaths as $order => $path) {
                $productImage = new ProductImage();
                $productImage->path = $path;
                $productImage->order = $orderStart + $order;
                $productImage->product_id = $product->id;
                $productImage->save();
            }
        }

        return response()->json([
            'message' => 'Product updated successfully',
            'filePaths' => $filePaths
        ], 200);
    }
}

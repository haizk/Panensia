<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductCategories()
    {
        $categories = ProductCategory::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function getProductByCategoryId($id)
    {
        $products = Product::where('product_category_id', $id)->get();
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function createProductCategory(Request $request)
    {
        $newsCategory = new ProductCategory();
        $newsCategory->name = $request->name;
        $newsCategory->slug = $request->slug;
        $newsCategory->save();

        return response()->json([
            'message' => 'Category created successfully'
        ], 201);
    }

    public function deleteProductCategory($id)
    {
        $newsCategory = ProductCategory::find($id);
        $newsCategory->delete();

        return response()->json([
            'message' => 'News category deleted successfully'
        ], 200);
    }

    public function editProductCategory(Request $request, $id)
    {
        $newsCategory = ProductCategory::find($id);
        $newsCategory->name = $request->name;
        $newsCategory->slug = $request->slug;
        $newsCategory->save();

        return response()->json([
            'message' => 'News category updated successfully'
        ], 200);
    }

    public function getProducts()
    {
        $products = Product::with('image', 'productCategory')->get();
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function getProductById($id)
    {
        $products = Product::with('productCategory', 'image')->find($id);
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function createProduct(Request $request)
    {
        $product = new Product();
        // $product->validate([]);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->ingredient = $request->ingredient;
        $product->caution = $request->caution;
        $product->product_category_id = $request->product_category_id;
        // $product->shop_id = $request->shop_id;
        $product->link_tokped = $request->link_tokped;
        $product->link_shopee = $request->link_shopee;
        $product->link_tiktok = $request->link_tiktok;
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
        $product->ingredient = $request->ingredient;
        $product->caution = $request->caution;
        $product->link_tokped = $request->link_tokped;
        $product->link_shopee = $request->link_shopee;
        $product->link_tiktok = $request->link_tiktok;
        $product->product_category_id = $request->product_category_id;
        // $product->shop_id = $request->shop_id;
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

    public function getShops()
    {
        $shops = Shop::all();
        return response()->json([
            'shops' => $shops
        ], 200);
    }

    public function getImagesByProductId($id)
    {
        try {
            $images = ProductImage::with('product')->where('product_id', $id)
                ->get();

            if ($images->isEmpty()) {
                return response()->json([
                    'message' => 'No images found for the given product ID.'
                ], 404);
            }

            return response()->json([
                'images' => $images
            ], 200);
        } catch (\Exception $e) {
            // Handle any unexpected exceptions
            return response()->json([
                'message' => 'An error occurred while retrieving images.'
            ], 500);
        }
    }

    public function deleteProductImage($id)
    {
        $image = ProductImage::find($id);
        $image->delete();
        return response()->json([
            'message' => 'Product deleted successfully'
        ], 200);
    }
}

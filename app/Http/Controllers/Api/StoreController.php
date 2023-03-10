<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $stores = Store::all();
        return response()->json(['stores' => $stores]);
    }

    public function getStoreCategories()
    {
        $store = Store::find(request()->query('store_id'));

        if ($store) {
            $categories = $store->categories;
            if ($categories) {
                return response()->json(['data' => ['categories' => $categories], 'status' => true, 'message' => __('Categories fetched successfully')]);
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('No categories found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('Store not found')]);
        }
    }

    public function getStoreSubCategories()
    {
        $store = Store::find(request()->query('store_id'));
        if ($store) {
            $category = $store->categories->where('id', request()->query('category_id'))->first();
            if ($category) {
                $sub_categories = $category->subCategories;
                if ($sub_categories) {
                    return response()->json(['data' => ['sub_categories' => $sub_categories], 'status' => true, 'message' => __('Sub Categories fetched successfully')]);
                } else {
                    return response()->json(['data' => [], 'status' => false, 'message' => __('No sub categories found')]);
                }
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('No category found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('No store found')]);
        }
    }

    public function getStoreProducts()
    {
        $store = Store::find(request()->query('store_id'));
        if ($store) {
            $sub_category = $store->subCategories->where('id', request()->query('sub_category_id'))->first();
            if ($sub_category) {
                $products = Product::with('specification')->where('sub_category_id', $sub_category->id)->where('status', 'active')->get();
                if ($products) {
                    return response()->json(['data' => ['products' => ($products) ? $products : []], 'status' => true, 'message' => __('Products fetched successfully')]);
                } else {
                    return response()->json(['data' => [], 'status' => false, 'message' => __('No products found')]);
                }
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('No sub category found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('Store not found')]);
        }
    }

    public function getProductDetails()
    {
        $product = Product::with('specification')->find(request()->query('product_id'));

        if ($product) {
            return response()->json(['data' => ['product' => $product], 'status' => true, 'message' => __('Product fetched successfully')]);
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('No product found')]);
        }
    }

    public function addRemoveProductToFavorite()
    {
        $product = Product::find(request()->query('product_id'));

        if ($product) {
            $user = User::find(auth()->guard('sanctum')->id());

            if ($user) {
                if ($user->favoritesProducts->contains($product->id)) {
                    $user->favoritesProducts()->detach($product->id);
                    return response()->json(['message' => 'Product removed from favorite']);
                } else {
                    $user->favoritesProducts()->attach($product->id);
                    return response()->json(['message' => 'Product added to favorite']);
                }
            } else {
                return response()->json(['message' => 'User not found']);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('No product found')]);
        }
    }
}

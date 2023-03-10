<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cart = auth()->guard('sanctum')->user()->cart;
        return response()->json(['cart' => $cart ?? []]);
    }

    public function addProductToCart()
    {

        $user = auth()->user();

        if ($user) {

            $store = Store::find(request()->query('store_id'));

            if ($store) {

                if ($store->status == 'active') {

                    $new_product = $store->products->where('id', request()->query('product_id'))->first();

                    if ($new_product) {

                        if ($new_product->status == 'active') {

                            $cart = $user->cart;

                            if ($cart) {

                                $array_products = $cart->products;
                                $this->insertProduct($array_products, $new_product, $cart);

                                return response()->json(['cart' => $cart]);
                            } else {

                                $new_product->quantity = request()->query('qty');

                                $array["id$new_product->id"] = $new_product;
                                $total_price = $new_product->price * $new_product->quantity;

                                $cart = Cart::create([
                                    'admin_id' => $store->admin_id,
                                    'store_id' => $store->id,
                                    'user_id' => $user->id,
                                    'products' => $array,
                                    'total_products' => 1,
                                    'total_price' => $total_price,
                                ]);

                                return response()->json(['cart' => $cart]);
                            }
                        } else {
                            return response()->json(['message' => 'Product is not active']);
                        }
                    } else {
                        return response()->json(['message' => 'Product is not found']);
                    }
                } else {
                    return response()->json(['message' => 'Store is not active']);
                }
            } else {
                return response()->json(['message' => 'Store is not found']);
            }
        }
    }

    public function deleteProductFromCart()
    {

        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $cart = $user->cart;

            if ($cart) {

                $array_products = $cart->products;

                $total_price = 0;


                foreach ($array_products as $id => $product) {

                    $check = true;

                    $product = json_decode(json_encode($product));

                    if ($product->id == request()->query('cart_product_id')) {
                        $check = false;
                        unset($array_products[$id]);
                        $cart->total_products = $cart->total_products - 1;
                    }

                    if ($check) {
                        $total_price = $total_price + ($product->price * $product->quantity);
                    }
                }

                $object_products = json_decode(json_encode($array_products));

                $cart->products = $object_products;

                $cart->total_price = $total_price;

                $cart->save();

                return response()->json(['cart' => $cart]);
            }
        }
    }

    public function emptyCart()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $cart = Cart::where('id', request()->query('cart_id'))->first();

            if ($cart) {
                $cart->products = [];
                $cart->total_price = 0;
                $cart->save();

                if (request()->order_id) {
                    return $this->reorderCart();
                } else {
                    return response()->json(['message' => 'Order not found']);
                }

                return response()->json(['cart' => $cart]);
            } else {
                return response()->json(['message' => 'Cart not found']);
            }
        }
    }

    public function reorderCart()
    {
        $user = auth()->guard('sanctum')->user();
        if ($user) {
            $cart = $user->cart;
            if ($cart) {
                $products_cart = $cart->products;

                if ($products_cart == []) {
                    $order = $user->orders->where('id', request()->order_id)->first();
                    if ($order) {
                        $cart->products = $order->products;
                        $cart->total_price = $order->total_price;
                        $cart->total_products = $order->total_products;
                        $cart->save();
                    } else {
                        return response()->json(['data' => [], 'status' => false, 'message' => 'Order not found']);
                    }
                } else {
                    return response()->json(['data' => ['cart' => $cart], 'status' => false, 'status_code' => 1000, 'message' => __('Cart not empty')]);
                }
            } else {
                return response()->json(['data' => ['cart' => null], 'status' => false, 'message' => __('Cart not found')]);
            }
        } else {
            return response()->json(['data' => ['cart' => []], 'status' => false, 'message' => __('User not found')]);
        }
    }

    public function refreshCart()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $cart = auth()->user()->cart;

            if ($cart) {
                return response()->json(['data' => ['cart' => $cart], 'status' => true, 'message' => __('Cart refreshed successfully')]);
            } else {
                return response()->json(['data' => ['cart' => null], 'status' => false, 'message' => __('Cart not found')]);
            }
        } else {
            return response()->json(['data' => ['cart' => null], 'status' => false, 'message' => __('User Not Found')]);
        }
    }

    public function insertProduct($array_products, $new_product = null, $cart = null)
    {

        $check = true;
        $total_price = 0;
        $total_products = 0;
        $object_products = json_decode(json_encode($array_products));

        foreach ($object_products as $id => $product) {

            if ($product->id == $new_product->id) {

                $check = false;
                $product->quantity = request()->qty;
                $product->store_manager_id = $new_product->store_manager_id;
                $product->category_id = $new_product->category_id;
                $product->sub_category_id = $new_product->sub_category_id;
                $product->price = $new_product->price;
                $product->ar_name = $new_product->ar_name;
                $product->en_name = $new_product->en_name;
                $product->ar_description = $new_product->ar_description;
                $product->en_description = $new_product->en_description;
                $product->status = $new_product->status;
                $cart->products = $object_products;
                $cart->save();
            }

            $total_price = $total_price + ($product->price * $product->quantity);
            $total_products = $total_products + 1;
        }

        if ($check) {
            $new_product->quantity = request()->qty;
            $array_products["id$new_product->id"] = $new_product;
            $object_products = json_decode(json_encode($array_products));
            $cart->products = $object_products;
            $total_products = $total_products + 1;
            $cart->total_products = $total_products;
            $cart->total_price = $total_price + ($new_product->price * $new_product->quantity);
            $cart->save();
            return response()->json(['cart' => $cart]);
        }

        $cart->total_price = $total_price;
        $cart->total_products = $total_products;
        $cart->save();
    }
}

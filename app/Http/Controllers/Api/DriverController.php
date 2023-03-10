<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    protected $orderController;
    protected $cartController;
    public function __construct(OrderController $orderController, CartController $cartController)
    {
        $this->orderController = $orderController;
        $this->cartController = $cartController;
    }

    public function addProductToOrder()
    {
        $user = auth()->guard('sanctum')->user();
        if ($user) {

            $delivery = Delivery::where('user_id', $user->id)->first();
            if ($delivery) {
                $order = $delivery->orders->where('id', request()->order_id)->first();
                if ($order) {
                    if ($order->status == "in_progress") {

                        $new_product = Product::find(request()->product_id);

                        if ($new_product) {
                            $array_products = $order->products;
                            $this->cartController->insertProduct($array_products, $new_product, $order);
                            return response()->json(['data' => ['order' => $order], 'status' => true, 'message' => 'Product is added to order']);
                        } else {
                            return response()->json(['data' => [], 'status' => false, 'message' => __('Product not found')]);
                        }
                    } else {
                        return response()->json(['message' => 'Order not in progress']);
                    }
                } else {
                    return response()->json(['message' => 'Order not found']);
                }
            } else {
                return response()->json(['message' => 'Delivery not found']);
            }
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    public function updateProductFromOrder()
    {
        $user = auth()->guard('sanctum')->user();

        $order_id = request()->order_id;

        if ($order_id) {
            request()->product_id = request()->order[0]['order_product_id'];
            request()->qty = request()->order[0]['qty'];
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('Order not found')]);
        }

        if ($user) {
            $delivery = Delivery::where('user_id', $user->id)->first();
            if ($delivery) {

                $order = $delivery->orders->where('id', request()->order_id)->first();
                if ($order) {
                    if ($order->status == "in_progress") {

                        $new_product = Product::find(request()->product_id);
                        if ($new_product) {
                            $array_products = $order->products;
                            $this->cartController->insertProduct($array_products, $new_product, $order);
                            return response()->json(['data' => ['order' => $order], 'status' => true, 'message' => 'Product is updated from order']);
                        } else {
                            return response()->json(['data' => [], 'status' => false, 'message' => __('Product not found')]);
                        }
                    } else {
                        return response()->json(['message' => 'Order not in progress']);
                    }
                } else {
                    return response()->json(['message' => 'Order not found']);
                }
            } else {
                return response()->json(['message' => 'Delivery not found']);
            }
        } else {
        }

        return $this->orderController->updateProductFromOrder();
    }

    public function deleteProductFromOrder()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $delivery = Delivery::where('user_id', $user->id)->first();
            if ($delivery) {

                $order = $delivery->orders->where('id', request()->order_product_id)->first();
                if ($order) {
                    if ($order->status == "in_progress") {

                        $array_products = $order->products;

                        $total_price = 0;

                        foreach ($array_products as $id => $product) {

                            $check = true;

                            $product = json_decode(json_encode($product));

                            if ($product->id == request()->query('product_id')) {
                                $check = false;
                                unset($array_products[$id]);
                                $order->total_products = $order->total_products - 1;
                            }

                            if ($check) {
                                $total_price = $total_price + ($product->price * $product->quantity);
                            }
                        }

                        $object_products = json_decode(json_encode($array_products));

                        $order->products = $object_products;

                        $order->total_price = $total_price;

                        $order->save();

                        return response()->json(['order' => $order]);
                    } else {
                        return response()->json(['message' => 'Order not in progress']);
                    }
                } else {
                    return response()->json(['message' => 'Order not found']);
                }
            } else {
                return response()->json(['message' => 'Delivery not found']);
            }
        } else {
            return response()->json(['message' => 'User not found']);
        }

        return $this->orderController->deleteProductFromOrder();
    }

    public function changeStatus()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {

            $delivery = Delivery::where('id', $user->id)->first();

            if ($delivery) {

                $order = Order::find(request()->order_id);

                if ($order) {
                    if (request()->status_id == 2 || request()->status_id == 3 || request()->status_id == 4 || request()->status_id == 5) {

                        $status = null;

                        if (request()->status_id == 2) {
                            $status = 'in_progress';
                        }

                        if (request()->status_id == 3) {
                            $status = 'delivered';
                            if (!($order->status == 'in_progress')) {
                                return response()->json(['message' => 'Order is not in progress']);
                            }
                        }

                        if (request()->status_id == 4) {

                            $status = 'complete';

                            if ($order->status == 'in_progress' || $order->status == 'delivered') {

                                $wallet = $order->user->wallet;

                                if ($wallet) {
                                    $x = 0;
                                    for ($i = 0; $i < floor($order->total_price); $i++) {
                                        $x = $x + 1;
                                        if ($x == 100) {
                                            $wallet->points = $wallet->points + 1;
                                            $wallet->save();
                                            $x = 0;
                                        }
                                    }
                                } else {
                                    return response()->json(['message' => 'User has no wallet']);
                                }

                                $order->deliveryTime->consume = $order->deliveryTime->consume - 1;
                                $order->deliveryTime->save();
                            } else {
                                return response()->json(['message' => 'Order is not in progress or delivered']);
                            }
                        }

                        if (request()->status_id == 5) {
                            $status = 'rejected';
                            if ($order->status == 'in_progress' || $order->status == 'delivered') {
                                $order->deliveryTime->consume = $order->deliveryTime->consume - 1;
                                $order->deliveryTime->save();
                            } else {
                                return response()->json(['message' => 'Order is not in progress or delivered']);
                            }
                        }

                        if ($status) {
                            $order->update(['status' =>  $status, 'delivery_id' => $delivery->id,]);
                            return response()->json(['message' => "Order is $status",]);
                        } else {
                            return response()->json([
                                'message' => 'Order not in progress, status not changed, invalid status, please try again',
                            ]);
                        }
                    } else {
                        return response()->json(['data' => ['orders' => []], 'status' => false, 'message' => __('Error in fetching orders: status_id is not valid')]);
                    }
                } else {
                    return response()->json(['data' => [], 'status' => false, 'message' => __('Order not found')]);
                }
            } else {
                return response()->json(['message' => 'Delivery not found']);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => 'User not found',], 404);
        }
    }

    public function getAllOrder()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $store = Store::find(request()->store_id);
            if ($store) {
                if (request()->status_id == 1) {
                    $orders  = $store->orders->where('status', 'pending');
                    return response()->json(['data' => ['orders' => $orders], 'status' => true, 'message' => __('Orders fetched successfully')]);
                } else {
                    return response()->json(['data' => ['orders' => []], 'status' => false, 'message' => __('Error in fetching orders: status_id is not valid')]);
                }
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('Store not found')]);
            }
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    public function stores()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $delivery = Delivery::find($user->id);
            if ($delivery) {
                $stores = $delivery->stores;
                return response()->json(['data' => ['stores' => $stores], 'status' => true, 'message' => __('Stores fetched successfully')]);
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('Delivery not found')]);
            }
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }
}

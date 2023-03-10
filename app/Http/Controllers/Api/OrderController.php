<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\DeliveryTime;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use stdClass;

class OrderController extends Controller
{
    protected $cartController;
    public function __construct(CartController $cartController)
    {
        $this->cartController = $cartController;
    }

    function is_empty_object(stdClass $object)
    {
        foreach ($object as $value) return false;
        return true;
    }

    public function beforeAddOrder()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {

            $store = Store::find(request()->query('store_id'));

            $addresses = $user->addresses;

            $user_addresses = [];

            if ($addresses->count() > 0) {

                foreach ($addresses as $address) {

                    $obj_address = new stdClass();
                    $obj_address->identifier = $address->id;
                    $area = Area::find($address->area_id);

                    if ($area) {
                        $obj_address->area_name = $area->ar_name;
                    } else {
                        $obj_address->area_name = '';
                    }

                    $obj_address->title = $address->title;
                    $obj_address->description = $address->description;
                    $obj_address->latitude = $address->lat;
                    $obj_address->longitude = $address->lng;
                    $obj_address->is_default = $address->is_default;

                    array_push($user_addresses, $obj_address);
                }
            } else {
                $user_addresses = [];
            }


            if ($store) {
                $days_of_work = $store->days_of_work;

                if ($days_of_work !== []) {

                    $objects = [];

                    foreach (config('store.days')  as $key => $day) {

                        $object = new stdClass();

                        if (in_array($key, $days_of_work)) {

                            $object->identifier = $key;
                            $object->store_id = $store->id;
                            $object->day_number = $key;
                            $object->name = $day;

                            $times = [];


                            foreach ($store->deliveryTimes as $deliveryTime) {

                                $time = new stdClass();

                                $time->identifier = $key;
                                $time->day_id = $key;
                                $time->from_time = $deliveryTime->start_time;
                                $time->to_time = $deliveryTime->end_time;
                                $time->price = $deliveryTime->price;
                                $time->capacity = $deliveryTime->capacity;
                                $time->consume = $deliveryTime->consume;
                                $time->is_active = false;

                                if (in_array($key, $deliveryTime->status)) {
                                    $time->is_active = true;
                                }

                                if (!$this->is_empty_object($time)) {
                                    array_push($times, $time);
                                }
                            }

                            $object->times = $times;

                            array_push($objects, $object);
                        }
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'store not have days of work',
                    ], 400);
                }

                $body = new stdClass();
                $body->data = new stdClass();

                $body->data->store_work_days = $objects;
                $body->data->user_addresses = $user_addresses;

                return $body;
            } else {
                return response()->json(['body' => [], 'status' => false, 'message' => __('Store not found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }
    }

    public function checkOrder()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {

            $cart = $user->cart;
            if ($cart) {
                if ($cart->id == request()->cart_id) {

                    $time = DeliveryTime::find(request()->time_id);

                    if ($time) {

                        if ($time->consume < $time->capacity) {
                            return response()->json(['body' => ['time' =>  $time], 'status' => true, 'message' => __('This time is available')]);
                        } else {
                            return response()->json(['body' => [], 'status' => false, 'message' => __('The selected time is not available')]);
                        }
                    } else {
                        return response()->json(['body' => [], 'status' => false, 'message' => __('Delivery time not found')]);
                    }
                } else {
                    return response()->json(['data' => [], 'status' => false, 'message' => __('Cart not found')]);
                }
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('Cart not found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }
    }

    public function newOrder()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $cart = $user->cart;

            if ($cart) {
                if ($cart->id == request()->cart_id) {

                    if ($cart->products !== []) {
                        $store = Store::find($cart->store_id);

                        $time = DeliveryTime::find(request()->time_id);

                        $time->consume = $time->consume + 1;

                        $time->save();

                        if (request()->not_found_option == 1) {
                            // $not_found_option = "التواصل معي";
                            $not_found_option = 'contact with me';
                        }

                        if (request()->not_found_option == 2) {
                            // $not_found_option = "إزالة المنتج";
                            $not_found_option = 'remove product';
                        }

                        if (request()->not_found_option == 3) {
                            // $not_found_option = "استبدال المنتج";
                            $not_found_option = 'replace product';
                        }

                        if (request()->payment_type == 0) {
                            $payment_type = 'cash';
                        }

                        if (request()->payment_type == 1) {
                            $payment_type = 'mada';
                        }

                        $order = Order::create([
                            'admin_id' => $cart->admin_id,
                            'user_id' => $user->id,
                            'store_id' => $cart->store_id,
                            'delivery_time_id' => request()->time_id,
                            'address_id' => request()->address_id,
                            'products' => $cart->products,
                            'total_price' => $cart->total_price,
                            'total_products' => $cart->total_products,
                            'payment_method' =>  $payment_type,
                            'not_found_option' => $not_found_option,
                            'status' => 'new',
                        ]);

                        $cart->products = [];
                        $cart->total_price = 0;
                        $cart->save();

                        return $order;
                    } else {
                        return response()->json(['body' => [], 'status' => false, 'message' => __('Cart is empty')]);
                    }
                } else {
                    return response()->json(['body' => [], 'status' => false, 'message' => __('Erro in cart ID')]);
                }
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('Cart not found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }
        return response()->json(['message' => 'Order is created']);
    }

    public function orderNow()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $orders = [];

            $new = $user->orders->where('status', 'new');
            $orders['new'] = $new;
            $pending = $user->orders->where('status', 'pending');
            $orders['pending'] = $pending;
            $delivered = $user->orders->where('status', 'delivered');
            $orders['delivered'] = $delivered;
            $in_progress = $user->orders->where('status', 'in_progress');
            $orders['in_progress'] = $in_progress;

            return response()->json(['data' => $orders, 'status' => true, 'message' => __('Orders')]);
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }

        return response()->json(['message' => 'Order is now']);
    }

    public function orderDone()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $orders = [];
            $rejected = $user->orders->where('status', 'rejected');
            $orders['cancelled'] = $rejected;
            $complete = $user->orders->where('status', 'complete');
            $orders['complete'] = $complete;

            return response()->json(['data' => $orders, 'status' => true, 'message' => __('Orders')]);
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }
    }

    public function orderDetails()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $order = Order::find(request()->order_id);

            if ($order) {
                if ($order->user_id == $user->id) {
                    return response()->json(['data' => $order, 'status' => true, 'message' => __('Order')]);
                } else {
                    return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
                }
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('Order not found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }
    }

    public function cancelOrder()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $order = Order::find(request()->order_id);

            $order->deliveryTime->consume = $order->deliveryTime->consume - 1;
            $order->deliveryTime->save();

            if ($order) {
                if ($order->user_id == $user->id) {
                    $order->status = 'rejected';
                    $order->cancellation_party = 'user';
                    $order->save();
                    return response()->json(['data' => $order, 'status' => true, 'message' => __('Order')]);
                } else {
                    return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
                }
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('Order not found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }
    }

    public function addProductToOrder()
    {

        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $order = $user->orders->where('id', request()->order_id)->first();
            if ($order) {
                $new_product = Product::find(request()->product_id);
                if ($new_product) {
                    $array_products = $order->products;
                    $this->cartController->insertProduct($array_products, $new_product, $order);
                    return response()->json(['data' => ['order' => $order], 'status' => true, 'message' => 'Product is added to order']);
                } else {
                    return response()->json(['data' => [], 'status' => false, 'message' => __('Product not found')]);
                }
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('Order not found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }
    }

    public function updateProductFromOrder()
    {

        $order_id = request()->order_id;
        if ($order_id) {
            request()->product_id = request()->order[0]['order_product_id'];
            request()->qty = request()->order[0]['qty'];
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('Order not found')]);
        }

        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $order = $user->orders->where('id', request()->order_id)->first();
            if ($order) {
                $new_product = Product::find(request()->product_id);
                if ($new_product) {
                    $array_products = $order->products;
                    $this->cartController->insertProduct($array_products, $new_product, $order);
                    return response()->json(['data' => ['order' => $order], 'status' => true, 'message' => 'Product is updated from order']);
                } else {
                    return response()->json(['data' => [], 'status' => false, 'message' => __('Product not found')]);
                }


            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => __('Order not found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }
    }

    public function deleteProductFromOrder()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {

            $order = $user->orders->where('id', request()->order_product_id)->first();

            if ($order) {

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
                return response()->json(['data' => [], 'status' => false, 'message' => __('Order not found')]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => __('You must be logged in to add an order')]);
        }
    }
}

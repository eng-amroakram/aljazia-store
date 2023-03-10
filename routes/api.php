<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\Authentication;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\MoreController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderHistoryController;
use App\Http\Controllers\Api\PanelController;
use App\Http\Controllers\Api\PointsProgramController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Api\SliderOfferController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(Authentication::class)->prefix('Auth')->group(
    function () {
        Route::get('get_user/{user}', 'getUser')->name('get_user');
        Route::post('register', 'register')->name('register');
        Route::post('login', 'login')->name('login');
        Route::post('forget_password', 'forgetPassword')->name('forget_password');
        Route::post('activate', 'activate')->name('activate');
        Route::post('change_password','changePassword')->name('change_password');
        Route::post('change_password_by_auth', 'changePasswordByAuth')->name('change_password_by_auth');
        Route::post('update_user', 'updateUser')->name('update_user');
        Route::get('logout', 'logout')->name('logout');
        Route::post('resend', 'resend')->name('resend');
        Route::post('change-language', 'changeLanguage')->name('change-language');
    }
);

Route::controller(StoreController::class)->middleware('auth:sanctum')->group(
    function () {
        Route::get('store', 'index')->name('store');
        Route::get('get_store_menu', 'getStoreCategories')->name('get_store_menu');
        Route::get('category', 'getStoreSubCategories')->name('category');
        Route::get('product', 'getStoreProducts')->name('product');
        Route::get('get_product_details', 'getProductDetails')->name('get_product_details');
        Route::get('add_remove_product_to_favorite', 'addRemoveProductToFavorite')->name('add_remove_product_to_favorite');
    }
);


Route::controller(SliderOfferController::class)->group(
    function () {
        Route::get('Offer', 'index')->name('Offer');
    }
);

Route::controller(CartController::class)->prefix('Cart')->middleware('auth:sanctum')->group(
    function () {
        Route::get('cart', 'index')->name('cart');
        Route::get('add_product_to_cart', 'addProductToCart')->name('add_product_to_cart');
        Route::get('delete_product_from_cart', 'deleteProductFromCart')->name('delete_product_from_cart');
        Route::get('empty_cart', 'emptyCart')->name('empty_cart');
        Route::get('reorder_cart', 'reorderCart')->name('reorder_cart');
        Route::get('refresh_cart', 'refreshCart')->name('refresh_cart');
    }
);

Route::controller(OrderController::class)->prefix('Order')->middleware('auth:sanctum')->group(
    function () {
        Route::get('before_add_order', 'beforeAddOrder')->name('before_add_order');
        Route::post('check_order', 'checkOrder')->name('check_order');
        Route::post('new_order', 'newOrder')->name('new_order');
        Route::get('order_now', 'orderNow')->name('order_now');
        Route::get('order_done', 'orderDone')->name('order_done');
        Route::get('order_details', 'orderDetails')->name('order_details');
        Route::get('cancel_order', 'cancelOrder')->name('cancel_order');
        Route::get('add-product-to-order', 'addProductToOrder')->name('add-product-to-order');
        Route::post('update-product-from-order', 'updateProductFromOrder')->name('update-product-from-order');
        Route::get('delete-product-from-order', 'deleteProductFromOrder')->name('delete-product-from-order');
    }
);

Route::controller(MoreController::class)->prefix('More')->middleware('auth:sanctum')->group(
    function () {
        Route::post('contact_us', 'contactUs')->name('contact_us');
        Route::post('customer_service', 'customerService')->name('customer_service');
        Route::get('get_all_notifications', 'getAllNotifications')->name('get_all_notifications');
        Route::get('read_notification', 'readNotification')->name('read_notification');
        Route::get('delete_all_notifications', 'deleteAllNotifications')->name('delete_all_notifications');
        Route::get('get_page_by_id', 'getPageById')->name('get_page_by_id');
        Route::get('get_setting', 'getSetting')->name('get_setting');
        Route::get('my_wallet', 'myWallet')->name('my_wallet');
        Route::get('convert_point_to_money', 'convertPointToMoney')->name('convert_point_to_money');
        Route::get('constants', 'constants')->name('constants');
    }
);

Route::controller(RateController::class)->prefix('Rate')->middleware('auth:sanctum')->group(
    function () {
        Route::get('add_order_rate', 'addOrderRate')->name('add_order_rate');
    }
);

Route::controller(DriverController::class)->prefix('Driver')->middleware('auth:sanctum')->group(
    function () {
        Route::get('add_product_to_order', 'addProductToOrder')->name('add_product_to_order');
        Route::post('update_product_from_order', 'updateProductFromOrder')->name('update_product_from_order');
        Route::get('delete_product_from_order', 'deleteProductFromOrder')->name('delete_product_from_order');
        Route::get('change_status', 'changeStatus')->name('change_status');
        Route::get('get_all_order', 'getAllOrder')->name('get_all_order');
        Route::get('stores', 'stores')->name('stores');
    }
);

Route::controller(PanelController::class)->prefix('Panel/Auth/')->group(
    function () {
        Route::post('login', 'login')->name('login');
        Route::get('logout', 'logout')->middleware('auth:sanctum')->name('logout');
    }
);

#Address Resouces
Route::controller(AddressController::class)->middleware('auth:sanctum')->group(
    function () {
        Route::group(['prefix' => 'Address'], function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show/{id}', 'show')->name('show');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });


        Route::get('map_bounds', 'mapBounds')->name('map_bounds');
    }
);


Route::get('test', [Authentication::class, 'test'])->middleware('auth:sanctum')->name('test');
Route::get('clear', [Authentication::class, 'clear'])->middleware('auth:sanctum')->name('clear');

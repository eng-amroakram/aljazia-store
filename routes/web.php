<?php

use App\Http\Controllers\ActionsControllers\IndexingController;
use App\Http\Controllers\ActionsControllers\DestoryingController;
use App\Http\Controllers\ActionsControllers\ForceDeletingController;
use App\Http\Controllers\ActionsControllers\RestoringController;
use App\Http\Controllers\ActionsControllers\SearchingController;
use App\Http\Controllers\ActionsControllers\Trashing\IndexingTrashingController;
use App\Http\Controllers\ActionsControllers\UpdatingController;
use App\Http\Controllers\ActionsControllers\StoringController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/fortify/fortify.php';

$request = request();

$prefix = 'admin/';
$as = 'admin.';
$guard = 'auth:admin';


if ($request->is('admin/*')) {
    $prefix = 'admin/';
    $as = 'admin.';
    $guard = 'auth:admin';
}

if ($request->is('manager/*')) {
    $prefix = 'manager/';
    $as = 'manager.';
    $guard = 'auth:manager';
}



Route::get('/', function () {
    return redirect()->route('admin.auth.login');
    return view('welcome');
})->middleware($guard)->name('home');


Route::group(['prefix' => $prefix, 'middleware' => $guard, 'as' =>  $as], function () {

    Route::get('/home', function () {
        return view('dashboard.home');
    })->name('home');


    Route::controller(IndexingController::class)->prefix('index')->group(
        function () {
            #done
            Route::get('/admins', 'admins')->name('admins.index');
            Route::get('/deliverise', 'deliverise')->name('deliverise.index');
            Route::get('/stores', 'stores')->name('stores.index');
            Route::get('/products', 'products')->name('products.index');
            Route::get('/sizes', 'sizes')->name('sizes.index');
            Route::get('/colors', 'colors')->name('colors.index');
            Route::get('/categories', 'categories')->name('categories.index');
            Route::get('/sub-categories', 'subCategories')->name('sub-categories.index');
            Route::get('/store-managers', 'storeManagers')->name('store-managers.index');
            Route::get('/users', 'users')->name('users.index');
            Route::get('/offers', 'offers')->name('offers.index');
            Route::get('/slider-offers', 'sliderOffers')->name('slider-offers.index');
            #undone
            Route::get('/orders/{status}', 'orders')->name('orders.index');
            Route::get('/areas', 'areas')->name('areas.index');
            Route::get('/map/{area}', 'map')->name('maps.index');
            Route::get('/delivery-time', 'deliveryTimes')->name('delivery-time.index');
            Route::get('/contact-us', 'contactUs')->name('contact-us.index');
            Route::get('/customer_service', 'customerService')->name('customer_service.index');
            Route::get('/notifications', 'notifications')->name('notifications.index');
            Route::get('/static-pages', 'staticPages')->name('static-pages.index');
            Route::get('/settings', 'settings')->name('settings.index');
            Route::get('points-program', 'PointsProgram')->name('points-program.index');
        }
    );


    Route::controller(IndexingTrashingController::class)->prefix('trashing')->as('trash.')->group(
        function () {
            #done
            Route::get('/admins', 'admins')->name('admins.index');
            Route::get('/deliverise', 'deliverise')->name('deliverise.index');
            Route::get('/stores', 'stores')->name('stores.index');
            Route::get('/products', 'products')->name('products.index');
            Route::get('/sizes', 'sizes')->name('sizes.index');
            Route::get('/colors', 'colors')->name('colors.index');
            Route::get('/categories', 'categories')->name('categories.index');
            Route::get('/sub-categories', 'subCategories')->name('sub-categories.index');
            Route::get('/users', 'users')->name('users.index');
            Route::get('/store-managers', 'storeManagers')->name('store-managers.index');
            Route::get('/users', 'users')->name('users.index');
            Route::get('/offers', 'offers')->name('offers.index');
            Route::get('/slider-offers', 'sliderOffers')->name('slider-offers.index');
            #undone
            Route::get('/orders/{status}', 'orders')->name('orders.index');
            Route::get('/areas', 'areas')->name('areas.index');
            Route::get('/delivery-time', 'deliveryTimes')->name('delivery-time.index');
        }
    );

    Route::controller(StoringController::class)->prefix('storing')->group(
        function () {
            #done
            Route::post('/admin', 'admin')->name('admins.store');
            Route::post('/delivery', 'delivery')->name('deliveries.store');
            Route::post('/store', 'store')->name('stores.store');
            Route::post('/product', 'product')->name('products.store');
            Route::put('/attr', 'attr')->name('attrs.store');
            Route::post('/color', 'color')->name('colors.store');
            Route::post('/category', 'category')->name('categories.store');
            Route::post('/sub-category', 'subCategory')->name('sub-categories.store');
            Route::post('/size', 'size')->name('sizes.store');
            Route::post('/user', 'user')->name('users.store');
            Route::post('/store-manager', 'storeManager')->name('store-managers.store');
            Route::post('/offer', 'offer')->name('offers.store');
            Route::post('/slider-offer', 'sliderOffer')->name('slider-offers.store');
            #undone
            Route::post('/order', 'order')->name('orders.store');
            Route::post('/area', 'area')->name('areas.store');
            Route::post('/map', 'map')->name('maps.store');
            Route::post('/delivery-time', 'deliveryTime')->name('delivery-time.store');
            Route::post('/notifications', 'notification')->name('notifications.store');
            Route::post('/notifications-collection', 'notificationsCollection')->name('notifications-collection.store');
            Route::post('/static-pages', 'staticPage')->name('static-pages.store');
            Route::post('points-program', 'PointsProgram')->name('points-program.store');

        }
    );

    Route::controller(UpdatingController::class)->prefix('updating')->group(
        function () {
            #done
            Route::put('/admin/{admin}', 'admin')->name('admins.update');
            Route::put('/delivery/{delivery}', 'delivery')->name('deliveries.update');
            Route::put('/store/{store}', 'store')->name('stores.update');
            Route::put('/product/{product}', 'product')->name('products.update');
            Route::put('/attr/{attr}', 'attr')->name('attrs.update');
            Route::put('/size/{size}', 'size')->name('sizes.update');
            Route::put('/color/{color}', 'color')->name('colors.update');
            Route::put('/category/{category}', 'category')->name('categories.update');
            Route::put('/sub-category/{subCategory}', 'subCategory')->name('sub-categories.update');
            Route::put('/user/{user}', 'user')->name('users.update');
            Route::put('/store-manager/{store_manager}', 'storeManager')->name('store-managers.update');
            Route::put('/offer/{offer}', 'offer')->name('offers.update');
            Route::put('/slider-offer/{sliderOffer}', 'sliderOffer')->name('slider-offers.update');
            #undone
            Route::put('/order/{order}', 'order')->name('orders.update');
            Route::put('/area/{area}', 'area')->name('areas.update');
            Route::put('/map/{area}', 'map')->name('maps.update');

            #Roles
            Route::put('/admin-role/{admin}', 'adminRoles')->name('admin-roles.update');
            Route::put('/store-manager-role/{storeManager}', 'storeManagerRoles')->name('store-manager-roles.update');

            Route::put('/delivery-time/{deliveryTime}', 'deliveryTimes')->name('delivery-time.update');
            Route::put('/static-pages', 'staticPage')->name('static-pages.update');
            Route::put('/settings/{settings}', 'settings')->name('settings.update');
            Route::put('points-program/{pointProgram}', 'PointsProgram')->name('points-program.update');

            #Orders
            Route::get('/order/{order}/status/{status}', 'changeOrderStatus')->name('orders.status');
            Route::post('/user-wallet/{user}', 'userWallet')->name('user-wallet.update');


        }
    );

    Route::controller(DestoryingController::class)->prefix('destroying')->group(
        function () {
            #done
            Route::delete('/admin/{admin}', 'admin')->name('admins.destroy');
            Route::delete('/delivery/{delivery}', 'delivery')->name('deliveries.destroy');
            Route::delete('/store/{store}', 'store')->name('stores.destroy');
            Route::delete('/product/{product}', 'product')->name('products.destroy');
            Route::delete('/color/{color}', 'color')->name('colors.destroy');
            Route::delete('/category/{category}', 'category')->name('categories.destroy');
            Route::delete('/sub-category/{subCategory}', 'subCategory')->name('sub-categories.destroy');
            Route::delete('/size/{size}', 'size')->name('sizes.destroy');
            Route::delete('/attr/{attribute}', 'attr')->name('attrs.destroy');
            Route::delete('/user/{user}', 'user')->name('users.destroy');
            Route::delete('/store-manager/{store_manager}', 'storeManager')->name('store-managers.destroy');
            Route::delete('/offer/{offer}', 'offer')->name('offers.destroy');
            Route::delete('/slider-offer/{sliderOffer}', 'sliderOffer')->name('slider-offers.destroy');
            #undone
            Route::delete('/order/{order}', 'order')->name('orders.destroy');
            Route::delete('/area/{area}', 'area')->name('areas.destroy');
            Route::delete('delivery-time/{deliveryTime}', 'deliveryTime')->name('delivery-time.destroy');
        }
    );


    Route::controller(ForceDeletingController::class)->prefix('force-deleting')->group(
        function () {
            #done
            Route::delete('/admin/{admin}', 'admin')->name('admins.force-delete');
            Route::delete('/delivery/{delivery}', 'delivery')->name('deliveries.force-delete');
            Route::delete('/store/{store}', 'store')->name('stores.force-delete');
            Route::delete('/size/{size}', 'size')->name('sizes.force-delete');
            Route::delete('/color/{color}', 'color')->name('colors.force-delete');
            Route::delete('/category/{category}', 'category')->name('categories.force-delete');
            Route::delete('/sub-category/{subCategory}', 'subCategory')->name('sub-categories.force-delete');
            Route::delete('/product/{product}', 'product')->name('products.force-delete');
            Route::delete('/user/{user}', 'user')->name('users.force-delete');
            Route::delete('/store-manager/{store_manager}', 'storeManager')->name('store-managers.force-delete');
            Route::delete('/offer/{offer}', 'offer')->name('offers.force-delete');
            Route::delete('/slider-offer/{sliderOffer}', 'sliderOffer')->name('slider-offers.force-delete');
            #undone
            Route::delete('/order/{order}', 'order')->name('orders.force-delete');
            Route::delete('/area/{area}', 'area')->name('areas.force-delete');
        }
    );

    Route::controller(RestoringController::class)->prefix('restoring')->group(
        function () {
            #done
            Route::post('/admin/{admin}', 'admin')->name('admins.restore');
            Route::post('/delivery/{delivery}', 'delivery')->name('deliveries.restore');
            Route::post('/store/{store}', 'store')->name('stores.restore');
            Route::post('/product/{product}', 'product')->name('products.restore');
            Route::post('/color/{color}', 'color')->name('colors.restore');
            Route::post('/category/{category}', 'category')->name('categories.restore');
            Route::post('/sub-category/{subCategory}', 'subCategory')->name('sub-categories.restore');
            Route::post('/size/{size}', 'size')->name('sizes.restore');
            Route::post('/user/{user}', 'user')->name('users.restore');
            Route::post('/store-manager/{store_manager}', 'storeManager')->name('store-managers.restore');
            Route::post('/offer/{offer}', 'offer')->name('offers.restore');
            Route::post('/slider-offer/{sliderOffer}', 'sliderOffer')->name('slider-offers.restore');
            #undone
            Route::post('/order/{order}', 'order')->name('orders.restore');
            Route::post('/area/{area}', 'area')->name('areas.restore');
        }
    );


    Route::controller(SearchingController::class)->prefix('searching')->group(
        function () {
            #done
            Route::get('/admins/search', 'admins')->name('admins.search');
            Route::get('/delivery/search', 'deliveries')->name('deliveries.search');
            Route::get('/stores/search', 'stores')->name('stores.search');
            Route::get('/products/search', 'products')->name('products.search');
            Route::get('/users/search', 'users')->name('users.search');
            Route::get('/store-managers/search', 'storeManagers')->name('store-managers.search');

            #Searching Pages
            Route::get('/store-products/{search}', 'storeProducts')->name('store-products.search');
            Route::get('/store-deliveries/{search}', 'storeDeliveries')->name('store-deliveries.search');
            Route::get('/store-store-managers/{search}', 'storeStoreManagers')->name('store-store-managers.search');
            Route::get('/categories/{search}', 'categories')->name('categories.search');
            Route::get('/sub-categories/{search}', 'subCategories')->name('sub-categories.search');
            Route::get('/offers/search', 'offers')->name('offers.search');
            Route::get('/slider-offers/search', 'sliderOffers')->name('slider-offers.search');
            #undone
            Route::get('/orders/search', 'orders')->name('orders.search');

            Route::get('/user-orders/{user}', 'userOrders')->name('user-orders.search');
            Route::get('/user-wallet/{user}', 'userWallet')->name('user-wallet.search');


        }
    );
});


Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

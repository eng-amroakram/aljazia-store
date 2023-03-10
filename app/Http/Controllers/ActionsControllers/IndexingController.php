<?php

namespace App\Http\Controllers\ActionsControllers;

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ModelsController;
use App\Models\Admin;
use App\Models\Area;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\DeliveryTime;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Settings;
use App\Models\SliderOffer;
use App\Models\StaticPage;
use App\Models\Store;
use App\Models\StoreManager;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use stdClass;

class IndexingController extends Controller
{
    protected $models;
    protected $authorization;

    public function __construct(ModelsController $models, AuthorizationController $authorization)
    {
        $this->models = $models;
        $this->authorization = $authorization;
    }

    public function admins()
    {
        // DB::purge('mysql');

        // Config::set('database.connections.mysql.database', 'aljaz-dev');

        // $users = DB::Table('users')->get();
        // $categories = DB::Table('categories')->get();
        // $sub_categories = DB::Table('sub_categories')->get();
        // $products = DB::Table('products')->get();
        // $settings = DB::Table('settings')->get();
        // $pages = DB::Table('pages')->get();
        // $offers = DB::Table('offers')->get();
        // $product_favorites = DB::Table('product_favorites')->get();
        // $user_wallets = DB::Table('user_wallets')->get();
        // $orders = DB::Table('orders')->get();



        // DB::purge('mysql');

        // Config::set('database.connections.mysql.database', 'test');


        // foreach ($users as $user) {

        //     // if($user->email == "rihabaser20201e@gmail.com")
        //     // {
        //     //     DB::purge('mysql');

        //     //     Config::set('database.connections.mysql.database', 'aljaz-dev');
        //     //     dd($user);
        //     // }



        //     if ($user->user_type == 0) {
        //         Admin::create([
        //             'id' => $user->id,
        //             'name' => $user->user_name,
        //             'username',
        //             'email' => $user->email ?? "admintest@gmail.com",
        //             'phone_number' => $user->mobile,
        //             'role' => 'superadmin',
        //             'status' => $user->is_active ? 'active' : 'inactive',
        //             'password' => $user->password,


        //             'avatar' => $user->avatar,
        //             'active_code' => $user->active_code,
        //             'is_verified' => $user->is_verified,
        //             'verified_at' => $user->verified_at,
        //             'created_at' => $user->created_at,
        //             'updated_at' => $user->updated_at,
        //             // 'deleted_at' => $user->is_delete,
        //         ]);
        //     }


        //     if ($user->user_type == 1) {
        //         Admin::create([
        //             'id' => $user->id,
        //             'name' => $user->user_name,
        //             'username',
        //             'email' => $user->email ?? "admintest@gmail.com",
        //             'phone_number' => $user->mobile,
        //             'role' => 'admin',
        //             'status' => $user->is_active ? 'active' : 'inactive',
        //             'password' => $user->password,


        //             'avatar' => $user->avatar,
        //             'active_code' => $user->active_code,
        //             'is_verified' => $user->is_verified,
        //             'verified_at' => $user->verified_at,
        //             'created_at' => $user->created_at,
        //             'updated_at' => $user->updated_at,
        //             // 'deleted_at' => $user->is_delete,
        //         ]);
        //     }



        //     if ($user->user_type == 2) {

        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'aljaz-dev');

        //         $store = DB::Table('store_translations')->where('store_id', $user->id)->get();
        //         $store_working_days = DB::Table('store_working_days')->where('store_id', $user->id)->get();
        //         $times = DB::Table('store_working_times')->where('store_id', $user->id)->get();
        //         $store_drivers = DB::Table('store_drivers')->get();
        //         $times_days =  $times->pluck('day_id')->toArray();

        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'test');

        //         $days = [];

        //         if ($store_working_days->count() > 0) {
        //             foreach ($store_working_days as $day) {
        //                 array_push($days, $day->day_number);
        //             }
        //         }

        //         Store::create([
        //             'id' => $user->id,
        //             'admin_id' => 1,
        //             'status' => $user->is_active ? 'active' : 'inactive',
        //             'en_name' => $store[1]->name,
        //             'ar_name' => $store[0]->name,
        //             'phone_number' => $user->mobile,
        //             'email' => $user->email ?? "admintest@gmail.com",
        //             'min_order' => $user->min_order,
        //             'tax_number' => $user->tax_number,
        //             'vat_number' => $user->vat_number,
        //             'days_of_work' => $days,
        //             'image' => $user->avatar,

        //             'active_code' => $user->active_code,
        //             'is_verified' => $user->is_verified,
        //             'verified_at' => $user->verified_at,
        //             'created_at' => $user->created_at,
        //             'updated_at' => $user->updated_at,
        //             // 'deleted_at' => $user->is_delete,
        //         ]);

        //         if ($times->count() > 0) {

        //             DB::purge('mysql');

        //             Config::set('database.connections.mysql.database', 'test');
        //             foreach ($times as $time) {


        //                 $new_days = [];


        //                 foreach ($times_days as $day) {
        //                     if (!(in_array($day, $new_days))) {
        //                         if ($time->is_active) {
        //                             array_push($new_days, $day);
        //                         }
        //                     }
        //                 }

        //                 DeliveryTime::create([
        //                     'id' => $time->id,
        //                     'admin_id' => 1,
        //                     'delivery_id' =>  null,
        //                     'store_id' => $time->store_id,
        //                     'store_manager_id' => null,
        //                     'days' => $new_days,
        //                     'start_time' => $time->from_time,
        //                     'end_time' => $time->to_time,
        //                     'price' => $time->price,
        //                     'capacity' => $time->capacity,
        //                     'consume' => $time->consume,
        //                     'status' => $new_days,
        //                     'created_at' => $user->created_at,
        //                     'updated_at' => $user->updated_at,
        //                 ]);
        //             }
        //         }
        //     }



        //     if ($user->user_type == 3) {
        //         User::create([
        //             'id' => $user->id,
        //             'admin_id' => 1,
        //             'name' => $user->user_name,
        //             'username',
        //             'email' => $user->email ?? "admintest@gmail.com",
        //             'phone_number' => $user->mobile,
        //             'role' => 'user',
        //             'status' => $user->is_active ? 'active' : 'inactive',
        //             'password' => $user->password,


        //             'avatar' => $user->avatar,
        //             'active_code' => $user->active_code,
        //             'is_verified' => $user->is_verified,
        //             'verified_at' => $user->verified_at,
        //             'created_at' => $user->created_at,
        //             'updated_at' => $user->updated_at,
        //             // 'deleted_at' => $user->is_delete,
        //         ]);
        //     }


        //     if ($user->user_type == 4) {
        //         $new_user = User::create([
        //             'id' => $user->id,
        //             'admin_id' => 1,
        //             'name' => $user->user_name,
        //             'email' => $user->email ?? "admintest@gmail.com",
        //             'phone_number' => $user->mobile,
        //             'role' => 'delivery',
        //             'status' => $user->is_active ? 'active' : 'inactive',
        //             'password' => $user->password,

        //             'avatar' => $user->avatar,
        //             'active_code' => $user->active_code,
        //             'is_verified' => $user->is_verified,
        //             'verified_at' => $user->verified_at,
        //             'created_at' => $user->created_at,
        //             'updated_at' => $user->updated_at,
        //             // 'deleted_at' => $user->is_delete,
        //             // 'fcm_token',
        //             // 'device_id',
        //             // 'device_type',
        //         ]);

        //         $delivery = Delivery::create([
        //             'id' => $new_user->id,
        //             'user_id' => $new_user->id,
        //             'admin_id' => 1,
        //             'name' => $new_user->name,
        //             'email' => $new_user->email,
        //             'phone_number' => $new_user->phone_number,
        //             'status' => $new_user->status,
        //             'password' => $new_user->password,

        //             'avatar' => $new_user->avatar,
        //             'active_code' => $new_user->active_code,
        //             'is_verified' => $new_user->is_verified,
        //             'verified_at' => $new_user->verified_at,
        //             'created_at' => $new_user->created_at,
        //             'updated_at' => $new_user->updated_at,
        //             // 'deleted_at' => $new_user->is_delete,

        //         ]);

        //         $stores_ids = [];

        //         foreach ($store_drivers as $driver) {
        //             if ($driver->driver_id == $delivery->id) {
        //                 if (Store::find($driver->store_id)) {
        //                     array_push($stores_ids, $driver->store_id);
        //                 }
        //             }
        //         }
        //         if ($stores_ids !== []) {
        //             $delivery->stores()->sync($stores_ids);
        //         }
        //     }

        //     if ($user->user_type == 5) {
        //         StoreManager::create([
        //             'id' => $user->id,
        //             'admin_id' => 1,
        //             'store_id' => null,
        //             'name' => $user->user_name,
        //             'email' => $user->email ?? "admintest@gmail.com",
        //             'phone_number' => $user->mobile,
        //             'status' => $user->is_active ? 'active' : 'inactive',
        //             'role' => 'supermanager',
        //             'password' => $user->password,

        //             'avatar' => $user->avatar,
        //             'active_code' => $user->active_code,
        //             'is_verified' => $user->is_verified,
        //             'verified_at' => $user->verified_at,
        //             'created_at' => $user->created_at,
        //             'updated_at' => $user->updated_at,
        //             // 'deleted_at' => $user->is_delete,

        //         ]);
        //     }
        // }


        // // Adding Categories

        // if ($categories->count()) {

        //     foreach ($categories as $category) {

        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'aljaz-dev');

        //         $category_translations = DB::Table('category_translations')->where('category_id', $category->id)->get();

        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'test');

        //         Category::create([
        //             'id' => $category->id,
        //             'admin_id' => 1,
        //             'store_manager_id' => 40,
        //             'store_id' => $category->store_id,
        //             'category_type' => $category->is_pay ? 'sell' : 'borrow',
        //             'ar_name' => ($category_translations->count()) ? $category_translations[1]->name : "None",
        //             'en_name' => ($category_translations->count()) ? $category_translations[0]->name : "None",
        //             'status' => $category->is_active ? 'active' : 'inactive',
        //             'ranking' => $category->sorting_order,
        //             'image' =>  $category->img,
        //             'created_at' => $category->created_at,
        //             'updated_at' => $category->updated_at,
        //         ]);
        //     }
        // }


        // // Adding Sub Categories
        // if ($sub_categories->count()) {

        //     foreach ($sub_categories as $sub_category) {

        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'aljaz-dev');

        //         $sub_category_translations = DB::Table('sub_category_translations')->where('sub_category_id', $sub_category->id)->get();

        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'test');

        //         SubCategory::create([
        //             'id' => $sub_category->id,
        //             'admin_id' => 1,
        //             'store_manager_id' => 40,
        //             'store_id' => $sub_category->store_id,
        //             'category_id' => $sub_category->category_id,
        //             'ar_name' => ($sub_category_translations->count()) ? $sub_category_translations[1]->name : "None",
        //             'en_name' => ($sub_category_translations->count()) ? $sub_category_translations[0]->name : "None",
        //             'status' => $sub_category->is_active ? 'active' : 'inactive',
        //             'ranking' => $sub_category->sorting_order,
        //             'created_at' => $sub_category->created_at,
        //             'updated_at' => $sub_category->updated_at,
        //             // 'image' =>  $sub_category->img,
        //         ]);
        //     }
        // }


        // // Adding Products

        // if ($products->count() > 0) {
        //     foreach ($products as $product) {

        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'aljaz-dev');

        //         $product_translations = DB::Table('product_translations')->where('product_id', $product->id)->get();

        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'test');

        //         Product::create([
        //             'id' => $product->id,
        //             'admin_id' => 1,
        //             'store_manager_id' => 40,
        //             'store_id' => $product->store_id,
        //             'category_id' => $product->category_id,
        //             'sub_category_id' => $product->sub_category_id,
        //             'ar_description' => ($product_translations->count()) ? $product_translations[1]->description : "None",
        //             'en_description' => ($product_translations->count()) ? $product_translations[0]->description : "None",
        //             'ar_name' => ($product_translations->count()) ? $product_translations[1]->name : "None",
        //             'en_name' => ($product_translations->count()) ? $product_translations[0]->name : "None",
        //             'status' => $product->is_active ? 'active' : 'inactive',
        //             'price' => $product->price,
        //             'image' =>  $product->image,
        //             'ranking' => $product->sorting_order,
        //             'offer_price' => $product->offer_price,
        //             'is_offer' => $product->is_offer,
        //             'order_max' => $product->order_max,
        //             'created_at' => $product->created_at,
        //             'updated_at' => $product->updated_at,
        //         ]);
        //     }
        // }


        // if($settings->count() > 0)
        // {
        //     foreach($settings as $setting){

        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'aljaz-dev');
        //         $setting_translations = DB::Table('setting_translations')->where('setting_id', $setting->id)->get();
        //         DB::purge('mysql');

        //         Config::set('database.connections.mysql.database', 'test');
        //         Settings::create([
        //             'id' => $setting->id,
        //             'admin_id' => 1,
        //             'facebook' => $setting->facebook,
        //             'instagram' => $setting->instagram,
        //             'twitter' => $setting->twitter,
        //             'youtube' => $setting->youtube,
        //             'email_manager' => $setting->email,
        //             'mobile' => $setting->mobile,
        //             'telephone' => $setting->phone,
        //             'vat' => $setting->vat,
        //             'vat_no' =>  $setting->vat_no,
        //             'ios_link' => $setting->url_ios,
        //             'android_link' => $setting->url_android,
        //             'website_link' => $setting->url,
        //             'ar_decription' => ($setting_translations->count()) ? $setting_translations[0]->description : "None",
        //             'en_decription' => ($setting_translations->count()) ? $setting_translations[1]->description : "None",
        //             'ar_address' => ($setting_translations->count()) ? $setting_translations[0]->address : "None",
        //             'en_address' => ($setting_translations->count()) ? $setting_translations[1]->address : "None",
        //             'created_at' => $setting->created_at,
        //             'updated_at' => $setting->updated_at,
        //         ]);
        //     }
        // }

        // // Add Page

        // if($pages->count() > 0)
        // {
        //     foreach($pages  as  $page)
        //     {
        //         $page_translations = DB::Table('page_translations')->where('page_id', $page->id)->get();

        //         StaticPage::create([
        //             'id' => $page->id,
        //             'admin_id' => 1,
        //             'ar_name' => ($page_translations->count()) ? $page_translations[0]->name : "None",
        //             'en_name' => ($page_translations->count()) ? $page_translations[1]->name : "None",
        //             'ar_description' => ($page_translations->count()) ? $page_translations[0]->description : "None",
        //             'en_description' => ($page_translations->count()) ? $page_translations[1]->description : "None",
        //             'link' => $page->link,
        //             'created_at' => $page->created_at,
        //             'updated_at' => $page->updated_at,

        //         ]);
        //     }
        // }

        // if($offers->count() > 0)
        // {
        //     foreach($offers as $offer)
        //     {
        //         SliderOffer::create([
        //             'id' => $offer->id,
        //             'admin_id' => 1,
        //             'name' => $offer->name,
        //             'image' => $offer->image,
        //             'status' => $offer->is_active ? 'active' : 'inactive',
        //             'created_at' => $offer->created_at,
        //             'updated_at' => $offer->updated_at,
        //         ]);
        //     }
        // }

        // if($product_favorites->count() > 0)
        // {
        //     foreach($product_favorites as $product_favorite)
        //     {
        //         $user_f = User::find($product_favorite->user_id);
        //         $product_f = Product::find($product_favorite->product_id);

        //         if($user_f && $product_f ){
        //             $user_f->favoritesProducts()->attach($product->id);
        //         }
        //     }
        // }


        // if($user_wallets->count() > 0)
        // {
        //     foreach($user_wallets as $user_wallet)
        //     {
        //         Wallet::create([
        //             'admin_id' => 1,
        //             'user_id' => $user_wallet->user_id,
        //             'balance' => $user_wallet->balance,
        //             'total_deposit',
        //             'total_withdraw',
        //             'points',
        //         ]);
        //     }
        // }

        // if($orders->count() > 0)
        // {


        //     foreach($orders as $order){

        //         if($order->not_found_option == 1)
        //         {
        //             $not_found_option = 'contact with me';
        //         }

        //         if($order->not_found_option == 2)
        //         {
        //             $not_found_option = 'remove product';
        //         }

        //         if($order->not_found_option == 3)
        //         {
        //             $not_found_option = 'replace product';
        //         }

        //         if($order->status_id == 1)
        //         {
        //             $status = 'new';
        //         }

        //         if($order->status_id == 2)
        //         {
        //             $status = 'pending';
        //         }

        //         if($order->status_id == 3)
        //         {
        //             $status = 'in_progress';
        //         }

        //         if($order->status_id == 4)
        //         {
        //             $status = 'delivered';
        //         }

        //         if($order->status_id == 5)
        //         {
        //             $status = 'rejected';
        //         }

        //         if($order->status_id == 6)
        //         {
        //             $status = 'completed';
        //         }


        //         Order::create([
        //             'admin_id' => 1,
        //             'order_code' => $order->order_code,
        //             'delivery_id' => $order->driver_id,
        //             'user_id' => $order->user_id,
        //             'store_id' => $order->store_id,
        //             'delivery_time_id' => $order->time_id,
        //             'address_id' => $order->address_id,
        //             'status' => $status,
        //             'products',

        //             'delivery_price' => $order->delivery_price,
        //             'total_price' => $order->total_price,
        //             'total_products',
        //             'vat_price' => $order->vat_price,
        //             'vat' => $order->vat,

        //             'payment_method' => ($order->payment_method) ? 'mada' : 'cash',
        //             'not_found_option' => $not_found_option,
        //             'cancellation_party'=> 'user',
        //         ]);











        //         $order_products = DB::Table('order_products')->where('order_id', $order->id)->get();

        //         $products_ids = $order_products->pluck('product_id')->toArray();

        //         // $check = true;
        //         // $total_price = 0;
        //         // $total_products = 0;
        //         // $object_products = json_decode(json_encode($array_products));

        //         // foreach ($object_products as $id => $product) {

        //         //     if ($product->id == $new_product->id) {

        //         //         $check = false;
        //         //         $product->quantity = request()->qty;
        //         //         $product->store_manager_id = $new_product->store_manager_id;
        //         //         $product->category_id = $new_product->category_id;
        //         //         $product->sub_category_id = $new_product->sub_category_id;
        //         //         $product->price = $new_product->price;
        //         //         $product->ar_name = $new_product->ar_name;
        //         //         $product->en_name = $new_product->en_name;
        //         //         $product->ar_description = $new_product->ar_description;
        //         //         $product->en_description = $new_product->en_description;
        //         //         $product->status = $new_product->status;
        //         //         $cart->products = $object_products;
        //         //         $cart->save();
        //         //     }

        //         //     $total_price = $total_price + ($product->price * $product->quantity);
        //         //     $total_products = $total_products + 1;
        //         // }

        //         // if ($check) {
        //         //     $new_product->quantity = request()->qty;
        //         //     $array_products["id$new_product->id"] = $new_product;
        //         //     $object_products = json_decode(json_encode($array_products));
        //         //     $cart->products = $object_products;
        //         //     $total_products = $total_products + 1;
        //         //     $cart->total_products = $total_products;
        //         //     $cart->total_price = $total_price + ($new_product->price * $new_product->quantity);
        //         //     $cart->save();
        //         //     return response()->json(['cart' => $cart]);
        //         // }

        //         // $cart->total_price = $total_price;
        //         // $cart->total_products = $total_products;
        //         // $cart->save();



        //     }
        // }




        $admins = $this->authorization->authorizeAdminIndex();
        if ($admins == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.admins.index', compact('admins'));
    }



































































    public function PointsProgram()
    {
        $program_points = $this->authorization->authorizePointsProgramIndex();
        if ($program_points == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.points-program.index', compact('program_points'));
    }

    public function stores()
    {
        $models = $this->authorization->authorizeStoresIndex();
        if ($models == "unauthorized") {
            return abort(403);
        }
        $stores = $models['stores'];
        $super_store_managers = $models['super_store_managers'];
        $deliveries = $models['deliveries'];
        $delivery_times = $models['delivery_times'];
        return view('dashboard.stores.index', compact('stores', 'super_store_managers', 'deliveries', 'delivery_times'));
    }

    public function users()
    {
        $users = $this->authorization->authorizeUsersIndex();
        if ($users == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.users.index', compact('users'));
    }

    public function storeManagers()
    {
        $models = $this->authorization->authorizeStoreManagersIndex();
        if ($models == "unauthorized") {
            return abort(403);
        }
        $stores = $models['stores'];
        $storeManagers = $models['storeManagers'];
        return view('dashboard.store-managers.index', compact('stores', 'storeManagers'));
    }

    public function deliverise()
    {
        $models = $this->authorization->authorizeDeliveriseIndex();
        if ($models == "unauthorized") {
            return abort(403);
        }
        $stores = $models['stores'];
        $deliveries = $models['deliverise'];
        $delivery_times = $models['delivery_times'];

        return view('dashboard.deliveries.index', compact('stores', 'deliveries', 'delivery_times'));
    }

    public function products()
    {
        $models = $this->authorization->authorizeProductsIndex();
        if ($models == "unauthorized") {
            return abort(403);
        }
        $stores = $models['stores'];
        $sizes = $models['sizes'];
        $colors = $models['colors'];
        $categories = $models['categories'];
        $sub_categories = $models['sub_categories'];
        $products = $models['products'];
        return view('dashboard.stores.products.index', compact('products', 'colors', 'sizes', 'stores', 'categories', 'sub_categories'));
    }

    public function categories()
    {
        $stores = $this->models->store()::all();
        $categories = $this->authorization->authorizeCategoriesIndex();
        if ($categories == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.stores.categories.index', compact('categories', 'stores'));
    }

    public function subCategories()
    {
        $categories = $this->models->category()::all();
        $sub_categories = $this->authorization->authorizeSubCategoriesIndex();
        if ($sub_categories == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.stores.sub-categories.index', compact('sub_categories', 'categories'));
    }

    public function sizes()
    {
        $sizes = $this->authorization->authorizeSizesIndex();
        if ($sizes == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.stores.products.sizes.index', compact('sizes'));
    }

    public function colors()
    {
        $colors = $this->authorization->authorizeColorsIndex();
        if ($colors == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.stores.products.colors.index', compact('colors'));
    }

    public function offers()
    {
        $models = $this->authorization->authorizeOffersIndex();
        if ($models == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.offers.index', compact('offers'));
    }

    public function sliderOffers()
    {
        $slider_offers = $this->authorization->authorizeSliderOffersIndex();
        if ($slider_offers == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.slider-offers.index', compact('slider_offers'));
    }

    public function areas()
    {
        $areas = $this->authorization->authorizeAreasIndex();
        if ($areas == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.areas.index', compact('areas'));
    }

    public function map(Area $area)
    {
        $areas = $this->authorization->authorizeAreasIndex();
        if ($areas == "unauthorized") {
            return abort(403);
        }
        $id = $area->id;
        $bounds = $area->bounds ?? "[]";
        return view('dashboard.areas.map.index', compact('id', 'bounds'));
    }

    public function deliveryTimes()
    {
        $delivery_times = $this->authorization->authorizeDeliveryTimesIndex();
        if ($delivery_times == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.delivery-time.index', compact('delivery_times'));
    }

    public function contactUs()
    {
        $messages = $this->authorization->authorizeContactUsIndex();
        if ($messages == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.contact-us.index', compact('messages'));
    }

    public function customerService()
    {
        $messages = $this->authorization->authorizeCustomerServiceIndex();
        if ($messages == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.customers-service.index', compact('messages'));
    }

    public function notifications()
    {
        $users = $this->authorization->authorizeNotificationsIndex();

        if ($users == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.notifications.index', compact('users'));
    }

    public function staticPages()
    {
        $static_pages = $this->authorization->authorizeStaticPagesIndex();
        if ($static_pages == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.static-pages.index', compact('static_pages'));
    }

    public function settings()
    {
        $settings = $this->authorization->authorizeSettingsIndex();
        if ($settings == "unauthorized") {
            return abort(403);
        }

        if ($settings->count() > 0) {
            $settings = $settings[0];
        } else {
            $settings = new Settings();
            $settings->id = 1;
        }

        return view('dashboard.settings.index', compact('settings'));
    }

    public function orders($status)
    {

        $orders = $this->authorization->authorizeOrdersIndex($status);

        if ($orders == "unauthorized") {
            return abort(403);
        }
        return view('dashboard.orders.index', compact('orders', 'status'));
    }
}

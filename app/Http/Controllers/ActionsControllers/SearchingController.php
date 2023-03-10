<?php

namespace App\Http\Controllers\ActionsControllers;

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ModelsController;
use App\Models\Order;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class SearchingController extends Controller
{

    protected $models;
    protected $request;
    protected $authorization;
    public function __construct(ModelsController $models, Request $request, AuthorizationController $authorization)
    {
        (request()->is('manager/*')) ? $this->middleware('auth:manager') : $this->middleware('auth:admin');
        $this->request = $request;
        $this->models = $models;
        $this->authorization = $authorization;
    }

    public function admins()
    {
        $admins = $this->authorization->checkAdminsPermission('searching', 'admins');
        return view('dashboard.admins.index', compact('admins'));
    }

    public function stores()
    {
        $stores = $this->authorization->checkStoresPermission('searching', 'stores');
        if ($stores == "unauthorized") {
            return abort(401, 'unauthorized');
        }
        $super_store_managers = $this->models->storeManager()::where('role', 'supermanager')->get();

        if (!$stores[0]) {
            return redirect()->back()->with('searchNotFound', 'المتجر غير موجود في نتائج البحث');
        }
        return view('dashboard.stores.index', compact('stores', 'super_store_managers'));
    }

    public function users()
    {
        $users = $this->authorization->checkUsersPermission('searching', 'users');
        if ($users == "unauthorized") {
            return abort(401, 'unauthorized');
        }
        return view('dashboard.users.index', compact('users'));
    }

    public function storeManagers()
    {
        $models = $this->authorization->checkStoreManagersPermission('searching', 'storeManagers');
        if ($models == "unauthorized") {
            return abort(401, 'unauthorized');
        }
        $stores = $models['stores'];
        $storeManagers = $models['storeManagers'];
        return view('dashboard.store-managers.index', compact('stores', 'storeManagers'));
    }

    public function deliveries()
    {
        $models = $this->authorization->checkDelvieriesPermission('searching', 'deliveries');

        if ($models == 'unauthorized') {
            return abort(401, 'unauthorized');
        }
        $deliveries = $models['deliveries'];
        $stores = $models['stores'];
        return view('dashboard.deliveries.index', compact('stores', 'deliveries'));
    }

    public function orders()
    {
        $models = $this->authorization->checkOrdersPermission('searching', 'orders');
        if ($models == "unauthorized") {
            return abort(401, 'unauthorized');
        }
        $orders = $models['orders'];
        $stores = $models['stores'];
        return view('dashboard.orders.index', compact('orders', 'stores'));
    }

    public function products()
    {
        $models = $this->authorization->checkProductsPermission('searching', 'products');
        if ($models == "unauthorized") {
            return abort(401, 'unauthorized');
        }
        $sizes = $models['sizes'];
        $stores = $models['stores'];
        $colors = $models['colors'];
        $categories = $models['categories'];
        $sub_categories = $models['sub_categories'];
        $products = $models['products'];
        return view('dashboard.stores.products.index', compact('products', 'sizes', 'colors', 'stores', 'categories', 'sub_categories'));
    }

    public function storeProducts($id)
    {
        $sizes = $this->models->size()::all();
        $stores = $this->models->store()::all();
        $colors = $this->models->color()::all();
        $categories = $this->models->category()::all();
        $sub_categories = $this->models->subCategory()::all();
        $products = $this->models->store()::getStoreProducts($id)->paginate(10);
        return view('dashboard.stores.products.index', compact('products', 'sizes', 'colors', 'stores', 'categories', 'sub_categories'));
    }

    public function storeStoreManagers($id)
    {
        $stores = $this->models->store()::all();
        $storeManagers = $this->models->store()::getStoreStoreManagers($id)->paginate(9);
        return view('dashboard.store-managers.index', compact('stores', 'storeManagers'));
    }


    public function storeDeliveries($id)
    {
        $stores = $this->models->store()::all();
        $deliveries = $this->models->store()::getStoreDeliveries($id)->paginate(10);
        return view('dashboard.deliveries.index', compact('stores', 'deliveries'));
    }

    public function subCategories($id)
    {
        $categories = $this->models->category()::all();
        $category = $this->models->category()::find($id);
        $sub_categories = $category->subCategories->paginate(10);
        return view('dashboard.stores.sub-categories.index', compact('sub_categories', 'categories'));
    }

    public function userOrders(User $user)
    {
        $orders = Order::where('user_id', $user->id)->paginate(10);
        $status = 'complete';
        return view('dashboard.orders.index', compact('orders', 'status'));
    }

    public function userWallet(User $user)
    {
        $wallet = $user->wallet;

        if (!$wallet) {
            $wallet =  Wallet::create([
                'admin_id' => 1,
                'user_id' => $user->id,
                'balance' => 0,
                'total_deposit' => 0,
                'total_withdraw' => 0,
                'points' => 0,
            ]);
        }

        $walletHistories = $wallet->walletHistory()->paginate(10);

        return view('dashboard.users.wallet.index', compact('wallet', 'walletHistories'));
    }
}

<?php

namespace App\Http\Controllers\ActionsControllers\Trashing;

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ModelsController;
use Illuminate\Http\Request;

class IndexingTrashingController extends Controller
{
    protected $models;
    protected $authorization;

    public function __construct(ModelsController $models, AuthorizationController $authorization)
    {
        request()->is('admin/*') ? $this->middleware('auth:admin') : $this->middleware('auth:manager');
        $this->models = $models;
        $this->authorization = $authorization;
    }


    public function admins()
    {
        $admins = $this->authorization->authorizeAdminIndexingTrash();
        if ($admins == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        return view('dashboard.admins.trash', compact('admins'));
    }

    public function stores()
    {
        $models = $this->authorization->authorizeStoreIndexingTrash();
        if ($models == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        $stores = $models['stores'];
        $superStoreManagers = $models['superStoreManagers'];
        return view('dashboard.stores.trash', compact('stores', 'superStoreManagers'));
    }

    public function users()
    {
        $users = $this->authorization->authorizeUserIndexingTrash();
        return view('dashboard.users.trash', compact('users'));
    }

    public function storeManagers()
    {
        $models = $this->authorization->authorizeStoreManagerIndexingTrash();
        if ($models == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        $storeManagers = $models['storeManagers'];
        $stores = $models['stores'];
        return view('dashboard.store-managers.trash', compact('storeManagers', 'stores'));
    }

    public function deliverise()
    {
        $deliveries = $this->authorization->authorizeDeliveriseIndexingTrash();
        if ($deliveries == 'unauthorized') { abort(401, 'Unauthorized'); }
        return view('dashboard.deliveries.trash', compact('deliveries'));
    }

    public function products()
    {
        $models = $this->authorization->authorizeProductIndexingTrash();
        if ($models == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        $sizes = $models['sizes'];
        $colors = $models['colors'];
        $stores = $models['stores'];
        $categories = $models['categories'];
        $sub_categories = $models['sub_categories'];
        $products = $models['products'];
        return view('dashboard.stores.products.trash',  compact('products', 'colors', 'sizes', 'stores','categories', 'sub_categories'));
    }

    public function sizes()
    {
        $sizes = $this->authorization->authorizeSizeIndexingTrash();
        if ($sizes == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        return view('dashboard.stores.products.sizes.trash', compact('sizes'));
    }

    public function colors()
    {
        $colors = $this->authorization->authorizeColorIndexingTrash();
        if ($colors == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        return view('dashboard.stores.products.colors.trash', compact('colors'));
    }

    public function categories()
    {
        $categories = $this->authorization->authorizeCategoryIndexingTrash();
        if ($categories == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        return view('dashboard.stores.categories.trash', compact('categories'));
    }

    public function subCategories()
    {
        $sub_categories = $this->authorization->authorizeSubCategoryIndexingTrash();
        if ($sub_categories == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        return view('dashboard.stores.sub-categories.trash', compact('sub_categories'));
    }

    // public function offers()
    // {
    //     $offers = $this->authorization->authorizeOfferIndexingTrash();
    //     if($offers == 'unauthorized'){ abort(401, 'Unauthorized');}
    //     return view('dashboard.stores.products.sizes.trash', compact('sizes'));
    // }

    public function sliderOffers()
    {
        $slider_offers = $this->authorization->authorizeSliderOfferIndexingTrash();
        if ($slider_offers == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        return view('dashboard.slider-offers.trash', compact('slider_offers'));
    }

    public function areas()
    {
        $areas = $this->authorization->authorizeAreaIndexingTrash();
        if ($areas == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        return view('dashboard.areas.trash', compact('areas'));
    }

    public function orders($status)
    {
        $orders = $this->authorization->authorizeOrderIndexingTrash($status);
        if ($orders == 'unauthorized') {
            abort(401, 'Unauthorized');
        }
        return view('dashboard.orders.trash', compact('orders'));
    }
}

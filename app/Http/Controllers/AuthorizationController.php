<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Store;
use App\Models\StoreManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthorizationController extends Controller
{
    protected $models;
    protected $request;

    public function __construct(ModelsController $models, Request $request)
    {
        $this->models = $models;
        $this->request = $request;
    }

    public function authorizeAdminIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Admins') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->admin()::all()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $this->models->admin()::all()->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  admins of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Admins') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->admin()::all()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $this->models->admin()::all()->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  admins of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeStoresIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('Stores') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all()->paginate(10);
                    $array['super_store_managers'] = $this->models->storeManager()::where('role', 'supermanager')->get();
                    $array['deliveries'] = $this->models->delivery()::all();
                    $array['delivery_times'] = $this->models->deliveryTime()::all();
                    return $array;
                }

                if ($admin->role == "admin") {
                    $array = [];
                    $array['stores'] = $admin->stores->paginate(10);
                    $array['super_store_managers'] = $admin->storeManagers()->where('role', 'supermanager')->get();
                    $array['deliveries'] = $admin->deliveries;
                    $array['delivery_times'] = $admin->deliveryTimes;
                    return $array;
                }
            } else {
                dd('Admin Not Found, Function  stores of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Stores') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all()->paginate(10);
                    $array['super_store_managers'] = $this->models->storeManager()::where('role', 'supermanager')->get();
                    $array['deliveries'] = $this->models->delivery()::all();
                    $array['delivery_times'] = $this->models->deliveryTime()::all();
                    return $array;
                }

                if ($manager->role == "manager") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all()->paginate(10);
                    $array['super_store_managers'] = $this->models->storeManager()::where('role', 'supermanager')->get();
                    $array['deliveries'] = $this->models->delivery()::all();
                    $array['delivery_times'] = $this->models->deliveryTime()::all();
                    return $array;
                }
            } else {
                dd('Manager Not Found, Function  stores of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeCategoriesIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('Categories') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->category()::all()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->categories->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  categories of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {

            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Categories') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->category()::all()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $manager->categories->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  categories of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeSubCategoriesIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('SubCategories') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->subCategory()::all()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->subCategories->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  subCategories of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('SubCategories') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->subCategory()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $manager->subCategories->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  subCategories of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeUsersIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Users') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->user()::all()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->users->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  users of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Users') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->user()::all()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $this->models->user()::all()->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  users of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeStoreManagersIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('StoreManagers') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all();
                    $array['storeManagers'] = $this->models->storeManager()::all()->paginate(10);
                    return $array;
                }

                if ($admin->role == "admin") {
                    $array = [];
                    $array['stores'] = $admin->stores;
                    $array['storeManagers'] = $admin->storeManagers->paginate(10);
                    return $array;
                }
            } else {
                dd('Admin Not Found, Function  storeManagers of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('StoreManagers') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all();
                    $array['storeManagers'] = $this->models->storeManager()::all()->paginate(10);
                    return $array;
                }

                if ($manager->role == "manager") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all();
                    $array['storeManagers'] = $this->models->storeManager()::all()->paginate(10);
                    return $array;
                }
            } else {
                dd('Manager Not Found, Function  storeManagers of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeDeliveriseIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('Deliverise') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all();
                    $array['deliverise'] = $this->models->delivery()::all()->paginate(10);
                    $array['delivery_times'] = $this->models->deliveryTime()::all();
                    return $array;
                }

                if ($admin->role == "admin") {
                    $array = [];
                    $array['stores'] = $admin->stores;
                    $array['deliverise'] = $admin->deliverise->paginate(10);
                    $array['delivery_times'] = $admin->deliveryTimes;
                    return $array;
                }
            } else {
                dd('Admin Not Found, Function  deliverise of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Deliverise') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all();
                    $array['deliverise'] = $this->models->delivery()::all()->paginate(10);
                    $array['delivery_times'] = $this->models->deliveryTime()::all();
                    return $array;
                }

                if ($manager->role == "manager") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all();
                    $array['deliverise'] = $this->models->delivery()::all()->paginate(10);
                    $array['delivery_times'] = $this->models->deliveryTime()::all();
                    return $array;
                }
            } else {
                dd('Manager Not Found, Function  deliverise of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeProductsIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('Products') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    $array = [];
                    $array['sizes'] = $this->models->size()::all();
                    $array['colors'] = $this->models->color()::all();
                    $array['stores'] = $this->models->store()::all();
                    $array['categories'] = $this->models->category()::all();
                    $array['sub_categories'] = $this->models->subCategory()::all();
                    $array['products'] = $this->models->product()::all()->paginate(10);
                    return $array;
                }

                if ($admin->role == "admin") {
                    $array = [];
                    $array['sizes'] = $admin->sizes;
                    $array['colors'] = $admin->colors;
                    $array['stores'] = $admin->stores;
                    $array['categories'] = $admin->categories;
                    $array['sub_categories'] = $admin->subCategories;
                    $array['products'] = $admin->products->paginate(10);
                    // $this->models->product()::getAdminStoresProducts($array['stores'])->paginate(10);
                    return $array;
                }
            } else {
                dd('Admin Not Found, Function  products of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {

            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Products') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    $array = [];
                    $array['sizes'] = $this->models->size()::all();
                    $array['colors'] = $this->models->color()::all();
                    $array['stores'] = $this->models->store()::all();
                    $array['categories'] = $this->models->category()::all();
                    $array['sub_categories'] = $this->models->subCategory()::all();
                    $array['products'] = $manager->products->paginate(10);
                    return $array;
                }

                if ($manager->role == "manager") {
                    $array = [];
                    $array['sizes'] = $this->models->size()::all();
                    $array['colors'] = $this->models->color()::all();
                    $array['stores'] = $this->models->store()::all();
                    $array['categories'] = $this->models->category()::all();
                    $array['sub_categories'] = $this->models->subCategory()::all();
                    $array['products'] = $manager->products->paginate(10);
                    return $array;
                }
            } else {
                dd('Manager Not Found, Function  products of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeSizesIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('Sizes') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->size()::all()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->sizes->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  sizes of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Sizes') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->size()::all()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $this->models->size()::all()->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  sizes of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeColorsIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('Colors') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->color()::all()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->colors->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  colors of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Colors') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->color()::all()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $this->models->color()::all()->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  colors of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeOffersIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('Offers') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->offer()::all()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->offers->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  offers of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Offers') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->offer()::all()->paginate(10);
                }

                if ($manager->role == "manager") {
                    // return $manager->cate
                }
            } else {
                dd('Manager Not Found, Function  offers of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeSliderOffersIndex()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {

                if (!Gate::allows('SliderOffers') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->sliderOffer()::all()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->sliderOffers->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  sliderOffers of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('SliderOffers') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->sliderOffer()::all()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $this->models->sliderOffer()::all()->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  sliderOffers of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeAdminIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Admins') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->admin()::onlyTrashed()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $this->models->admin()::onlyTrashed()->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  admins of IndexingController', $admin);
            }
            return $admin;
        }
    }

    public function authorizeStoreIndexingTrash()
    {

        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Stores') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    $array = [];
                    $array['stores'] = $this->models->store()::onlyTrashed()->paginate(10);
                    $array['superStoreManagers'] = $this->models->storeManager()::onlyTrashed()->get();
                    return $array;
                }

                if ($admin->role == "admin") {
                    $array = [];
                    $array['stores'] = $admin->stores()->onlyTrashed()->paginate(10);
                    $array['superStoreManagers'] = $this->models->storeManager()::onlyTrashed()->get();
                    return $array;
                }
            } else {
                dd('Admin Not Found, Function  stores of IndexingController', $admin);
            }

            return $admin;
        }
    }

    public function authorizeUserIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Users') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->user()::onlyTrashed()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->users->onlyTrashed()->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  users of IndexingController', $admin);
            }
            return $admin;
        }
    }

    public function authorizeStoreManagerIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('StoreManagers') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    $array = [];
                    $array['stores'] = $this->models->store()::onlyTrashed()->paginate(10);
                    $array['storeManagers'] = $this->models->storeManager()::onlyTrashed()->get();
                    return $array;
                }

                if ($admin->role == "admin") {
                    $array = [];
                    $array['stores'] = $admin->stores()->onlyTrashed()->paginate(10);
                    $array['storeManagers'] = $admin->storeManagers()->onlyTrashed()->get();
                    return $array;
                }
            } else {
                dd('Admin Not Found, Function  storeManagers of IndexingController', $admin);
            }

            return $admin;
        }
    }

    public function authorizeDeliveriseIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Deliverise') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->delivery()::onlyTrashed()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->deliverise()->onlyTrashed()->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  deliverises of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Deliverise') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->delivery()::onlyTrashed()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $this->models->delivery()::onlyTrashed()->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  deliverises of IndexingController', $manager);
            }
            return $manager;
        }
    }


    public function authorizeProductIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Products') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    $array = [];
                    $array['sizes'] = $this->models->size()::all();
                    $array['colors'] = $this->models->color()::all();
                    $array['stores'] = $this->models->store()::all();
                    $array['categories'] = $this->models->category()::all();
                    $array['sub_categories'] = $this->models->subCategory()::all();
                    $array['products'] = $this->models->product()::onlyTrashed()->with(['colors', 'sizes'])->paginate(10);
                    return $array;
                }

                if ($admin->role == "admin") {
                    $array = [];
                    $array['sizes'] = $this->models->size()::all();
                    $array['colors'] = $this->models->color()::all();
                    $array['stores'] = $admin->stores()->all();
                    $array['categories'] = $this->models->category()::all();
                    $array['sub_categories'] = $this->models->subCategory()::all();
                    $array['products'] = $admin->products()->onlyTrashed()->with(['colors', 'sizes'])->paginate(10);
                    return $array;
                }
            } else {
                dd('Admin Not Found, Function  products of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = $this->models->storeManager()::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Products') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    $array = [];
                    $array['sizes'] = $this->models->size()::all();
                    $array['colors'] = $this->models->color()::all();
                    $array['stores'] = $this->models->store()::all();
                    $array['categories'] = $this->models->category()::all();
                    $array['sub_categories'] = $this->models->subCategory()::all();
                    $array['products'] = $this->models->product()::onlyTrashed()->with(['colors', 'sizes'])->paginate(10);
                    return $array;
                }

                if ($manager->role == "manager") {
                    $array = [];
                    $array['sizes'] = $this->models->size()::all();
                    $array['colors'] = $this->models->color()::all();
                    $array['stores'] = $this->models->store()::all();
                    $array['categories'] = $this->models->category()::all();
                    $array['sub_categories'] = $this->models->subCategory()::all();
                    $array['products'] = $manager->products()->onlyTrashed()->with(['colors', 'sizes'])->paginate(10);
                    return $array;
                }
            } else {
                dd('Manager Not Found, Function  products of IndexingController', $manager);
            }
            return $manager;
        }
    }

    public function authorizeSizeIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Sizes') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->size()::onlyTrashed()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->sizes()->onlyTrashed()->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  sizes of IndexingController', $admin);
            }
            return $admin;
        }
    }


    public function authorizeColorIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Colors') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->color()::onlyTrashed()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->colors()->onlyTrashed()->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  colors of IndexingController', $admin);
            }
            return $admin;
        }
    }

    #category

    public function authorizeCategoryIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('Categories') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->category()::onlyTrashed()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->categories()->onlyTrashed()->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  categories of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = StoreManager::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('Categories') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->category()::onlyTrashed()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $manager->categories()->onlyTrashed()->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  categories of IndexingController', $manager);
            }
            return $manager;
        }
    }

    #subcategory

    public function authorizeSubCategoryIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('SubCategories') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->subCategory()::onlyTrashed()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->subCategories()->onlyTrashed()->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  subCategories of IndexingController', $admin);
            }
            return $admin;
        }

        if (auth()->guard('manager')->check()) {
            $manager = StoreManager::find(auth()->guard('manager')->user()->id);

            if ($manager) {
                if (!Gate::allows('SubCategories') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {

                    return $this->models->subCategory()::onlyTrashed()->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $manager->subCategories()->onlyTrashed()->paginate(10);
                }
            } else {
                dd('Manager Not Found, Function  subCategories of IndexingController', $manager);
            }
            return $manager;
        }
    }

    // public function authorizeOfferIndexingTrash()
    // {
    //     if (auth()->guard('admin')->check()) {

    //         $admin = Admin::find(auth()->guard('admin')->user()->id);

    //         if ($admin) {
    //             if (!Gate::allows('Offers') || $admin->status == "inactive") {
    //                 return "unauthorized";
    //             }

    //             if ($admin->role == "superadmin") {
    //                 return $this->models->offer()::onlyTrashed()->paginate(10);
    //             }

    //             if ($admin->role == "admin") {
    //                 return $admin->offers()->onlyTrashed()->paginate(10);
    //             }
    //         } else {
    //             dd('Admin Not Found, Function  offers of IndexingController', $admin);
    //         }
    //         return $admin;
    //     }
    // }


    public function authorizeSliderOfferIndexingTrash()
    {
        if (auth()->guard('admin')->check()) {

            $admin = Admin::find(auth()->guard('admin')->user()->id);

            if ($admin) {
                if (!Gate::allows('SliderOffers') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->sliderOffer()::onlyTrashed()->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $admin->sliderOffers()->onlyTrashed()->paginate(10);
                }
            } else {
                dd('Admin Not Found, Function  sliderOffers of IndexingController', $admin);
            }
            return $admin;
        }
    }


    public function getAdmin()
    {
        return Admin::find(auth()->guard('admin')->id());
    }

    public function getManager()
    {
        return StoreManager::find(auth()->guard('manager')->id());
    }


    public function checkAdminsPermission($type, $page)
    {


        if ($type == "searching" && $page == "admins") {

            $admin = $this->getAdmin();

            if ($admin) {

                if (!Gate::allows('Admins') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $admins = $this->models->admin()::filters($this->request->all())->paginate(10);
                } elseif ($admin->role == "admin") {
                    return $admins = $this->models->admin()::filters($this->request->all())->paginate(10);
                }
            }
        }
    }

    public function checkStoresPermission($type, $page)
    {
        if ($type == "searching" && $page == "stores") {

            $admin = $this->getAdmin();
            $manager = $this->getManager();

            if ($admin) {

                if (!Gate::allows('Stores') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->store()::with('storeManagers')->filters($this->request->all())->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $this->models->store()::with('storeManagers')->filters($this->request->all())->paginate(10);
                }
            }
        }
    }

    #delviery permissions

    public function checkDelvieriesPermission($type, $page)
    {
        if ($type == "searching" && $page == "deliveries") {

            $admin = $this->getAdmin();

            $manager = $this->getManager();

            if ($admin) {

                if (!Gate::allows('Deliverise') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all();
                    $array['deliveries'] = $this->models->delivery()::with('stores')->filters($this->request->all())->paginate(10);
                    return $array;
                }

                if ($admin->role == "admin") {
                    $array = [];
                    $array['stores'] = $admin->stores;
                    $array['deliveries'] = $this->models->delivery()::with('stores')->filters($this->request->all())->paginate(10);
                    return $array;
                }
            }

            if ($manager) {

                if (!Gate::allows('Deliverise') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all();
                    $array['deliveries'] = $this->models->delivery()::with('stores')->filters($this->request->all())->paginate(10);
                    return $array;
                }

                if ($manager->role == "manager") {
                    $array = [];
                    $array['stores'] = $this->models->store()::all();
                    $array['deliveries'] = $this->models->delivery()::with('stores')->filters($this->request->all())->paginate(10);
                    return $array;
                }
            }
        }
    }

    public function checkOrdersPermission($type, $page)
    {
        if ($type == "searching" && $page == "orders") {

            $admin = $this->getAdmin();
            $manager = $this->getManager();

            if ($admin) {

                if (!Gate::allows('Orders') || $admin->status == "inactive") {
                    return "unauthorized";
                }

                if ($admin->role == "superadmin") {
                    return $this->models->orders()::filters($this->request->all())->paginate(10);
                }

                if ($admin->role == "admin") {
                    return $this->models->orders()::filters($this->request->all())->paginate(10);
                }
            }

            if ($manager) {

                if (!Gate::allows('Orders') || $manager->status == "inactive") {
                    return "unauthorized";
                }

                if ($manager->role == "supermanager") {
                    return $this->models->orders()::filters($this->request->all())->paginate(10);
                }

                if ($manager->role == "manager") {
                    return $this->models->orders()::filters($this->request->all())->paginate(10);
                }
            }
        }
    }

























    public function checkUsersPermission()
    {
        $admin = $this->getAdmin();

        if ($admin) {

            if (!Gate::allows('Users') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->user()::filters($this->request->all())->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->user()::filters($this->request->all())->paginate(10);
            }
        }
    }

    public function checkStoreManagersPermission()
    {
        $admin = $this->getAdmin();

        if ($admin) {

            if (!Gate::allows('StoreManagers') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                $array = [];
                $array['stores'] = $this->models->store()::all();
                $array['storeManagers'] = $this->models->storeManager()::with('store')->filters($this->request->all())->paginate(10);
                return $array;
            }

            if ($admin->role == "admin") {
                $array = [];
                $array['stores'] = $admin->stores;
                $array['storeManagers'] = $this->models->storeManager()::with('store')->filters($this->request->all())->paginate(10);
                return $array;
            }
        }
    }

    public function checkProductsPermission()
    {
        $admin = $this->getAdmin();
        $manager = $this->getManager();

        if ($admin) {

            if (!Gate::allows('Products') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                $array = [];
                $array['sizes'] = $this->models->size()::all();
                $array['stores'] = $this->models->store()::all();
                $array['colors'] = $this->models->color()::all();
                $array['categories'] = $this->models->category()::all();
                $array['sub_categories'] = $this->models->subCategory()::all();
                $array['products'] = $this->models->product()::with('store')->filters($this->request->all())->paginate(10);
                return $array;
            }

            if ($admin->role == "admin") {
                $array = [];
                $array['sizes'] = $this->models->size()::all();
                $array['stores'] = $admin->stores;
                $array['colors'] = $this->models->color()::all();
                $array['categories'] = $this->models->category()::all();
                $array['sub_categories'] = $this->models->subCategory()::all();
                $array['products'] = $this->models->product()::with('store')->filters($this->request->all())->paginate(10);
                return $array;
            }
        }

        if ($manager) {

            if (!Gate::allows('Products') || $manager->status == "inactive") {
                return "unauthorized";
            }

            if ($manager->role == "supermanager") {
                $array = [];
                $array['sizes'] = $this->models->size()::all();
                $array['stores'] = $this->models->store()::all();
                $array['colors'] = $this->models->color()::all();
                $array['categories'] = $this->models->category()::all();
                $array['sub_categories'] = $this->models->subCategory()::all();
                $array['products'] = $this->models->product()::with('store')->filters($this->request->all())->paginate(10);
                return $array;
            }

            if ($manager->role == "manager") {
                $array = [];
                $array['sizes'] = $this->models->size()::all();
                $array['stores'] = $this->models->store()::all();
                $array['colors'] = $this->models->color()::all();
                $array['categories'] = $this->models->category()::all();
                $array['sub_categories'] = $this->models->subCategory()::all();
                $array['products'] = $this->models->product()::with('store')->filters($this->request->all())->paginate(10);
                return $array;
            }
        }
    }

    public function authorizeAreasIndex()
    {
        $admin = $this->getAdmin();
        // $manager = $this->getManager();

        if ($admin) {

            if (!Gate::allows('DeliveryAreas') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->area()::all()->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->area()::all()->paginate(10);
            }
        }
    }

    public function authorizeAreaIndexingTrash()
    {
        $admin = $this->getAdmin();
        // $manager = $this->getManager();

        if ($admin) {

            if (!Gate::allows('DeliveryAreas') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->area()::onlyTrashed()->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->area()::onlyTrashed()->paginate(10);
            }
        }
    }

    public function authorizeDeliveryTimesIndex()
    {
        $admin = $this->getAdmin();
        $manager = $this->getManager();

        if ($admin) {

            if (!Gate::allows('DeliveryTimes') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->deliveryTime()::all()->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->deliveryTime()::all()->paginate(10);
            }
        }

        if ($manager) {

            if (!Gate::allows('DeliveryTimes') || $manager->status == "inactive") {
                return "unauthorized";
            }

            if ($manager->role == "supermanager") {
                return $this->models->deliveryTime()::all()->paginate(10);
            }

            if ($manager->role == "manager") {
                return $this->models->deliveryTime()::all()->paginate(10);
            }
        }
    }

    public function authorizeContactUsIndex()
    {
        $admin = $this->getAdmin();

        if ($admin) {

            if (!Gate::allows('ContactUs') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->contactUs()::all()->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->contactUs()::all()->paginate(10);
            }
        }
    }

    public function authorizeCustomerServiceIndex()
    {
        $admin = $this->getAdmin();

        if ($admin) {

            if (!Gate::allows('CustomersService') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->customersService()::all()->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->customersService()::all()->paginate(10);
            }
        }
    }

    public function authorizeNotificationsIndex()
    {
        $admin = $this->getAdmin();

        if ($admin) {

            if (!Gate::allows('Notifications') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->user()::all();
            }

            if ($admin->role == "admin") {
                return $this->models->user()::all();
            }
        }
    }

    public function authorizeStaticPagesIndex()
    {
        $admin = $this->getAdmin();

        if ($admin) {

            if (!Gate::allows('StaticPages') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->staticPage()::all()->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->staticPage()::all()->paginate(10);
            }
        }
    }

    public function authorizeSettingsIndex(){
        $admin = $this->getAdmin();

        if ($admin) {

            if (!Gate::allows('Settings') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->settings()::all();
            }

            if ($admin->role == "admin") {
                return $this->models->settings()::all();
            }
        }
    }

    public function authorizeOrdersIndex($status = 'new')
    {
        $admin = $this->getAdmin();
        $manager = $this->getManager();

        if ($admin) {

            if (!(Gate::allows('NewOrders') || Gate::allows('WatingOrders')) || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->orders()::where('status', $status)->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->orders()::where('status', $status)->paginate(10);
            }
        }

        if ($manager) {

            if (!(Gate::allows('NewOrders') || Gate::allows('WatingOrders'))|| $manager->status == "inactive") {
                return "unauthorized";
            }

            if ($manager->role == "supermanager") {
                return $this->models->orders()::where('status', $status)->paginate(10);
            }

            if ($manager->role == "manager") {
                return $this->models->orders()::where('status', $status)->paginate(10);
            }
        }
    }

    public function authorizeOrderIndexingTrash($status = 'new')
    {
        $admin = $this->getAdmin();
        $manager = $this->getManager();

        if ($admin) {

            if (!(Gate::allows('NewOrders') || Gate::allows('WatingOrders')) || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->orders()::onlyTrashed()->where('status', $status)->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->orders()::onlyTrashed()->where('status', $status)->paginate(10);
            }
        }

        if ($manager) {

            if (!(Gate::allows('NewOrders') || Gate::allows('WatingOrders') ) || $manager->status == "inactive") {
                return "unauthorized";
            }

            if ($manager->role == "supermanager") {
                return $this->models->orders()::onlyTrashed()->where('status', $status)->paginate(10);
            }

            if ($manager->role == "manager") {
                return $this->models->orders()::onlyTrashed()->where('status', $status)->paginate(10);
            }
        }
    }

    public function authorizePointsProgramIndex()
    {
        $admin = $this->getAdmin();
        $manager = $this->getManager();

        if ($admin) {

            if (!Gate::allows('PointsProgram') || $admin->status == "inactive") {
                return "unauthorized";
            }

            if ($admin->role == "superadmin") {
                return $this->models->PointsProgram()::all()->paginate(10);
            }

            if ($admin->role == "admin") {
                return $this->models->PointsProgram()::all()->paginate(10);
            }
        }

        if ($manager) {

            if (!Gate::allows('PointsProgram') || $manager->status == "inactive") {
                return "unauthorized";
            }

            if ($manager->role == "supermanager") {
                return $this->models->PointsProgram()::all()->paginate(10);
            }

            if ($manager->role == "manager") {
                return $this->models->PointsProgram()::all()->paginate(10);
            }
        }
    }


}

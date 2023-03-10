<?php

namespace App\Http\Controllers\ActionsControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ModelsController;
use App\Models\Admin;
use App\Models\Area;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\Size;
use App\Models\SliderOffer;
use App\Models\Store;
use App\Models\StoreManager;
use App\Models\SubCategory;
use App\Models\SuperStoreManager;
use App\Models\User;
use Illuminate\Http\Request;

class DestoryingController extends Controller
{
    protected $models;
    protected $request;

    public function __construct(ModelsController $models, Request $request)
    {
        (request()->is('manager/*')) ? $this->middleware('auth:manager') : $this->middleware('auth:admin');
        $this->models = $models;
        $this->request = $request;
    }

    public function admin(Admin $admin)
    {
        $this->models->adminController()->destroy($admin);
        return redirect()->route('admin.admins.index')->with('success',  "تم حذف الادمن $admin->name بنجاح");
    }

    public function store(Store $store)
    {
        $this->models->storeController()->destroy($store);
        return redirect()->route('admin.stores.index')->with('success',  "تم حذف متجر $store->ar_name بنجاح");
    }

    public function user(User $user)
    {
        $this->models->userController()->destroy($user);
        return redirect()->route('admin.users.index')->with('success',  "تم حذف متجر $user->name بنجاح");
    }

    public function storeManager(StoreManager $store_manager)
    {
        $this->models->storeManagerController()->destroy($store_manager);
        return redirect()->back()->with('success', 'تم حذف مدير متجر بنجاح');
    }

    public function delivery(Delivery $delivery)
    {
        $this->models->deliveryController()->destroy($delivery);
        return redirect()->back()->with('success', 'تم حذف مدير عام متجر بنجاح');
    }

    public function product(Product $product)
    {
        $this->models->productController()->destroy($product);
        return redirect()->back()->with('success', 'تم حذف مدير عام متجر بنجاح');
    }

    public function category(Category $category)
    {
        $this->models->categoryController()->destroy($category);
        return redirect()->back()->with('success', 'تم حذف مدير عام متجر بنجاح');
    }

    public function subCategory(SubCategory $subCategory)
    {
        $this->models->subCategoryController()->destroy($subCategory);
        return redirect()->back()->with('success', 'تم حذف مدير عام متجر بنجاح');
    }

    public function attr(Attribute $attribute)
    {
        $this->models->attrController()->destroy($attribute);
        return redirect()->back()->with('success', 'تم حذف مدير عام متجر بنجاح');
    }

    public function color(Color $color)
    {
        $this->models->colorController()->destroy($color);
        return redirect()->back()->with('success', 'تم حذف مدير عام متجر بنجاح');
    }

    public function size(Size $size)
    {
        $this->models->sizeController()->destroy($size);
        return redirect()->back()->with('success', 'تم حذف مدير عام متجر بنجاح');
    }

    public function sliderOffer(SliderOffer $sliderOffer)
    {
        $this->models->sliderOfferController()->destroy($sliderOffer);
        return redirect()->back()->with('success', 'تم حذف مدير عام متجر بنجاح');
    }

    public function area(Area $area)
    {
        $this->models->areaController()->destroy($area);
        return redirect()->back()->with('success', 'تم حذف مدير عام متجر بنجاح');
    }
}

<?php

namespace App\Http\Controllers\ActionsControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ModelsController;
use App\Models\Admin;
use Illuminate\Http\Request;

class RestoringController extends Controller
{
    protected $models;

    public function __construct(ModelsController $models)
    {
        $this->models = $models;
    }

    public function admin($id)
    {
        $admin = $this->models->adminController()->restore($id);
        return redirect()->back()->with('admin', "لقد تم استعادة الادمن $admin->name بنجاح");
    }

    public function user($id)
    {
        $user = $this->models->userController()->restore($id);
        return redirect()->back()->with('user', "لقد تم استعادة المستخدم $user->name بنجاح");
    }

    public function delivery($id)
    {
        $delivery = $this->models->deliveryController()->restore($id);
        return redirect()->back()->with('delivery', "لقد تم استعادة الادمن $delivery->name بنجاح");
    }

    public function storeManager($id)
    {
        $store_manager = $this->models->storeManagerController()->restore($id);
        return redirect()->back()->with('storeManager', "لقد تم استعادة الادمن الفرعي $store_manager->name بنجاح");
    }

    public function store($id)
    {
        $store = $this->models->storeController()->restore($id);
        return redirect()->back()->with('store', "لقد تم استعادة المتجر $store->name بنجاح");
    }

    public function product($id)
    {
        $product = $this->models->productController()->restore($id);
        return redirect()->back()->with('product', "لقد تم استعادة المنتج $product->name بنجاح");
    }

    public function category($id)
    {
        $category = $this->models->categoryController()->restore($id);
        return redirect()->back()->with('category', "لقد تم استعادة الفئة $category->name بنجاح");
    }

    public function subCategory($id)
    {
        $sub_category = $this->models->subCategoryController()->restore($id);
        return redirect()->back()->with('subCategory', "لقد تم استعادة الفئة الفرعية $sub_category->name بنجاح");
    }

    public function attr($id)
    {
        $attr = $this->models->attrController()->restore($id);
        return redirect()->back()->with('attr', "لقد تم استعادة الادمن $attr->name بنجاح");
    }

    public function color($id)
    {
        $color = $this->models->colorController()->restore($id);
        return redirect()->back()->with('color', "لقد تم استعادة الادمن $color->name بنجاح");
    }

    public function size($id)
    {
        $size = $this->models->sizeController()->restore($id);
        return redirect()->back()->with('size', "لقد تم استعادة الادمن $size->name بنجاح");
    }

    public function sliderOffer($id)
    {
        $size = $this->models->sliderOfferController()->restore($id);
        return redirect()->back()->with('size', "لقد تم استعادة الادمن $size->name بنجاح");
    }

    public function area($id)
    {
        $area = $this->models->areaController()->restore($id);
        return redirect()->back()->with('area', "لقد تم استعادة المنطقة بنجاح");
    }
}

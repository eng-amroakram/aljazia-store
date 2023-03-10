<?php

namespace App\Http\Controllers\ActionsControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ModelsController;
use App\Models\Admin;
use Illuminate\Http\Request;

class ForceDeletingController extends Controller
{

    protected $models;

    public function __construct(ModelsController $models)
    {
        $this->models = $models;
    }

    public function admin($id)
    {
        $this->models->adminController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الادمن بنجاح");
    }

    public function user($id)
    {
        $this->models->userController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الادمن بنجاح");
    }

    public function delivery($id)
    {
        $this->models->deliveryController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الادمن بنجاح");
    }

    public function store($id)
    {
        $this->models->storeController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الادمن بنجاح");
    }

    public function storeManager($id)
    {
        $this->models->storeManagerController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الادمن بنجاح");
    }

    public function product($id)
    {
        $this->models->productController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الادمن بنجاح");
    }

    public function category($id)
    {
        $this->models->categoryController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الادمن بنجاح");
    }

    public function subCategory($id)
    {
        $this->models->subCategoryController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الادمن بنجاح");
    }

    public function color($id)
    {
        $this->models->colorController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف اللون بنجاح");
    }

    public function size($id)
    {
        $this->models->sizeController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الحجم بنجاح");
    }

    public function sliderOffer($id)
    {
        $this->models->sliderOfferController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الحجم بنجاح");
    }

    public function area($id)
    {
        $this->models->areaController()->forceDelete($id);
        return redirect()->back()->with('admin', "لقد تم حذف الحجم بنجاح");
    }
}

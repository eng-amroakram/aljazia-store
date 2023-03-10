<?php

namespace App\Http\Controllers;
#Controllers

use App\Http\Controllers\ModelsControllers\AdminController;
use App\Http\Controllers\ModelsControllers\AreaController;
use App\Http\Controllers\ModelsControllers\StoreController;
use App\Http\Controllers\ModelsControllers\StoreManagerController;
use App\Http\Controllers\ModelsControllers\DeliveryController;
use App\Http\Controllers\ModelsControllers\UserController;
use App\Http\Controllers\ModelsControllers\ProductController;
use App\Http\Controllers\ModelsControllers\AttributeController;
use App\Http\Controllers\ModelsControllers\CategoryController;
use App\Http\Controllers\ModelsControllers\SubCategoryController;
use App\Http\Controllers\ModelsControllers\SizeController;
use App\Http\Controllers\ModelsControllers\ColorController;
use App\Http\Controllers\ModelsControllers\DeliveryTimeController;
use App\Http\Controllers\ModelsControllers\NotificationController;
use App\Http\Controllers\ModelsControllers\OrderController;
use App\Http\Controllers\ModelsControllers\PointsProgramController;
use App\Http\Controllers\ModelsControllers\SettingsController;
use App\Http\Controllers\ModelsControllers\SliderOfferController;
use App\Http\Controllers\ModelsControllers\StaticPageController;
use App\Http\Controllers\RolesControllers\RoleController;
#Models
use App\Models\Admin;
use App\Models\Area;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\ContactUs;
use App\Models\CustomersService;
use App\Models\Delivery;
use App\Models\DeliveryTime;
use App\Models\Notification;
use App\Models\Offer;
use App\Models\Order;
use App\Models\PointsProgram;
use App\Models\Product;
use App\Models\Role;
use App\Models\Settings;
use App\Models\Size;
use App\Models\SliderOffer;
use App\Models\StaticPage;
use App\Models\Store;
use App\Models\StoreManager;
use App\Models\SubCategory;
use App\Models\User;

class ModelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    #Models
    public function admin()
    {
        return new Admin();
    }

    public function store()
    {
        return new Store();
    }

    public function storeManager()
    {
        return new StoreManager();
    }

    public function delivery()
    {
        return new Delivery();
    }

    public function user()
    {
        return new User();
    }

    public function product()
    {
        return new Product();
    }

    public function attr()
    {
        return new Attribute();
    }

    public function category()
    {
        return new Category();
    }

    public function subCategory()
    {
        return new SubCategory();
    }

    public function size()
    {
        return new Size();
    }

    public function color()
    {
        return new Color();
    }

    public function offer()
    {
        return new Offer();
    }

    public function sliderOffer()
    {
        return new SliderOffer();
    }

    public function roles()
    {
        return new Role();
    }

    public function area()
    {
        return new Area();
    }

    public function deliveryTime()
    {
        return new DeliveryTime();
    }

    public function contactUs()
    {
        return new ContactUs();
    }

    public function customersService()
    {
        return new CustomersService();
    }

    public function notification()
    {
        return new Notification();
    }

    public function staticPage()
    {
        return new StaticPage();
    }

    public function settings()
    {
        return new Settings();
    }

    public function orders()
    {
        return new Order();
    }

    public function PointsProgram()
    {
        return new PointsProgram();
    }

    #Controllers
    public function adminController()
    {
        return new AdminController();
    }

    public function storeController()
    {
        return new StoreController();
    }

    public function storeManagerController()
    {
        return new StoreManagerController();
    }

    public function deliveryController()
    {
        return new DeliveryController();
    }

    public function userController()
    {
        return new UserController();
    }

    public function productController()
    {
        return new ProductController();
    }

    public function attrController()
    {
        return new AttributeController();
    }

    public function categoryController()
    {
        return new CategoryController();
    }

    public function subCategoryController()
    {
        return new SubCategoryController();
    }

    public function sizeController()
    {
        return new SizeController();
    }

    public function colorController()
    {
        return new ColorController();
    }

    public function sliderOfferController()
    {
        return new SliderOfferController();
    }

    public function rolesController()
    {
        return new RoleController();
    }

    public function areaController()
    {
        return new AreaController();
    }

    public function deliveryTimeController()
    {
        return new DeliveryTimeController();
    }

    public function notificationController()
    {
        return new NotificationController();
    }

    public function staticPageController()
    {
        return new StaticPageController();
    }

    public function settingsController()
    {
        return new SettingsController();
    }

    public function orderController()
    {
        return new OrderController();
    }

    public function pointsProgramController()
    {
        return new PointsProgramController();
    }
}

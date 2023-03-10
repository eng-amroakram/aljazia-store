<?php

namespace App\Http\Controllers\ActionsControllers;


#Requests
use App\Http\Controllers\Controller;
use App\Http\Controllers\ModelsController;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\StoreDeliveryTimeRequest;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\StorePointsProgramRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\StoreSliderOffersRequest;
use App\Http\Requests\StoreStaticPageRequest;
use App\Http\Requests\StoreStoreManagerRequest;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\StoreUserRequest;

#Checking Traits
use App\Traits\Checking;
use Illuminate\Http\Request;

class StoringController extends Controller
{
    protected $models;

    use Checking;

    public function __construct(ModelsController $models)
    {
        (request()->is('manager/*')) ? $this->middleware('auth:manager') : $this->middleware('auth:admin');
        $this->models = $models;
    }

    public function admin(StoreAdminRequest $request)
    {
        dd($request, 'storing admin');
    }

    public function store(StoreStoreRequest $request)
    {
        $store = $this->models->storeController()->store($request);
        return redirect()->back()->with('success', 'Store Created Successfully');
    }

    public function user(StoreUserRequest $request)
    {
        $user = $this->models->userController()->store($request);
        return redirect()->back()->with('success', 'User Created Successfully');
    }

    public function storeManager(StoreStoreManagerRequest $request)
    {
        $this->models->storeManagerController()->store($request);
        return redirect()->back()->with('success', 'Store Manager Created Successfully');
    }

    public function delivery(StoreDeliveryRequest $request, StoreUserRequest $request_user )
    {
        $user = $this->models->userController()->store($request_user);
        $delivery = $this->models->deliveryController()->store($request, $user);
        return redirect()->back()->with('success', 'Delivery Created Successfully');
    }

    public function product(StoreProductRequest $request)
    {
        $product_model = $this->models->product()->getProduct($request->ar_name, $request->en_name);

        if (!$product_model) {
            $product = $this->models->productController()->store($request);
            return redirect()->back()->with('success', 'Product Created Successfully');
        }

        return redirect()->back()->with('error', 'Product Already Exists');
    }

    public function category(StoreCategoryRequest $request)
    {
        $category = $this->models->categoryController()->store($request);
        return redirect()->back()->with('success', 'Category Created Successfully');
    }

    public function subCategory(StoreSubCategoryRequest $request)
    {
        $subCategory = $this->models->subCategoryController()->store($request);
        return redirect()->back()->with('success', 'Sub Category Created Successfully');
    }

    public function color(StoreColorRequest $request)
    {
        $color = $this->models->colorController()->store($request);
        return redirect()->back()->with('success', 'Color Created Successfully');
    }

    public function size(StoreSizeRequest $request)
    {
        $size = $this->models->sizeController()->store($request);
        return redirect()->back()->with('success', 'Size Created Successfully');
    }

    public function attr(StoreAttributeRequest $request)
    {
        $this->models->attrController()->store($request);
        return redirect()->back()->with('success', 'Attribute Created Successfully');
    }

    public function sliderOffer(StoreSliderOffersRequest $request)
    {
        $this->models->sliderOfferController()->store($request);
        return redirect()->back()->with('success', 'Slider Offer Created Successfully');
    }

    public function area(StoreAreaRequest $request)
    {
        $this->models->areaController()->store($request);
        return redirect()->back()->with('success', 'Area Created Successfully');
    }

    public function map(Request $request)
    {
        $area = $this->models->areaController()->map($request);
        return redirect()->route('admin.maps.index', $area)->with('success', 'Map Created Successfully');
    }

    public function deliveryTime(StoreDeliveryTimeRequest $request)
    {
        $deliveryTime = $this->models->deliveryTimeController()->store($request);
        return redirect()->back()->with('success', 'Delivery Time Created Successfully');
    }

    public function notification(StoreNotificationRequest $request)
    {
        $this->models->notificationController()->store($request);
        return redirect()->back()->with('success', 'Notification Created Successfully');
    }

    public function notificationsCollection(StoreNotificationRequest $request)
    {
        $notifications = $this->models->notificationController()->notificationsCollection($request);
        return redirect()->back()->with('success', 'Notification Created Successfully');
    }

    public function staticPage(StoreStaticPageRequest $request)
    {
        $this->models->staticPageController()->store($request);
        return redirect()->back()->with('success', 'Static Page Created Successfully');
    }

    public function PointsProgram(StorePointsProgramRequest $request)
    {
        $this->models->pointsProgramController()->store($request);
        return redirect()->back()->with('success', 'Points Program Created Successfully');
    }

}

<?php

namespace App\Http\Controllers\ActionsControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ModelsController;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Http\Requests\UpdateDeliveryTimeRequest;
use App\Http\Requests\UpdatePointsProgramRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateSettingsRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Http\Requests\UpdateSliderOffersRequest;
use App\Http\Requests\UpdateStaticPageRequest;
use App\Http\Requests\UpdateStoreManagerRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Admin;
use App\Models\Area;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Delivery;
use App\Models\DeliveryTime;
use App\Models\Order;
use App\Models\PointsProgram;
use App\Models\Product;
use App\Models\Settings;
use App\Models\Size;
use App\Models\SliderOffer;
use App\Models\StaticPage;
use App\Models\Store;
use App\Models\StoreManager;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\WalletHistory;
use Illuminate\Http\Request;

class UpdatingController extends Controller
{
    protected $models;
    protected $request;

    public function __construct(ModelsController $models, Request $request)
    {
        (request()->is('manager/*')) ? $this->middleware('auth:manager') : $this->middleware('auth:admin');
        $this->models = $models;
        $this->request = $request;
    }

    public function admin(UpdateAdminRequest $request, Admin $admin)
    {
        $admin = $this->models->adminController()->update($request, $admin);
        return redirect()->route('admin.admins.index');
    }

    public function store(UpdateStoreRequest $request, Store $store)
    {
        $store = $this->models->storeController()->update($request, $store);
        return redirect()->route('admin.stores.index');
    }

    public function user(UpdateUserRequest $request, User $user)
    {
        $user = $this->models->userController()->update($request, $user);
        return redirect()->route('admin.users.index');
    }

    public function storeManager(UpdateStoreManagerRequest $request,  StoreManager $storeManager)
    {
        $store_manager = $this->models->storeManagerController()->update($request, $storeManager);
        return redirect()->back()->with('success', 'Store Manager Updated Successfully');
    }

    public function delivery(UpdateDeliveryRequest $request, Delivery $delivery)
    {
        $this->models->deliveryController()->update($request, $delivery);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function product(UpdateProductRequest $request, Product $product)
    {
        $this->models->productController()->update($request, $product);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function category(UpdateCategoryRequest $request, Category $category)
    {
        $this->models->categoryController()->update($request, $category);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function subCategory(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $this->models->subCategoryController()->update($request, $subCategory);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public  function size(UpdateSizeRequest $request, Size $size)
    {
        $this->models->sizeController()->update($request, $size);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public  function color(UpdateColorRequest $request, Color $color)
    {
        $this->models->colorController()->update($request, $color);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public  function attr(UpdateAttributeRequest $request, Attribute $attr)
    {
        $this->models->attrController()->update($request, $attr);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function sliderOffer(UpdateSliderOffersRequest $request, SliderOffer $sliderOffer)
    {
        $this->models->sliderOfferController()->update($request, $sliderOffer);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function area(UpdateAreaRequest $request, Area $area)
    {
        $this->models->areaController()->update($request, $area);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function deliveryTimes(UpdateDeliveryTimeRequest $request, DeliveryTime $deliveryTime)
    {
        $this->models->deliveryTimeController()->update($request, $deliveryTime);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function staticPage(UpdateStaticPageRequest $request, StaticPage $staticPage)
    {
        $this->models->staticPageController()->update($request, $staticPage);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function settings(UpdateSettingsRequest $request, Settings $settings)
    {
        $this->models->settingsController()->update($request, $settings);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function changeOrderStatus(Order $order, $status, $who_is)
    {
        $this->models->orderController()->changeStatus($order, $status, $who_is);
        return redirect()->back()->with('success', 'Order Status Updated Successfully');
    }

    public function adminRoles(Request $request, Admin $admin, StoreRoleRequest $request_roles)
    {
        // $this->models->rolesController()->store($request_roles);
        // dd(20, 'Roles');

        $this->models->adminController()->updateRoles($request, $admin);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function storeManagerRoles(Request $request, StoreManager $storeManager, StoreRoleRequest $request_roles)
    {
        // $this->models->rolesController()->store($request_roles);
        // dd(20, 'Roles');
        $this->models->storeManagerController()->updateRoles($request, $storeManager);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function PointsProgram(UpdatePointsProgramRequest $request, PointsProgram $pointProgram)
    {
        $points_program = $this->models->pointsProgramController()->update($request, $pointProgram);
        return redirect()->back()->with('success', 'Super Store Manager Updated Successfully');
    }

    public function userWallet(User $user)
    {
        $wallet = $user->wallet;

        if (request()->type == 'deposit') {
            $wallet->balance = $wallet->balance + request()->amount;
            $wallet->total_deposit = $wallet->total_deposit + request()->amount;
            $wallet->save();

            WalletHistory::create([
                'wallet_id' => $wallet->id,
                'amount' => request()->amount,
                'type' => 'deposit',
            ]);

            return redirect()->back()->with('success', 'Deposit Successfully');

        } elseif (request()->type == 'withdrawal') {

            if (request()->amount <= $wallet->balance) {
                $wallet->balance = $wallet->balance - request()->amount;
                $wallet->total_withdraw = $wallet->total_withdraw + request()->amount;
                $wallet->save();

                WalletHistory::create([
                    'wallet_id' => $wallet->id,
                    'amount' => request()->amount,
                    'type' => 'withdrawal',
                ]);

                return redirect()->back()->with('success', 'Withdrawal Successfully');
            } else {
                return redirect()->back()->with('error', 'Insufficient Balance');
            }
        }
    }
}

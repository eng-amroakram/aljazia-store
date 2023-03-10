<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use stdClass;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $sub_category_model = new SubCategory();

        $sub_category =  $sub_category_model->getSubCategory($request->sub_category);

        $category =  Category::find($request->category_id);

        if (!$sub_category) {
            return SubCategory::create([
                'store_manager_id' => auth()->guard('manager')->id(),
                'admin_id' => (!auth()->guard('admin')->id()) ? auth()->guard('manager')->user()->admin->id : auth()->guard('admin')->id(),
                'store_id' => $category->store ? $category->store->id : null,
                'category_id' => $category->id,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'status' => $request->status,
                'ranking' => $request->ranking,
            ]);
        }

        return $sub_category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {

        if (auth()->guard('admin')->check()) {

            $category =  Category::find($request->category_id);

            $subCategory->update([
                'store_manager_id' => (!$subCategory->storeManager) ? null : $subCategory->storeManager->id,
                'admin_id' => (!auth()->guard('admin')->id()) ? auth()->guard('manager')->user()->admin->id : auth()->guard('admin')->id(),
                'store_id' => $category->store ? $category->store->id : null,
                'category_id' => $category->id,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'status' => $request->status,
                'ranking' => $request->ranking,
            ]);

            return $subCategory;
        }
        if (auth()->guard('manager')->check()) {

            $category =  Category::find($request->category_id);

            $subCategory->update([
                'store_manager_id' => (!auth()->guard('manager')->id()) ? $subCategory->storeManager->id : auth()->guard('manager')->id(),
                'admin_id' => (!auth()->guard('admin')->id()) ? auth()->guard('manager')->user()->admin->id : auth()->guard('admin')->id(),
                'store_id' => $category->store ? $category->store->id : null,
                'category_id' => $category->id,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'status' => $request->status,
                'ranking' => $request->ranking,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
    }

    public function restore($id)
    {
        $model =  new SubCategory();
        $sub_category = $model->getTrashedSubCategory($id);
        $sub_category->restore();
        return $sub_category;
    }

    public function forceDelete($id)
    {
        $sub_category =  new SubCategory();
        $sub_category->getTrashedSubCategory($id)->forceDelete();
    }
}

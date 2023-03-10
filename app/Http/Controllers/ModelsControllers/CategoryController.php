<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Traits\Checking;
use App\Traits\Uploading;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    use Uploading;
    use Checking;
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category_model = new Category();

        $category =  $category_model->getCategory($request->ar_name);

        $image_path = $this->resizeImagePost($request, '/admin/stores/categories/');

        if (!$category) {
            return Category::create([
                'store_manager_id' => auth()->guard('manager')->id(),
                'admin_id' => (!auth()->guard('admin')->id()) ? auth()->guard('manager')->user()->admin->id : auth()->guard('admin')->id(),
                'store_id' => $request->store_id ? $request->store_id : null,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'status' => $request->status,
                'ranking' => $request->ranking,
                'image' => $image_path
            ]);
        }

        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        ($request->image_path) ? $image_path = $this->imageExsit($request, $request->image_path, '/admin/stores/categories/') : $image_path = null;

        (!$image_path) ? $image_path = $this->resizeImagePost($request, '/admin/stores/categories/') : null;

        if (auth()->guard('admin')->check()) {

            $category->update([
                'store_manager_id' => (!$category->storeManager) ? null : $category->storeManager->id,
                'admin_id' => (!auth()->guard('admin')->id()) ? auth()->guard('manager')->user()->admin->id : auth()->guard('admin')->id(),
                'store_id' => ($request->store_id) ? $request->store_id : null,
                'category_type' => $request->category_type,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'status' => $request->status,
                'ranking' => $request->ranking,
                'image' => $image_path,
            ]);

            return $category;
        }

        if (auth()->guard('manager')->check()) {

            $category->update([
                'store_manager_id' => (!auth()->guard('manager')->id()) ? $category->storeManager->id : auth()->guard('manager')->id(),
                'admin_id' => (!auth()->guard('admin')->id()) ? auth()->guard('manager')->user()->admin->id : auth()->guard('admin')->id(),
                'store_id' => ($request->store_id) ? $request->store_id : null,
                'category_type' => $request->category_type,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'status' => $request->status,
                'ranking' => $request->ranking,
                'image' => $image_path,
            ]);

            return $category;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }

    public function restore($id)
    {
        $model =  new Category();
        $category = $model->getTrashedCategory($id);
        $category->restore();
        return $category;
    }

    public function forceDelete($id)
    {
        $category =  new Category();
        $category->getTrashedCategory($id)->forceDelete();
    }
}

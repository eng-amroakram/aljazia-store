<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attribute;
use App\Traits\Checking;
use App\Traits\Uploading;
use stdClass;

class ProductController extends Controller
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $image_path = $this->resizeImagePost($request, '/admin/stores/products/');

        $product = Product::create([
            'store_manager_id' => auth()->guard('manager')->id(),
            'admin_id' => (!auth()->guard('admin')->id()) ? auth()->guard('manager')->user()->admin->id : auth()->guard('admin')->id(),
            'store_id' => $request->store_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'ar_description' => $request->ar_description,
            'en_description' => $request->en_description,
            'status' =>   $request->status,
            'price' => $request->price,
        ]);

        $attr = Attribute::create([
            'admin_id' => $product->admin_id,
            'product_id' => $product->id,
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'store_id' => $product->store->id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'status' => $request->status,
            'image' => $image_path,
        ]);

        if (!$product->colors->where('id', $request->color_id)->first()) {
            $product->colors()->attach($request->color_id);
        }

        if (!$product->sizes->where('id', $request->size_id)->first()) {
            $product->sizes()->attach($request->size_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        ($request->image_path) ? $image_path = $this->imageExsit($request, $request->image_path, '/admin/stores/products/') : $image_path = null;

        (!$image_path) ? $image_path = $this->resizeImagePost($request, '/admin/stores/products/') : null;

        if (auth()->guard('admin')->check()) {
            $product->update([
                'store_manager_id' => (!$product->storeManager) ? null : $product->storeManager->id,
                'admin_id' => (!auth()->guard('admin')->id()) ? auth()->guard('manager')->user()->admin->id : auth()->guard('admin')->id(),
                'store_id' => $request->store_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'ar_description' => $request->ar_description,
                'en_description' => $request->en_description,
                'status' =>  $request->status,
                'price' => $request->price,
            ]);

            $attr = $product->getAttr($product->id);

            $attr->update([
                'store_id' => $request->store_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,

            ]);
        }

        if (auth()->guard('manager')->check()) {
            $product->update([
                'store_manager_id' => (!auth()->guard('manager')->id()) ? $product->storeManager->id : auth()->guard('manager')->id(),
                'admin_id' => (!auth()->guard('admin')->id()) ? auth()->guard('manager')->user()->admin->id : auth()->guard('admin')->id(),
                'store_id' => $request->store_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'ar_description' => $request->ar_description,
                'en_description' => $request->en_description,
                'status' =>  $request->status,
                'price' => $request->price,

            ]);


            $attr = $product->getAttr($product->id);

            $attr->update([
                'store_id' => $request->store_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }

    public function restore($id)
    {
        $model =  new Product();
        $product = $model->getTrashedProduct($id);
        $product->restore();
        return $product;
    }

    public function forceDelete($id)
    {
        $product =  new Product();
        $product->getTrashedProduct($id)->forceDelete();
    }
}

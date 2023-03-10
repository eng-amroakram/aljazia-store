<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\Attribute;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;
use App\Models\Product;
use App\Traits\Checking;
use App\Traits\Uploading;

class AttributeController extends Controller
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
     * @param  \App\Http\Requests\StoreAttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeRequest $request)
    {

        $product = Product::where('id', $request->product_id)->first();

        $category = $product->Category;


        $sub_category = $product->subCategory;

        ($request->image_path) ? $image_path = $this->imageExsit($request, $request->image_path, '/admin/stores/products/') : $image_path = null;
        (!$image_path) ? $image_path = $this->resizeImagePost($request, '/admin/stores/products/') : null;

        $attr = Attribute::create([
            'admin_id' => $product->admin_id,
            'product_id' => $product->id,
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'store_id' => $product->store->id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'category_id' => $category->id,
            'sub_category_id' => $sub_category->id,
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
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttributeRequest  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeRequest $request, Attribute $attr)
    {
        if ($attr) {


            ($request->image_path) ? $image_path = $this->imageExsit($request, $request->image_path, '/admin/stores/products/') : $image_path = null;
            (!$image_path) ? $image_path = $this->resizeImagePost($request, '/admin/stores/products/') : null;

            $attr->update([
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'status' => $request->status,
                'image' => $image_path,
            ]);

            if (!$attr->product->colors->where('id', $request->color_id)->first()) {
                $attr->product->colors()->attach($request->color_id);
            }

            if (!$attr->product->sizes->where('id', $request->size_id)->first()) {
                $attr->product->sizes()->attach($request->size_id);
            }

            return true;
        }

        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($attribute)
    {
        $attribute->delete();
    }

    public function restore($id)
    {
        $model =  new Attribute();
        $attr = $model->getTrashedAttribute($id);
        $attr->restore();
        return $attr;
    }

    public function forceDelete($id)
    {
        $attr =  new Attribute();
        $attr->getTrashedAttribute($id)->forceDelete();
    }
}

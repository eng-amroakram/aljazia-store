<x-layouts.app-layout>

    <link rel="stylesheet" href="dist/tagify.css">

    <div class="card card-custom gutter-b">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">
                <h1 class="card-label"><strong>المنتجات </strong></h1>
            </div>


            <div class="card-toolbar">
                <x-buttons.admin.create page="product" id="addProduct" titlebutton="إضافة منتج جديد "
                    modeltitle="إضافة منتج جديد"
                    action="{{ request()->is('admin/*') ? route('admin.products.store') : route('manager.products.store') }}"
                    method="POST" :sizes="$sizes" :colors="$colors" :stores="$stores" :categories="$categories"
                    :subcategories="$sub_categories" />
            </div>

            <div class="card-toolbar">
                <a class="btn btn-primary font-weight-bolder"
                    href="{{ request()->is('admin/*') ? route('admin.trash.products.index') : route('manager.trash.products.index') }}">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span>سلة المهملات
                </a>
            </div>
        </div>

        <div class="card-body">

            <div class="mb-10">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    <br>
                @endif

                @if (session('product'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('product') }}
                    </div>
                    <br>
                @endif


                @if (!$products->count())
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        لا يوجد متاجر حاليا ، يمكنك إنشاء متجر جديد بالضغط على زر <strong>إنشاء متجر جديد</strong>
                    </div>
                    <br>
                @endif

                @if (session('searchNotFound'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('searchNotFound') }}
                    </div>
                    <br>
                @endif



                <form
                    action="{{ request()->is('admin/*') ? route('admin.products.search') : route('manager.products.search') }}"
                    method="GET" class="form-inline">
                    <label class="font-size-h5" style="margin-left: 10px;"><strong>البحث</strong></label>
                    <input type="text" name="search" style="margin-left: 10px;" class="form-control">

                    {{-- multiple data-live-search="true" --}}
                    <label class="font-size-h6" style="margin-left: 10px;"><strong>فلتر البحث</strong></label>

                    <select class="selectpicker" name="filters[]" multiple>
                        <option value="ar_name">حسب الاسم بالعربية</option>
                        <option value="en_name">حسب الاسم بالانجليزية</option>
                        <option value="category">حسب التصنيف الرئيسي</option>
                        <option value="sub_category">حسب التصنيف الفرعي</option>
                        <option value="ar_store">حسب اسم المتجر بالعربية</option>
                        <option value="en_store">حسب اسم المتجر بالانجليزية</option>
                    </select>
                    {{-- <label class="font-size-h6" style="margin-left: 10px; margin-right: 10px;"><strong>المتاجر</strong></label>

                    <select class="selectpicker" name="stores[]" multiple>
                        @if ($stores->count() > 0)
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->ar_name }}</option>
                            @endforeach
                        @else
                            <option value="null">لا يوجد</option>
                        @endif

                    </select> --}}

                    {{-- <label class="font-size-h6" style="margin-left: 10px; margin-right: 10px;"><strong>حالة
                            المتجر</strong></label>
                    <select class="selectpicker" name="storestatus[]" multiple>
                        <option value="active">مفعل</option>
                        <option value="inactive">غير مفعل</option>
                    </select> --}}

                    <label class="font-size-h6" style="margin-left: 10px; margin-right: 10px;"><strong>حالة
                            المنتج</strong></label>
                    <select class="selectpicker" name="productstatus[]" multiple>
                        <option value="active">مفعل</option>
                        <option value="inactive">غير مفعل</option>
                    </select>

                    <label class="font-size-h6" style="margin-left: 10px; margin-right: 10px;"><strong>حالة
                            المواصفات</strong></label>
                    <select class="selectpicker" name="attrstatus[]" multiple>
                        <option value="active">مفعل</option>
                        <option value="inactive">غير مفعل</option>
                    </select>


                    <button type="submit" style="margin-right: 10px;"
                        class="btn btn-primary font-weight-bolder">بحث</button>
                </form>
            </div>


            <div class="table-responsive">
                <table id="stores" class="table text-center table-vertical-center">
                    <thead>
                        <tr>
                            {{-- <th scope="col" style="font-weight: bold;">ID</th> --}}
                            <th scope="col" style="font-weight: bold;">التصنيف الرئيسي</th>
                            <th scope="col" style="font-weight: bold;">التصنيف الفرعي</th>
                            <th scope="col" style="font-weight: bold;">الاسم بالعربية</th>
                            {{-- <th scope="col" style="font-weight: bold;">المتجر</th> --}}
                            {{-- <th scope="col" style="font-weight: bold;">حالة المتجر</th> --}}
                            <th scope="col" style="font-weight: bold;">حالة المنتج العامة</th>
                            <th scope="col" style="font-weight: bold;"> بيانات المنتج</th>
                            <th scope="col" style="font-weight: bold;">إضافة مواصفات جديدة</th>
                            <th scope="col" style="font-weight: bold;"> تعديل المنتج</th>
                            <th scope="col" style="font-weight: bold;"> حذف المنتج</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <tr>
                                    {{-- <td>{{ $store->id }}</td> --}}

                                    <td>{{ $product->category->ar_name ? $product->category->ar_name : 'التصنيف محذوف' }}
                                    </td>
                                    <td>{{ $product->subCategory->ar_name }}</td>
                                    <td>{{ $product->ar_name }}</td>
                                    {{-- <td>{{ $product->store->ar_name }}</td> --}}
                                    {{-- <td> <span
                                            class=" {{ $product->store->status == 'active' ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ $product->store->status == 'active' ? 'مفعل' : 'معطل' }}</span>
                                    </td> --}}
                                    <td> <span
                                            class=" {{ $product->status == 'active' ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ $product->status == 'active' ? 'مفعل' : 'معطل' }}</span>
                                    </td>

                                    <td>
                                        <table class="nav-tabs-line-active-border-secondary">
                                            <thead>
                                                <th scope="col" style="font-weight: bold;">الصورة</th>
                                                <th scope="col" style="font-weight: bold;">اللون</th>
                                                <th scope="col" style="font-weight: bold;">الحجم</th>
                                                <th scope="col" style="font-weight: bold;">السعر</th>
                                                <th scope="col" style="font-weight: bold;">الخصم</th>
                                                <th scope="col" style="font-weight: bold;">كمية الطلبات</th>
                                                <th scope="col" style="font-weight: bold;">حالة المواصفات</th>
                                                <th scope="col" style="font-weight: bold;">تعديل المواصفات</th>
                                                <th scope="col" style="font-weight: bold;">حذف</th>
                                            </thead>

                                            <tbody>

                                                @foreach ($product->specification as $attr)
                                                    <tr>
                                                        <td><img src="{{ asset('storage') . $attr->image }}"
                                                                alt=""></td>
                                                        {{-- <td>{{ $attr->ar_name }}</td>
                                                        <td>{{ $attr->en_name }}</td> --}}
                                                        <td><input type="color"
                                                                value="{{ $product->getColor($attr->color_id) }}"
                                                                disabled></td>
                                                        <td> {{ $product->getSize($attr->size_id) }} </td>
                                                        <td> {{ $attr->price }} </td>
                                                        <td> {{ $attr->discount }} </td>
                                                        <td> 0</td>
                                                        <td>
                                                            <span
                                                                class=" {{ $attr->status == 'active' ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ $attr->status == 'active' ? 'مفعل' : 'معطل' }}</span>
                                                        </td>


                                                        <td>
                                                            <x-buttons.admin.edit page="attribute"
                                                                id="editAttribute{{ $attr->id }}"
                                                                edittitle="تعديل مواصفات المنتج {{ $attr->ar_name }}"
                                                                action="{{ request()->is('admin/*') ? route('admin.attrs.update', $attr->id) : route('manager.attrs.update', $attr->id) }}"
                                                                method="PUT" :product="$product" :sizes="$sizes"
                                                                :colors="$colors" :attr="$attr" />
                                                        </td>

                                                        <td>
                                                            <x-buttons.admin.delete page="attribute"
                                                                id="deleteAttribute{{ $attr->id }}"
                                                                deletetitle="حذف مواصفات المنتج {{ $attr->ar_name }}"
                                                                action="{{ request()->is('admin/*') ? route('admin.attrs.destroy', $attr->id) : route('manager.attrs.destroy', $attr->id) }}"
                                                                method="DELETE" :product="$product" />
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </td>


                                    <td>
                                        <x-buttons.admin.create page="attribute" id="addAttribute"
                                            titlebutton="إضافة مواصفات  جديدة " modeltitle="إضافة مواصفات جديدة"
                                            action="{{ request()->is('admin/*') ? route('admin.attrs.store') : route('manager.attrs.store') }}"
                                            method="PUT" :product="$product" :sizes="$sizes" :colors="$colors" />
                                    </td>

                                    <td>
                                        <x-buttons.admin.edit page="product" id="editProduct{{ $product->id }}"
                                            edittitle="تعديل مواصفات المنتج {{ $product->ar_name }}"
                                            action="{{ request()->is('admin/*') ? route('admin.products.update', $product->id) : route('manager.products.update', $product->id) }}"
                                            method="PUT" :product="$product" :stores="$stores" :categories="$categories"
                                            :subcategories="$sub_categories" />
                                    </td>

                                    <td>
                                        <x-buttons.admin.delete page="product" id="deleteProduct{{ $product->id }}"
                                            deletetitle="حذف المنتج {{ $product->ar_name }}"
                                            action="{{ request()->is('admin/*') ? route('admin.products.destroy', $product->id) : route('manager.products.destroy', $product->id) }}"
                                            method="DELETE" :product="$product" />
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">
                                    <h1> لا يوجد بيانات </h1>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                    {{-- <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot> --}}
                </table>
            </div>
        </div>
    </div>

    {{ $products->links() }}

</x-layouts.app-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="dist/jQuery.tagify.min.js"></script>

<script>
    $('select').selectpicker();

    (function() {
        // The DOM element you wish to replace with Tagify
        var colors = document.querySelector('input[name=colors]');
        var sizes = document.querySelector('input[name=sizes]');
        var prices = document.querySelector('input[name=prices]');

        // initialize Tagify on the above input node reference
        new Tagify(colors)
        new Tagify(sizes)
        new Tagify(prices)
    })()
</script>

<x-layouts.app-layout>

    <link rel="stylesheet" href="dist/tagify.css">


    <div class="card card-custom gutter-b">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">
                <h1 class="card-label"><strong>التصنيفات الرئيسية</strong></h1>
            </div>

            {{-- <div class="card-toolbar">
                <x-buttons.admin.create page="category" id="addCategory" titlebutton="إضافة تصنيف رئيسي جديد "
                    modeltitle="إضافة تصنيف رئيسي جديد" action="{{ route('admin.categories.store') }}"
                    method="POST" />
            </div> --}}

            <div class="card-toolbar">
                <a class="btn btn-primary font-weight-bolder"
                    href="{{ request()->is('manager/*') ? route('manager.categories.index') : route('admin.categories.index') }}">
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
                    </span>رجوع
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


                @if (!$categories->count())
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



                {{-- <form action="{{ route('admin.stores.search') }}" method="GET" class="form-inline">
                    <label class="font-size-h5" style="margin-left: 10px;"><strong>البحث</strong></label>
                    <input type="text" name="search" style="margin-left: 10px;" class="form-control">

                    multiple data-live-search="true"
                    <label class="font-size-h6" style="margin-left: 10px;"><strong>فلتر البحث</strong></label>

                    <select class="selectpicker" name="filters[]" multiple>
                        <option value="ar_name">حسب الاسم بالعربية</option>
                        <option value="en_name">حسب الاسم بالانجليزية</option>
                        <option value="email">حسب البريد الالكتروني</option>
                        <option value="phone">حسب رقم الهاتف</option>
                        <option value="manager">حسب المدير</option>
                    </select>

                    <label class="font-size-h6" style="margin-left: 10px; margin-right: 10px;"><strong>حالة
                            المتجر</strong></label>
                    <select class="selectpicker" name="status[]" multiple>
                        <option value="active">مفعل</option>
                        <option value="inactive">غير مفعل</option>
                    </select>

                    <button type="submit" style="margin-right: 10px;"
                        class="btn btn-primary font-weight-bolder">بحث</button>
                </form> --}}
            </div>


            <div class="table-responsive">
                <table id="stores" class="table text-center">
                    <thead>

                        <tr>
                            <th scope="col" style="font-weight: bold;">صورة التصنيف</th>
                            <th scope="col" style="font-weight: bold;">الاسم بالعربي</th>
                            <th scope="col" style="font-weight: bold;">الاسم بالانجليزية</th>
                            <th scope="col" style="font-weight: bold;">التصنيفات الفرعية</th>
                            <th scope="col" style="font-weight: bold;">الحالة</th>
                            <th scope="col" style="font-weight: bold;">الترتيب</th>
                            <th scope="col" style="font-weight: bold;">استرجاع</th>
                            <th scope="col" style="font-weight: bold;">حذف</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <tr>
                                    <td><img src="{{ asset('storage') . $category->image }}" alt=""></td>
                                    <td>{{ $category->ar_name }}</td>
                                    <td>{{ $category->en_name }}</td>
                                    <td>
                                        <a href="{{  request()->is('manager/*') ? route('manager.sub-categories.search', $category->id) : route('admin.sub-categories.search', $category->id) }}"
                                            class="btn btn-sm btn-clean btn-icon" title="التصنيف الفرعي">
                                            <span class="svg-icon menu-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24"></rect>
                                                        <rect fill="#000000" x="4" y="4"
                                                            width="7" height="7" rx="1.5"></rect>
                                                        <path
                                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </td>
                                    <td>{{ $category->ranking }}</td>
                                    <td>
                                        <span
                                            class=" {{ $category->status == 'active' ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ $category->status == 'active' ? 'مفعل' : 'معطل' }}</span>
                                    </td>

                                    <td>
                                        <x-buttons.admin.restore page="category"
                                            id="restoreCategory{{ $category->id }}"
                                            restoretitle="استراجاع التصنيف الرئيسي {{ $category->ar_name }}"
                                            action="{{ request()->is('manager/*') ? route('manager.categories.restore', $category) : route('admin.categories.restore', $category) }}"
                                            method="PUT" :category="$category" />
                                    </td>

                                    <td>
                                        <x-buttons.admin.force_delete page="category"
                                            id="forceDeleteCategory{{ $category->id }}"
                                            forcedeletetitle="حذف التصنيف الرئيسي {{ $category->ar_name }} نهائيا"
                                            action="{{ request()->is('manager/*') ? route('manager.categories.force-delete', $category) : route('admin.categories.force-delete', $category) }}"
                                            method="DELETE" :category="$category" />
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

    {{ $categories->links() }}

</x-layouts.app-layout>

<script>
    $('select').selectpicker();
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="dist/jQuery.tagify.min.js"></script>

<script data-name="[colors,sizes, prices]">
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

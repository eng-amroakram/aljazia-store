<x-layouts.app-layout>

    <link rel="stylesheet" href="dist/tagify.css">

    <div class="card card-custom gutter-b">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">
                <h1 class="card-label"><strong>مناطق التوصيل</strong></h1>
            </div>

            <div class="card-toolbar">
                <a class="btn btn-primary font-weight-bolder" href="{{ route('admin.areas.index') }}">
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


                @if (!$areas->count())
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
            </div>


            <div class="table-responsive">
                <table id="stores" class="table text-center">
                    <thead>

                        <tr>
                            {{-- <th scope="col" style="font-weight: bold;">ID</th> --}}
                            <th scope="col" style="font-weight: bold;">اسم المنطقة بالعربية</th>
                            <th scope="col" style="font-weight: bold;">اسم المنطقة بالانجليزية</th>
                            <th scope="col" style="font-weight: bold;">عرض على الخريطة</th>
                            <th scope="col" style="font-weight: bold;">سعر التوصيل</th>
                            <th scope="col" style="font-weight: bold;">الحالة</th>
                            <th scope="col" style="font-weight: bold;">استرجاع</th>
                            <th scope="col" style="font-weight: bold;">حذف</th>
                        </tr>

                    </thead>
                    <tbody>

                        @if ($areas->count() > 0)
                            @foreach ($areas as $area)
                                <tr>
                                    {{-- <td>{{ $store->id }}</td> --}}
                                    <td>{{ $area->ar_name }}</td>
                                    <td>{{ $area->en_name }}</td>

                                    <td>
                                        <a href="\map\1" class="btn btn-sm btn-clean btn-icon" title="الخريطة">
                                            <i class="flaticon2-map"></i>
                                        </a>
                                    </td>

                                    <td>{{ $area->delivery_price }}</td>
                                    <td>
                                        <span
                                            class=" {{ $area->status == 'active' ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ $area->status == 'active' ? 'مفعل' : 'معطل' }}</span>
                                    </td>

                                    <td>
                                        <x-buttons.admin.restore page="area" id="restoreArea{{ $area->id }}"
                                            restoretitle="استراجاع المنطقة {{ $area->ar_name }}"
                                            action="{{ route('admin.areas.restore', $area) }}" method="POST"
                                            :area="$area" />
                                    </td>

                                    <td>
                                        <x-buttons.admin.force_delete page="area"
                                            id="forceDeleteArea{{ $area->id }}"
                                            forcedeletetitle="حذف المنطقة {{ $area->ar_name }} نهائيا"
                                            action="{{ route('admin.areas.force-delete', $area) }}" method="DELETE"
                                            :area="$area" />
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
                </table>
            </div>
        </div>
    </div>

    {{ $areas->links() }}

</x-layouts.app-layout>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="dist/jQuery.tagify.min.js"></script>

<script data-name="[colors,sizes, prices]">
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

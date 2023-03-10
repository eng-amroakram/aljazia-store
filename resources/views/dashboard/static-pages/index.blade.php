<x-layouts.app-layout>

    <link rel="stylesheet" href="dist/tagify.css">


    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h1 class="card-label"><strong>الصفحات الثابتة</strong></h1>
            </div>

            <div class="card-toolbar">
                <x-buttons.admin.create page="staticPage" id="addStaticPage" titlebutton="إضافة صفحة ثابتة جديدة "
                    modeltitle="إضافة صفحة جديدة" action="{{ route('admin.static-pages.store') }}" method="POST" />
            </div>

            {{-- <div class="card-toolbar">
                <a class="btn btn-primary font-weight-bolder" href="{{ route('admin.trash.areas.index') }}">
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
            </div> --}}


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


                @if (!$static_pages->count())
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
                            <th scope="col" style="font-weight: bold;">اسم الصفحة بالعربية</th>
                            <th scope="col" style="font-weight: bold;">اسم الصفحة بالانجليزية</th>
                            <th scope="col" style="font-weight: bold;">تفاصيل الصفحة بالعربية</th>
                            <th scope="col" style="font-weight: bold;">تفاصيل الصفحة بالانجليزية</th>
                            <th scope="col" style="font-weight: bold;">رابط الصفحة</th>
                            <th scope="col" style="font-weight: bold;">تعديل</th>
                        </tr>

                    </thead>
                    <tbody>

                        @if ($static_pages->count() > 0)
                            @foreach ($static_pages as $static_page)
                                <tr>
                                    {{-- <td>{{ $store->id }}</td> --}}
                                    <td>{{ $static_page->ar_name }}</td>
                                    <td>{{ $static_page->en_name }}</td>
                                    <td>{{ $static_page->ar_description }}</td>
                                    <td>{{ $static_page->en_description }}</td>
                                    <td>{{ $static_page->link }}</td>

                                    <td>
                                        <x-buttons.admin.edit page="staticPage" id="editStaticPage{{ $static_page->id }}"
                                            edittitle="تعديل الصفحة {{ $static_page->ar_name }}"
                                            action="{{ route('admin.static-pages.update', $static_page->id) }}" method="PUT"
                                            :staticpage="$static_page" />
                                    </td>

                                    {{-- <td>
                                        <x-buttons.admin.delete page="staticPage" id="deleteStaticPage{{ $static_page->id }}"
                                            deletetitle="حذف الصفحة {{ $static_page->ar_name }}"
                                            action="{{ route('admin.static-pages.destroy', $static_page) }}" method="DELETE"
                                            :staticpage="$static_page" />
                                    </td> --}}

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

    {{ $static_pages->links() }}

</x-layouts.app-layout>

<script>
    // $(document).ready(function() {
    //     $('#stores').DataTable();
    // });
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

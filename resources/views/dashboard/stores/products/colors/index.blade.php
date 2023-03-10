<x-layouts.app-layout>

    <link rel="stylesheet" href="dist/tagify.css">


    <div class="card card-custom gutter-b">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">
                <h1 class="card-label"><strong>الألوان</strong></h1>
            </div>

            <div class="card-toolbar">
                <x-buttons.admin.create page="color" id="addColor" titlebutton="إضافة لون جديد "  modeltitle="إضافة لون جديد" action="{{ (request()->is('manager/*')) ? route('manager.colors.store') : route('admin.colors.store') }}" method="POST" />
            </div>

            <div class="card-toolbar">
                <a class="btn btn-primary font-weight-bolder" href="{{ (request()->is('manager/*')) ? route('manager.trash.colors.index') : route('admin.trash.colors.index')}}">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><circle fill="#000000" cx="9" cy="15" r="6" /><path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" /> </g> </svg>
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


                @if (!$colors->count())
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


{{--
                <form action="{{ (request()->is('manager/*')) ? route('manager.stores.search') : route('admin.stores.search') }}" method="GET" class="form-inline">
                    <label class="font-size-h5" style="margin-left: 10px;"><strong>البحث</strong></label>
                    <input type="text" name="search" style="margin-left: 10px;" class="form-control">


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
                            {{-- <th scope="col" style="font-weight: bold;">ID</th> --}}
                            <th scope="col" style="font-weight: bold;">اللون</th>
                            <th scope="col" style="font-weight: bold;">درجة اللون</th>
                            {{-- <th scope="col" style="font-weight: bold;">HEX</th> --}}
                            {{-- <th scope="col" style="font-weight: bold;">الحالة</th> --}}
                            <th scope="col" style="font-weight: bold;">تعديل</th>
                            <th scope="col" style="font-weight: bold;">حذف</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($colors->count() > 0)
                            @foreach ($colors as $color)
                                <tr>

                                    {{-- <td>{{ $store->id }}</td> --}}
                                    <td>{{ $color->name }}</td>
                                    {{-- <td>{{ $color->degree }}</td> --}}
                                    <td><input type="color" id="colorpicker" value="{{$color->color}}" disabled></td>

                                    {{-- <td><span
                                            class=" {{ $color->status == 'active' ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ $color->status == 'active' ? 'مفعل' : 'معطل' }}</span>
                                    </td> --}}

                                    <td>
                                        <x-buttons.admin.edit page="color" id="editColor{{ $color->id }}" edittitle="تعديل اللون {{ $color->name }}" action="{{  (request()->is('manager/*')) ? route('manager.colors.update', $color->id)  : route('admin.colors.update', $color->id)}}" method="PUT" :color="$color"/>
                                    </td>

                                    <td>
                                        <x-buttons.admin.delete  page="color" id="deleteColor{{ $color->id }}"  deletetitle="حذف اللون{{ $color->name }}"  action="{{ (request()->is('manager/*')) ? route('manager.colors.destroy', $color->id)  : route('admin.colors.destroy', $color->id)}}" method="DELETE" :color="$color" />
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

        {{ $colors->links() }}

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
    (function () {
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



@section('js')
    <script>
        // $(document).ready(function() {
        //     $('#stores').DataTable();

        // t.on('preXhr.dt', function(e, settings, data) {
        //     data.search_h = $('#stores_filter input[type=search]').val();
        // });
        // });

        // //Activation function
        function fAct(selectID) {
            let id = selectID.id;
            $.ajax({
                url: "/active/store/" + id,
                complete: function(data) {
                    if (data.status == 200) {
                        Swal.fire("نجاح!", 'تمت العملية بنجاح', "success");
                    } else {
                        Swal.fire("خطأ!", 'حدث خطأ اثناء تنفيذ العملية', "error");
                    }
                    $('.swal2-confirm').click(function() {
                        $('#store-table').DataTable().ajax.reload();
                    });
                }
            })
        }

        // function ActiveOrUnactive(selectID) {
        //     let id = selectID.id;
        //     $.ajax({
        //         url: "/register_active/store/" + id,
        //         complete: function(data) {
        //             if (data.status == 200) {
        //                 Swal.fire("نجاح!", 'تمت العملية بنجاح', "success");
        //             } else {
        //                 Swal.fire("خطأ!", 'حدث خطأ اثناء تنفيذ العملية', "error");
        //             }
        //             $('.swal2-confirm').click(function() {
        //                 $('#store-table').DataTable().ajax.reload();
        //             });
        //         }
        //     })
        // }

        // //Delete function
        // function fDelete(selectID) {
        //     let id = selectID.id;
        //     $.ajax({
        //         url: "/delete/store/" + id,
        //         complete: function(data) {
        //             if (data.status == 200) {
        //                 Swal.fire("نجاح!", 'تمت العملية بنجاح', "success");
        //             } else {
        //                 Swal.fire("خطأ!", 'حدث خطأ اثناء تنفيذ العملية', "error");
        //             }
        //             $('.swal2-confirm').click(function() {
        //                 $('#store-table').DataTable().ajax.reload();
        //             });
        //         }
        //     })
        // }

        // $(function() {
        //     $('#add_data').click(function() {
        //         $('#kt_form_1')[0].reset();
        //         $('#button_action').val('insert');
        //         $('#store_id').val('');
        //         $('#exampleModalLabel').text('متجر جديد');
        //         $('#pict').attr('src', '');
        //         $('#div_pict').hide();
        //     });
        //     $('#kt_form_1').on('submit', function(event) {
        //         event.preventDefault();
        //         $("#btn-action").attr("disabled", true);
        //         $.ajax({
        //             url: "/store",
        //             method: "post",
        //             data: new FormData(this),
        //             dataType: "json",
        //             contentType: false,
        //             cache: false,
        //             processData: false,
        //             success: function(data) {
        //                 if (data.error.length > 0) {
        //                     let error_html = '';
        //                     for (let i = 0; i < data.error.length; i++) {
        //                         error_html += '<div class="alert alert-danger">' + data.error[
        //                             i] + '</div>';
        //                     }
        //                     Swal.fire("خطأ!", error_html, "error");
        //                     setTimeout(function() {
        //                         $('#btn-action').attr("disabled", false);
        //                     }, 3000);
        //                 } else {
        //                     Swal.fire("نجاح!", data.success, "success");
        //                     setTimeout(function() {
        //                         $('#btn-action').attr("disabled", false);
        //                     }, 3000);
        //                     $('.swal2-confirm').click(function() {
        //                         $('.modal').modal('hide');
        //                         $('#store-table').DataTable().ajax.reload();
        //                     });
        //                 }
        //             },
        //             error: function(XMLHttpRequest, textStatus, errorThrown) {
        //                 console.log("Status: " + textStatus);
        //                 setTimeout(function() {
        //                     $('#btn-action').attr("disabled", false);
        //                 }, 3000);
        //             }
        //         })
        //     });
        //     $(document).on('click', '.edit', function() {
        //         let id = $(this).attr('id');
        //         $.ajax({
        //             url: '/store/create',
        //             method: 'get',
        //             data: {
        //                 id: id
        //             },
        //             dataType: 'json',
        //             success: function(data) {
        //                 $('#name_ar').val(data.name_ar);
        //                 $('#name_en').val(data.name_en);
        //                 $('#mobile').val(data.mobile);
        //                 $('#email').val(data.email);
        //                 $('#user_name').val(data.user_name);
        //                 $('#min_order').val(data.min_order);
        //                 $('#vat_number').val(data.vat_number);
        //                 $('#pict').attr('src', data.image);
        //                 $('#div_pict').show();
        //                 $('#store_id').val(id);
        //                 $('#exampleModalLabel').text('تعديل متجر');
        //                 $('#button_action').val('update');
        //             }
        //         })
        //     });
        // });
    </script>
@endsection

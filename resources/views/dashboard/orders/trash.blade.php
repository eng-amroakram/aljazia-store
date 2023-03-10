<x-layouts.app-layout>

    <link rel="stylesheet" href="dist/tagify.css">


    <div class="card card-custom gutter-b">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">
                <h1 class="card-label"><strong>طلبات المستخدمين المحذوفة</strong></h1>
            </div>

            {{-- <div class="card-toolbar">
                <x-buttons.admin.create page="offer" id="addOffer" titlebutton="إضافة طلب جديد جديد "
                    modeltitle="إضافة عرض شركة جديد" action="{{ route('admin.orders.store') }}" method="POST" />
            </div> --}}

            <div class="card-toolbar">
                <a class="btn btn-primary font-weight-bolder" href="{{ route('admin.orders.index') }}">
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

                {{-- @if (!$orders->count())
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        لا يوجد متاجر حاليا ، يمكنك إنشاء متجر جديد بالضغط على زر <strong>إنشاء متجر جديد</strong>
                    </div>
                    <br>
                @endif --}}

                @if (session('searchNotFound'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('searchNotFound') }}
                    </div>
                    <br>
                @endif



                <form action="{{ route('admin.orders.search') }}" method="GET" class="form-inline">
                    <label class="font-size-h5" style="margin-left: 10px;"><strong>البحث</strong></label>
                    <input type="text" name="search" style="margin-left: 10px;" class="form-control">

                    {{-- multiple data-live-search="true" --}}
                    {{-- <label class="font-size-h6" style="margin-left: 10px;"><strong>فلتر البحث</strong></label> --}}

                    {{-- <select class="selectpicker" name="filters[]" multiple>
                        <option value="ar_name">حسب الاسم بالعربية</option>
                        <option value="en_name">حسب الاسم بالانجليزية</option>
                        <option value="email">حسب البريد الالكتروني</option>
                        <option value="phone">حسب رقم الهاتف</option>
                        <option value="manager">حسب المدير</option>
                    </select> --}}

                    <label class="font-size-h6" style="margin-left: 10px; margin-right: 10px;"><strong>حالة
                            الطلب</strong></label>
                    <select class="selectpicker" name="status[]" multiple>
                        <option value="active">مفعل</option>
                        <option value="inactive">غير مفعل</option>
                    </select>

                    <button type="submit" style="margin-right: 10px;"
                        class="btn btn-primary font-weight-bolder">بحث</button>
                </form>
            </div>


            <div class="table-responsive">
                <table id="stores" class="table text-center">
                    <thead>

                        <tr>
                            <th scope="col" style="font-weight: bold;">رقم الطلب</th>
                            <th scope="col" style="font-weight: bold;">اسم صاحب الطلب</th>
                            <th scope="col" style="font-weight: bold;">اسم المتجر</th>
                            <th scope="col" style="font-weight: bold;">اسم المندوب</th>
                            <th scope="col" style="font-weight: bold;">إجمالي الفاتورة</th>
                            <th scope="col" style="font-weight: bold;">عدد المنتجات</th>
                            <th scope="col" style="font-weight: bold;">تاريخ الطلب</th>
                            <th scope="col" style="font-weight: bold;">طريقة الدفع</th>
                            <th scope="col" style="font-weight: bold;">حالة الطلب</th>
                            <th scope="col" style="font-weight: bold;">التعديل</th>
                            <th scope="col" style="font-weight: bold;">حذف</th>
                        </tr>

                    </thead>
                    <tbody>

                        @if ($orders->count() > 0)
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user_name }}</td>
                                    <td>{{ $order->store_name }}</td>
                                    <td>{{ $order->delivery_name }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->total_products }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    @if ($order->status == 'new')
                                        <td class="text-warning">جديد</td>
                                    @elseif ($order->status == 'pending')
                                        <td class="text-danger">قيد الانتظار</td>
                                    @elseif ($order->status == 'in_progress')
                                        <td class="text-success">قيد التنفيذ</td>
                                    @elseif ($order->status == 'delivered')
                                        <td class="text-success">في الطريق</td>
                                    @elseif ($order->status == 'completed')
                                        <td class="text-success">مكتمل</td>
                                    @elseif ($order->status == 'rejected')
                                        <td class="text-danger">ملغي</td>
                                    @endif

                                    {{-- <td>
                                        <x-buttons.admin.edit page="offer" id="editOffer{{ $offer->id }}"
                                            edittitle="تعديل عرض الشركة {{ $offer->name }}"
                                            action="{{ route('admin.offers.update', $offer->id) }}" method="PUT"
                                            :offer="$offer" />
                                    </td>

                                    <td>
                                        <x-buttons.admin.delete page="offer" id="deleteOffer{{ $offer->id }}"
                                            deletetitle="حذف عرض الشركة {{ $offer->name }}"
                                            action="{{ route('admin.offers.destroy', $offer) }}" method="DELETE"
                                            :offer="$offer" />
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
                </table>
            </div>
        </div>
    </div>

    {{ $orders->links() }}

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

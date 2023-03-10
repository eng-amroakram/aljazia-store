<x-layouts.app-layout>

    <link rel="stylesheet" href="dist/tagify.css">


    <div class="card card-custom gutter-b">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">
                @if ($status == 'new')
                    <h1 class="card-label"><strong>طلبات المستخدمين الجديدة</strong></h1>
                @elseif ($status == 'pending')
                    <h1 class="card-label"><strong>طلبات المستخدمين قيد الانتظار</strong></h1>
                @elseif ($status == 'in_progress')
                    <h1 class="card-label"><strong>طلبات المستخدمين قيد التنفيذ</strong></h1>
                @elseif ($status == 'delivered')
                    <h1 class="card-label"><strong>طلبات المستخدمين في الطريق</strong></h1>
                @elseif ($status == 'completed')
                    <h1 class="card-label"><strong>طلبات المستخدمين المكتملة</strong></h1>
                @elseif ($status == 'rejected')
                    <h1 class="card-label"><strong>طلبات المستخدمين الملغية</strong></h1>
                @endif
            </div>

            <div class="card-toolbar">
                <x-buttons.admin.create page="offer" id="addOffer" titlebutton="إضافة طلب جديد جديد "
                    modeltitle="إضافة عرض شركة جديد"
                    action="{{ request()->is('manager/*') ? route('manager.orders.store') : route('admin.orders.store') }}"
                    method="POST" />
            </div>

            <div class="card-toolbar">
                <a class="btn btn-primary font-weight-bolder"
                    href="{{ request()->is('manager/*') ? route('manager.trash.offers.index') : route('admin.trash.offers.index') }}">
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



                <form
                    action="{{ request()->is('manager/*') ? route('manager.orders.search') : route('admin.orders.search') }}"
                    method="GET" class="form-inline">
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
                            <th scope="col" style="font-weight: bold;">وقت التوصيل</th>
                            <th scope="col" style="font-weight: bold;">طريقة الدفع</th>
                            @if ($status == 'complete')
                                <th scope="col" style="font-weight: bold;">التقييم</th>
                                <th scope="col" style="font-weight: bold;">نص التقييم</th>
                            @endif

                            @if ($status == 'rejected')
                                <th scope="col" style="font-weight: bold;">طرف الإلغاء</th>
                            @endif

                            <th scope="col" style="font-weight: bold;">حالة الطلب</th>
                            <th scope="col" style="font-weight: bold;">عرض التفاصيل</th>

                            @if ($status == 'new')
                                <th scope="col" style="font-weight: bold;">قبول</th>
                                <th scope="col" style="font-weight: bold;">رفض</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>

                        @if ($orders->count() > 0)
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->store->ar_name }}</td>
                                    @if ($order->delivery)
                                        <td>{{ $order->delivery->name }}</td>
                                    @else
                                        <td>لا يوجد</td>
                                    @endif
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->total_products }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ 'Time (' }} {{ $order->deliveryTime->start_time }}
                                        {{ $order->deliveryTime->end_time }} {{ ')' }}</td>
                                    <td>{{ $order->payment_method }}</td>

                                    @if ($status == 'complete')
                                        @if ($order->rates->where('order_id', $order->id)->first())
                                            <td>{{ $order->rates->where('order_id', $order->id)->first()->rate }}/5
                                            </td>
                                        @else
                                            <td>غير مقييم</td>
                                        @endif
                                        <td>
                                            <x-buttons.admin.rate-message page="order"
                                                id="showRateOrder{{ $order->id }}"
                                                ordertitle="نص التقييم لرقم الطلب {{ $order->id }}"
                                                :order="$order" />
                                        </td>
                                    @endif

                                    @if ($status == 'rejected')
                                        @if ($order->cancellation_party == 'user')
                                            <td>العميل</td>
                                        @endif

                                        @if ($order->cancellation_party == 'admin')
                                            <td>مدير النظام</td>
                                        @endif

                                        @if ($order->cancellation_party == 'store_manager')
                                            <td>مدير المتجر</td>
                                        @endif
                                    @endif

                                    @if ($order->status == 'new')
                                        <td> <span
                                                class=" label label-lg font-weight-bold label-light-warning label-inline ">جديد</span>
                                        </td>
                                    @elseif ($order->status == 'pending')
                                        <td> <span
                                                class=" label label-lg font-weight-bold label-light-danger label-inline ">قيد
                                                الانتظار</span></td>
                                    @elseif ($order->status == 'in_progress')
                                        <td> <span
                                                class=" label label-lg font-weight-bold label-light-info text-black-50 label-inline ">قيد
                                                التنفيذ</span></td>
                                    @elseif ($order->status == 'delivered')
                                        <td> <span
                                                class=" label label-lg font-weight-bold label-light-warning label-inline ">في
                                                الطريق</span></td>
                                    @elseif ($order->status == 'complete')
                                        <td> <span
                                                class=" label label-lg font-weight-bold label-light-success label-inline ">مكتمل</span>
                                        </td>
                                    @elseif ($order->status == 'rejected')
                                        <td> <span
                                                class=" label label-lg font-weight-bold label-light-danger label-inline ">ملغي</span>
                                        </td>
                                    @endif

                                    <td>
                                        <x-buttons.admin.order_details page="order"
                                            id="showOrder{{ $order->id }}"
                                            ordertitle="تفاصيل  طلب {{ $order->id }}" :order="$order" />
                                    </td>

                                    @if ($order->status == 'new')
                                        <td>
                                            <a href="{{ request()->is('manager/*') ? route('manager.orders.status', [$order->id, 'pending', 'store_manager']) : route('admin.orders.status', [$order->id, 'pending', 'admin']) }}"
                                                class="btn btn-sm btn-clean btn-icon" title="قبول">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path
                                                                d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) ">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{ request()->is('manager/*') ? route('manager.orders.status', [$order->id, 'rejected']) : route('admin.orders.status', [$order->id, 'rejected']) }}"
                                                class="btn btn-sm btn-clean btn-icon" title="رفض">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                                fill="#000000">
                                                                <rect x="0" y="7" width="16"
                                                                    height="2" rx="1"></rect>
                                                                <rect opacity="0.3"
                                                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) "
                                                                    x="0" y="7" width="16"
                                                                    height="2" rx="1"></rect>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                        </td>
                                    @endif


                                    {{-- <td>


                                        <x-buttons.admin.edit page="order" id="editOrder{{ $order->id }}"
                                            edittitle="تعديل  طلب {{ $order->name }}"
                                            action="{{ route('admin.orders.update', $order->id) }}" method="PUT"
                                            :order="$order" />
                                    </td>

                                    <td>
                                        <x-buttons.admin.delete page="order" id="deleteOrder{{ $order->id }}"
                                            deletetitle="حذف طلب  {{ $order->name }}"
                                            action="{{ route('admin.orders.destroy', $order) }}" method="DELETE"
                                            :order="$order" />
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

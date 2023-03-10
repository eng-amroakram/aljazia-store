<x-layouts.app-layout>


    <x-buttons.admin.create page="deliveryTime" id="addDeliveryTime" titlebutton="إاضافة وقت توصيل جديد"
        modeltitle="إاضافة وقت توصيل جديد"
        action="{{ request()->is('manager/*') ? route('manager.delivery-time.store') : route('admin.delivery-time.store') }}"
        method="POST" />
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label font-size-h2"> <strong>أوقات التوصيل</strong></h3>
            </div>

            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Dashboard-->
                    <div class="card card-custom">

                        <div class="card-header card-header-tabs-line">
                            <div class="card-title">
                                <h3 class="card-label">اوقات العمل</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_11">السبت</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_22">الاحد</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_33">الاثنين</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_44">الثلاثاء</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_55">الاربعاء</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_66">الخميس</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_77">الجمعة</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content text-center">

                                <div class="tab-pane fade active show " id="kt_tab_pane_11" role="tabpanel">
                                    <div class="row">
                                        <table class="table table-bordered table-checkable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>بداية الفترة</th>
                                                    <th>نهاية الفترة</th>
                                                    <th>الحد الاقصي</th>
                                                    <th>عدد الطلبات</th>
                                                    <th>الحالة</th>
                                                    <th>تعديل</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($delivery_times as $delivery_time)
                                                    {{-- @if (in_array(2, $delivery_time->days)) --}}
                                                        <tr>
                                                            <td>{{ $delivery_time->id }}</td>
                                                            <td>{{ $delivery_time->start_time }}</td>
                                                            <td>{{ $delivery_time->end_time }}</td>

                                                            <td>{{ $delivery_time->capacity }}</td>
                                                            <td>{{  $delivery_time->consume }}</td>

                                                            <td>
                                                                <span
                                                                    class=" {{ in_array(1, $delivery_time->status) ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ in_array(1, $delivery_time->status) ? 'مفعل' : 'معطل' }}</span>
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.edit page="deliveryTime"
                                                                    id="editDeliveryTimekt11{{ $delivery_time->id }}"
                                                                    edittitle="تعديل التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.update', $delivery_time->id) : route('admin.delivery-time.update', $delivery_time->id) }}"
                                                                    method="PUT" :deliverytime="$delivery_time" />
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.delete page="deliveryTime"
                                                                    id="deleteDeliveryTimekt11{{ $delivery_time->id }}"
                                                                    deletetitle="حذف التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.destroy', $delivery_time->id) : route('admin.delivery-time.destroy', $delivery_time->id) }}"
                                                                    method="DELETE" :deliverytime="$delivery_time" />
                                                            </td>

                                                        </tr>
                                                    {{-- @endif --}}
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_tab_pane_22" role="tabpanel">
                                    <div class="row">
                                        <table class="table table-bordered table-checkable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>بداية الفترة</th>
                                                    <th>نهاية الفترة</th>

                                                    <th>الحد الاقصي</th>
                                                    <th>عدد الطلبات</th>
                                                    <th>الحالة</th>
                                                    <th>تعديل</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($delivery_times as $delivery_time)
                                                    {{-- @if (in_array(2, $delivery_time->days)) --}}
                                                        <tr>
                                                            <td>{{ $delivery_time->id }}</td>
                                                            <td>{{ $delivery_time->start_time }}</td>
                                                            <td>{{ $delivery_time->end_time }}</td>

                                                            <td>{{ $delivery_time->capacity }}</td>
                                                            <td>{{ $delivery_time->consume}}</td>

                                                            <td>
                                                                <span
                                                                    class=" {{ in_array(2, $delivery_time->status) ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ in_array(2, $delivery_time->status) ? 'مفعل' : 'معطل' }}</span>
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.edit page="deliveryTime"
                                                                    id="editDeliveryTimekt22{{ $delivery_time->id }}"
                                                                    edittitle="تعديل التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.update', $delivery_time->id) : route('admin.delivery-time.update', $delivery_time->id) }}"
                                                                    method="PUT" :deliverytime="$delivery_time" />
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.delete page="deliveryTime"
                                                                    id="deleteDeliveryTimekt22{{ $delivery_time->id }}"
                                                                    deletetitle="حذف التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.destroy', $delivery_time->id) : route('admin.delivery-time.destroy', $delivery_time->id) }}"
                                                                    method="DELETE" :deliverytime="$delivery_time" />
                                                            </td>

                                                        </tr>
                                                    {{-- @endif --}}
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_tab_pane_33" role="tabpanel">
                                    <div class="row">
                                        <table class="table table-bordered table-checkable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>بداية الفترة</th>
                                                    <th>نهاية الفترة</th>

                                                    <th>الحد الاقصي</th>
                                                    <th>عدد الطلبات</th>
                                                    <th>الحالة</th>
                                                    <th>تعديل</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($delivery_times as $delivery_time)
                                                    {{-- @if (in_array(3, $delivery_time->days)) --}}
                                                        <tr>
                                                            <td>{{ $delivery_time->id }}</td>
                                                            <td>{{ $delivery_time->start_time }}</td>
                                                            <td>{{ $delivery_time->end_time }}</td>

                                                            <td>{{ $delivery_time->capacity }}</td>
                                                            <td>{{ $delivery_time->consume }}</td>
                                                            <td>
                                                                <span
                                                                    class=" {{ in_array(3, $delivery_time->status) ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ in_array(3, $delivery_time->status) ? 'مفعل' : 'معطل' }}</span>
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.edit page="deliveryTime"
                                                                    id="editDeliveryTimekt33{{ $delivery_time->id }}"
                                                                    edittitle="تعديل التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.update', $delivery_time->id) : route('admin.delivery-time.update', $delivery_time->id) }}"
                                                                    method="PUT" :deliverytime="$delivery_time" />
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.delete page="deliveryTime"
                                                                    id="deleteDeliveryTimekt33{{ $delivery_time->id }}"
                                                                    deletetitle="حذف التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.destroy', $delivery_time->id) : route('admin.delivery-time.destroy', $delivery_time->id) }}"
                                                                    method="DELETE" :deliverytime="$delivery_time" />
                                                            </td>

                                                        </tr>
                                                    {{-- @endif --}}
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_tab_pane_44" role="tabpanel">
                                    <div class="row">
                                        <table class="table table-bordered table-checkable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>بداية الفترة</th>
                                                    <th>نهاية الفترة</th>

                                                    <th>الحد الاقصي</th>
                                                    <th>عدد الطلبات</th>
                                                    <th>الحالة</th>
                                                    <th>تعديل</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($delivery_times as $delivery_time)
                                                    {{-- @if (in_array(4, $delivery_time->days)) --}}
                                                        <tr>
                                                            <td>{{ $delivery_time->id }}</td>
                                                            <td>{{ $delivery_time->start_time }}</td>
                                                            <td>{{ $delivery_time->end_time }}</td>

                                                            <td>{{ $delivery_time->capacity }}</td>
                                                            <td>{{$delivery_time->consume }}</td>
                                                            <td>
                                                                <span
                                                                    class=" {{ in_array(4, $delivery_time->status) ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ in_array(4, $delivery_time->status) ? 'مفعل' : 'معطل' }}</span>
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.edit page="deliveryTime"
                                                                    id="editDeliveryTimekt44{{ $delivery_time->id }}"
                                                                    edittitle="تعديل التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.update', $delivery_time->id) : route('admin.delivery-time.update', $delivery_time->id) }}"
                                                                    method="PUT" :deliverytime="$delivery_time" />
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.delete page="deliveryTime"
                                                                    id="deleteDeliveryTimekt44{{ $delivery_time->id }}"
                                                                    deletetitle="حذف التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.destroy', $delivery_time->id) : route('admin.delivery-time.destroy', $delivery_time->id) }}"
                                                                    method="DELETE" :deliverytime="$delivery_time" />
                                                            </td>

                                                        </tr>
                                                    {{-- @endif --}}
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_tab_pane_55" role="tabpanel">
                                    <div class="row">
                                        <table class="table table-bordered table-checkable">
                                            <thead>

                                                <tr>
                                                    <th>ID</th>
                                                    <th>بداية الفترة</th>
                                                    <th>نهاية الفترة</th>
                                                    <th>الحد الاقصي</th>
                                                    <th>عدد الطلبات</th>
                                                    <th>الحالة</th>
                                                    <th>تعديل</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($delivery_times as $delivery_time)
                                                    {{-- @if (in_array(5, $delivery_time->days)) --}}
                                                        <tr>
                                                            <td>{{ $delivery_time->id }}</td>
                                                            <td>{{ $delivery_time->start_time }}</td>
                                                            <td>{{ $delivery_time->end_time }}</td>

                                                            <td>{{ $delivery_time->capacity }}</td>
                                                            <td>{{ $delivery_time->consume }}</td>
                                                            <td>
                                                                <span
                                                                    class=" {{ in_array(5, $delivery_time->status) ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ in_array(5, $delivery_time->status) ? 'مفعل' : 'معطل' }}</span>
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.edit page="deliveryTime"
                                                                    id="editDeliveryTimekt55{{ $delivery_time->id }}"
                                                                    edittitle="تعديل التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.update', $delivery_time->id) : route('admin.delivery-time.update', $delivery_time->id) }}"
                                                                    method="PUT" :deliverytime="$delivery_time" />
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.delete page="deliveryTime"
                                                                    id="deleteDeliveryTimekt55{{ $delivery_time->id }}"
                                                                    deletetitle="حذف التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.destroy', $delivery_time->id) : route('admin.delivery-time.destroy', $delivery_time->id) }}"
                                                                    method="DELETE" :deliverytime="$delivery_time" />
                                                            </td>

                                                        </tr>
                                                    {{-- @endif --}}
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_tab_pane_66" role="tabpanel">
                                    <div class="row">
                                        <table class="table table-bordered table-checkable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>بداية الفترة</th>
                                                    <th>نهاية الفترة</th>
                                                    <th>الحد الاقصي</th>
                                                    <th>عدد الطلبات</th>
                                                    <th>الحالة</th>
                                                    <th>تعديل</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($delivery_times as $delivery_time)
                                                    {{-- @if (in_array(6, $delivery_time->days)) --}}
                                                        <tr>
                                                            <td>{{ $delivery_time->id }}</td>
                                                            <td>{{ $delivery_time->start_time }}</td>
                                                            <td>{{ $delivery_time->end_time }}</td>

                                                            <td>{{ $delivery_time->capacity }}</td>
                                                            <td>{{ $delivery_time->consume }}</td>
                                                            <td>
                                                                <span
                                                                    class=" {{ in_array(6, $delivery_time->status) ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ in_array(6, $delivery_time->status) ? 'مفعل' : 'معطل' }}</span>
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.edit page="deliveryTime"
                                                                    id="editDeliveryTimekt66{{ $delivery_time->id }}"
                                                                    edittitle="تعديل التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.update', $delivery_time->id) : route('admin.delivery-time.update', $delivery_time->id) }}"
                                                                    method="PUT" :deliverytime="$delivery_time" />
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.delete page="deliveryTime"
                                                                    id="deleteDeliveryTimekt66{{ $delivery_time->id }}"
                                                                    deletetitle="حذف التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.destroy', $delivery_time->id) : route('admin.delivery-time.destroy', $delivery_time->id) }}"
                                                                    method="DELETE" :deliverytime="$delivery_time" />
                                                            </td>

                                                        </tr>
                                                    {{-- @endif --}}
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_tab_pane_77" role="tabpanel">
                                    <div class="row">
                                        <table class="table table-bordered table-checkable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>بداية الفترة</th>
                                                    <th>نهاية الفترة</th>

                                                    <th>الحد الاقصي</th>
                                                    <th>عدد الطلبات</th>
                                                    <th>الحالة</th>
                                                    <th>تعديل</th>
                                                    <th>حذف</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($delivery_times as $delivery_time)
                                                    {{-- @if (in_array(2, $delivery_time->days)) --}}
                                                        <tr>
                                                            <td>{{ $delivery_time->id }}</td>
                                                            <td>{{ $delivery_time->start_time }}</td>
                                                            <td>{{ $delivery_time->end_time }}</td>

                                                            <td>{{ $delivery_time->capacity }}</td>
                                                            <td>{{ $delivery_time->consume }}</td>
                                                            <td>
                                                                <span
                                                                    class=" {{ in_array(7, $delivery_time->status) ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ in_array(7, $delivery_time->status) ? 'مفعل' : 'معطل' }}</span>
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.edit page="deliveryTime"
                                                                    id="editDeliveryTimekt77{{ $delivery_time->id }}"
                                                                    edittitle="تعديل التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.update', $delivery_time->id) : route('admin.delivery-time.update', $delivery_time->id) }}"
                                                                    method="PUT" :deliverytime="$delivery_time" />
                                                            </td>

                                                            <td>
                                                                <x-buttons.admin.delete page="deliveryTime"
                                                                    id="deleteDeliveryTimekt77{{ $delivery_time->id }}"
                                                                    deletetitle="حذف التوقيت {{ $delivery_time->id }}"
                                                                    action="{{ request()->is('manager/*') ? route('manager.delivery-time.destroy', $delivery_time->id) : route('admin.delivery-time.destroy', $delivery_time->id) }}"
                                                                    method="DELETE" :deliverytime="$delivery_time" />
                                                            </td>

                                                        </tr>
                                                    {{-- @endif --}}
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Card-->

                    <div class="modal fade" id="exampleModalSizeLg" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalSizeLg" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <form class="form" id="kt_form_1">
                                    <input type="hidden" name="_token"
                                        value="NrPzdHkIr9uencIrBGshCIkzkBluMBtIhgpEw7bt">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">جديد</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="text-right">الحد الاقصي</label>
                                                    <input type="number" class="form-control" name="capacity"
                                                        id="capacity" placeholder="الحد الاقصى للطلب">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="time_id" id="time_id" value="">
                                        <input type="hidden" name="button_action" id="button_action"
                                            value="insert">
                                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                            data-dismiss="modal">إغلاق</button>
                                        <button id="btn-action" type="submit"
                                            class="btn btn-primary font-weight-bold">إرسال</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--end::Dashboard-->
                </div>
                <!--end::Container-->
            </div>

        </div>
    </div>

    {{$delivery_times->links()}}
</x-layouts.app-layout>

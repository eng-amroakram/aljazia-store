<x-layouts.app-layout>



    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label font-size-h2"> <strong>مناديب المتاجر</strong></h3>
            </div>
            <div class="card-toolbar">
                <a class="btn btn-primary font-weight-bolder" href="{{ (request()->is('admin/*')) ? route('admin.deliverise.index') : route('manager.deliverise.index') }}">
                    <span class="svg-icon svg-icon-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><circle fill="#000000" cx="9" cy="15" r="6" /><path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" /> </g> </svg>
                    </span>رجوع
                </a>
            </div>

        </div>


        @foreach ($errors->all() as $error)
            <div class="alert">
                <small>{{ $error }}</small>
            </div>
        @endforeach

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

                <form action="{{ (request()->is('admin/*')) ? route('admin.deliveries.search') : route('manager.deliveries.search') }}" method="GET" class="form-inline">
                    <label class="font-size-h5" style="margin-left: 10px;"><strong>البحث</strong></label>
                    <input type="text" name="search" style="margin-left: 10px;" class="form-control">

                    {{-- multiple data-live-search="true" --}}
                    <label class="font-size-h6" style="margin-left: 10px;"><strong>فلتر البحث</strong></label>

                    <select class="selectpicker" name="filters[]" multiple>
                        <option value="name">حسب الاسم</option>
                        <option value="email">حسب البريد الالكتروني</option>
                        <option value="phone">حسب رقم الهاتف</option>
                        <option value="username">حسب اسم المستخدم</option>
                    </select>

                    <label class="font-size-h6" style="margin-left: 10px; margin-right: 10px;"><strong>نوع
                            الأدمن</strong></label>

                    <select class="selectpicker" name="roles[]" multiple>
                        <option value="superadmin">أدمن رئيسي</option>
                        <option value="admin">أدمن فرعي</option>
                    </select>


                    {{-- <label class="font-size-h6" style="margin-left: 10px; margin-right: 10px;"><strong>المتجر
                            المرتبط</strong></label>
                    <select class="selectpicker" name="stores[]" multiple>
                        <option value="null">لا يوجد</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->ar_name }}</option>
                        @endforeach
                    </select> --}}

                    <label class="font-size-h6" style="margin-left: 10px; margin-right: 10px;"><strong>حالة
                            الحساب</strong></label>
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
                            {{-- <th scope="col" style="font-weight: bold; text-align: center;">ID</th> --}}
                            <th scope="col" style="font-weight: bold; text-align: center;">الاسم</th>
                            {{-- <th scope="col" style="font-weight: bold; text-align: center;">اسم المستخدم</th> --}}
                            {{-- <th scope="col" style="font-weight: bold; text-align: center;">البريد الالكتروني</th> --}}
                            <th scope="col" style="font-weight: bold; text-align: center;">رقم الهاتف</th>
                            <th scope="col" style="font-weight: bold; text-align: center;">التقييم</th>
                            <th scope="col" style="font-weight: bold; text-align: center;">الطلبات</th>
                            <th scope="col" style="font-weight: bold; text-align: center;">المتاجر</th>
                            <th scope="col" style="font-weight: bold; text-align: center;">حالة الحساب</th>
                            {{-- <th scope="col" style="font-weight: bold; text-align: center;">الصلاحيات</th> --}}
                            {{-- <th scope="col" style="font-weight: bold; text-align: center;">التحكم</th> --}}
                            <th scope="col" style="font-weight: bold; text-align: center;">تعديل</th>
                            <th scope="col" style="font-weight: bold; text-align: center;">حذف</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($deliveries->count() > 0)
                            @foreach ($deliveries as $delivery)
                                <tr>
                                    {{-- <td>{{ $store_manager->id }}</td> --}}
                                    <td>{{ $delivery->name }}</td>
                                    <td>{{ $delivery->phone_number }}</td>
                                    <td>4/5</td>
                                    <td>4</td>
                                    <td>
                                        <select>
                                            @foreach ($delivery->stores as $store)
                                                <option>{{ $store->ar_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <span
                                            class=" {{ $delivery->status == 'active' ? 'label label-lg font-weight-bold label-light-primary label-inline' : 'label label-lg font-weight-bold label-light-danger label-inline' }} ">{{ $delivery->status == 'active' ? 'مفعل' : 'معطل' }}</span>
                                    </td>


                                    <td>
                                        <x-buttons.admin.restore page="delivery"
                                            id="restoreDelivery{{ $delivery->id }}"
                                            restoretitle="استراجاع الديلفري {{ $delivery->name }}"
                                            action="{{ (request()->is('admin/*')) ? route('admin.deliveries.restore', $delivery) : route('manager.deliveries.restore', $delivery) }}"
                                            method="PUT"  :delivery="$delivery" />
                                    </td>

                                    <td>
                                        <x-buttons.admin.force_delete page="delivery"
                                            id="forceDeleteDelivery{{ $delivery->id }}"
                                            forcedeletetitle="حذف الادمن {{ $delivery->name }} نهائيا"
                                            action="{{ (request()->is('admin/*')) ?  route('admin.deliveries.force-delete', $delivery) : route('manager.deliveries.force-delete', $delivery) }}"
                                            method="DELETE" :delivery="$delivery" />
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

    {{ $deliveries->links() }}
    {{-- {{ (!$superStoreManagers->count() && $storeManagers->links()) ? $storeManagers->links(): null  }} --}}

</x-layouts.app-layout>




<script>
    $('select').selectpicker();
</script>

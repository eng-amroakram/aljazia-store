<button data-toggle="modal" data-target="#restore_store_manager{{ $id }}" id="29"
    class="btn btn-sm btn-clean btn-icon mr-2 edit" title="استعادة">
    <span class="svg-icon svg-icon-md">
        <svg class="svg-icon" viewBox="0 0 20 20">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"></rect>
                <path fill="none"
                    d="M3.254,6.572c0.008,0.072,0.048,0.123,0.082,0.187c0.036,0.07,0.06,0.137,0.12,0.187C3.47,6.957,3.47,6.978,3.484,6.988c0.048,0.034,0.108,0.018,0.162,0.035c0.057,0.019,0.1,0.066,0.164,0.066c0.004,0,0.01,0,0.015,0l2.934-0.074c0.317-0.007,0.568-0.271,0.56-0.589C7.311,6.113,7.055,5.865,6.744,5.865c-0.005,0-0.01,0-0.015,0L5.074,5.907c2.146-2.118,5.604-2.634,7.971-1.007c2.775,1.912,3.48,5.726,1.57,8.501c-1.912,2.781-5.729,3.486-8.507,1.572c-0.259-0.18-0.618-0.119-0.799,0.146c-0.18,0.262-0.114,0.621,0.148,0.801c1.254,0.863,2.687,1.279,4.106,1.279c2.313,0,4.591-1.1,6.001-3.146c2.268-3.297,1.432-7.829-1.867-10.101c-2.781-1.913-6.816-1.36-9.351,1.058L4.309,3.567C4.303,3.252,4.036,3.069,3.72,3.007C3.402,3.015,3.151,3.279,3.16,3.597l0.075,2.932C3.234,6.547,3.251,6.556,3.254,6.572z">
                </path>
                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                    rx="1"></rect>
            </g>
        </svg>
    </span>
</button>



<div class="modal fade" id="restore_store_manager{{ $id }}" tabindex="-1" role="dialog"
    aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content text-left">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel"><strong>{{ $restoretitle }}</strong></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            @if ($page == 'admin')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة الادمن {{ $admin->name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif

            @if ($page == 'user')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة المستخدم {{ $user->name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif





            @if ($page == 'delivery')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة الديلفري
                                        {{ $delivery->name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif

            @if ($page == 'store')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة المتجر {{ $store->ar_name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif

            @if ($page == 'storeManager')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة المدير الفرعي
                                        {{ $manager->name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif

            @if ($page == 'superStoreManager')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة المدير الفرعي
                                        {{ $manager->name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif


            @if ($page == 'product')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة المنتج
                                        {{ $product->ar_name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif

            @if ($page == 'color')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة اللون
                                        {{ $color->name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif


            @if ($page == 'size')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة الحجم
                                        {{ $size->ar_name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif



            @if ($page == 'sliderOffer')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة الحجم
                                        {{ $slideroffer->name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif

            @if ($page == 'category')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة التصنيف الرئيسي
                                        {{ $category->ar_name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif


            @if ($page == 'subCategory')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة التصنيف الفرعي
                                        {{ $subcategory->ar_name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>
            @endif


            @if ($page == 'area')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة المنقطة
                                        {{ $area->ar_name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>

                </form>
            @endif



            @if ($page == 'message')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من استعادة المنقطة
                                        {{ $message->name }}؟
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد
                            الاسعادة</button>
                    </div>
                </form>

            @endif

        </div>
    </div>
</div>

<button data-toggle="modal" data-target="#force_delete_store_manager{{ $id }}" id="29"
    class="btn btn-sm btn-clean btn-icon mr-2 edit" title="حذف نهائي">
    <span class="svg-icon svg-icon-md">

        <svg class="svg-icon" viewBox="0 0 20 20">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"></rect>

                <path fill="none"
                    d="M18.693,3.338h-1.35l0.323-1.834c0.046-0.262-0.027-0.536-0.198-0.739c-0.173-0.206-0.428-0.325-0.695-0.325
            H3.434c-0.262,0-0.513,0.114-0.685,0.312c-0.173,0.197-0.25,0.46-0.215,0.721L2.79,3.338H1.307c-0.502,0-0.908,0.406-0.908,0.908
            c0,0.502,0.406,0.908,0.908,0.908h1.683l1.721,13.613c0.057,0.454,0.444,0.795,0.901,0.795h8.722c0.458,0,0.845-0.34,0.902-0.795
            l1.72-13.613h1.737c0.502,0,0.908-0.406,0.908-0.908C19.601,3.744,19.195,3.338,18.693,3.338z M15.69,2.255L15.5,3.334H4.623
            L4.476,2.255H15.69z M13.535,17.745H6.413L4.826,5.193H15.12L13.535,17.745z">
                </path>
                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                    rx="1"></rect>
            </g>
        </svg>
    </span>
</button>



<div class="modal fade" id="force_delete_store_manager{{ $id }}" tabindex="-1" role="dialog"
    aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content text-left">

            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel"><strong>{{ $forcedeletetitle }} </strong></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>


            @if ($page == 'admin')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف الأدمن بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif



            @if ($page == 'user')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف الحجم {{ $user->name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif




            @if ($page == 'delivery')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف الأدمن بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif

            @if ($page == 'store')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف المتجر بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif

            @if ($page == 'storeManager')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف المدير الفرعي {{ $manager->name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif

            @if ($page == 'superStoreManager')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف المدير الرئيسي
                                        {{ $manager->name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif



            @if ($page == 'product')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف المنتج {{ $product->ar_name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif

            @if ($page == 'color')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف اللون {{ $color->name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif


            @if ($page == 'size')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف الحجم {{ $size->ar_name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif



            @if ($page == 'sliderOffer')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف الحجم {{ $slideroffer->name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif


            @if ($page == 'category')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف التصنيف الرئيسي
                                        {{ $category->name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif


            @if ($page == 'subCategory')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف التصنيف الفرعي
                                        {{ $subcategory->name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif

            @if ($page == 'area')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف المنطقة {{ $area->ar_name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif


            @if ($page == 'message')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'DELETE')
                        @method('DELETE')
                    @endif

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        <strong>تحذير!</strong> هل أنت متأكد من حذف الرسالة {{ $message->name }}
                                        بشكل نهائي؟
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تأكيد الحذف
                            النهائي</button>
                    </div>

                </form>
            @endif




        </div>
    </div>
</div>

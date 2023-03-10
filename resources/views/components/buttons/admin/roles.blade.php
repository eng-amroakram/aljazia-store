<button data-toggle="modal" data-target="#{{ $id }}" id="29"
    class="btn btn-sm btn-clean btn-icon mr-2 edit" title="حذف">
    <span class="svg-icon svg-icon-primary svg-icon-2x">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
            viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"></rect>
                <path
                    d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                    fill="#000000" opacity="0.3"></path>
                <path
                    d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                    fill="#000000" opacity="0.3"></path>
                <path
                    d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                    fill="#000000" opacity="0.3"></path>
            </g>
        </svg>
    </span>
</button>



<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="edit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content text-left">
            <div class="modal-header">

                <h2 class="modal-title" id="exampleModalLabel"><strong>{{ $rolestitle }}</strong></h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            {{-- Admins Roles --}}
            @if ($page == 'admin')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">
{{--
                        <label class="checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="link_id_18" id="allroles"
                                value="تفعيل الكل">
                            <span></span>
                            <strong> تفعيل الكل </strong>
                        </label> --}}
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h3><strong>إدارة العضويات</strong></h3>
                            </div>
                        </div>

                        <div class="row">
                            @foreach (config('roles.admin.MembershipManagement') as $ability => $value)
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="checkbox-list">
                                            <label class="checkbox mb-2">
                                                <input type="checkbox" class="checkitem" name="MembershipManagements[]"
                                                    id="link_id_18" value="{{ $ability }}"
                                                    @if (in_array($ability, $admin->getRolesNames() ?? [])) checked @endif>
                                                <span></span>
                                                <strong> {{ $value }} </strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h3><strong>إدارة المتاجر</strong></h3>
                            </div>
                        </div>




                        <div class="row">
                            @foreach (config('roles.admin.StoreManagement') as $ability => $value)
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="checkbox-list">
                                            <label class="checkbox mb-2">
                                                <input type="checkbox" class="checkitem" name="StoreManagement[]"
                                                    id="link_id_18" value="{{ $ability }}"
                                                    @if (in_array($ability, $admin->getRolesNames() ?? [])) checked @endif>
                                                <span></span>
                                                <strong> {{ $value }} </strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h3><strong>إدارة الطلبات</strong></h3>
                            </div>
                        </div>

                        <div class="row">
                            @foreach (config('roles.admin.OrderManagement') as $ability => $value)
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="checkbox-list">
                                            <label class="checkbox mb-2">
                                                <input type="checkbox" class="checkitem" name="OrderManagement[]"
                                                    id="link_id_18" value="{{ $ability }}"
                                                    @if (in_array($ability, $admin->getRolesNames() ?? [])) checked @endif>
                                                <span></span>
                                                <strong> {{ $value }} </strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h3><strong>إدارة النظام</strong></h3>
                            </div>
                        </div>

                        <div class="row">
                            @foreach (config('roles.admin.SystemManagement') as $ability => $value)
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="checkbox-list">
                                            <label class="checkbox mb-2">
                                                <input type="checkbox" class="checkitem" name="SystemManagement[]"
                                                    id="link_id_18" value="{{ $ability }}"
                                                    @if (in_array($ability, $admin->getRolesNames() ?? [])) checked @endif>
                                                <span></span>
                                                <strong> {{ $value }} </strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تحديث
                            الصلاحيات</button>
                    </div>
                </form>
            @endif


            {{-- Admins Roles --}}
            @if ($page == 'storeManager')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h3><strong>إدارة العضويات</strong></h3>
                            </div>
                        </div>

                        <div class="row">
                            @foreach (config('roles.admin.MembershipManagement') as $ability => $value)
                                @if ($value == 'المناديب')
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="checkbox-list">
                                                <label class="checkbox mb-2">
                                                    <input type="checkbox" class="checkitem"
                                                        name="MembershipManagements[]" id="link_id_18"
                                                        value="{{ $ability }}"
                                                        @if (in_array($ability, $manager->getRolesNames() ?? [])) checked @endif>

                                                    <span></span>
                                                    <strong> {{ $value }} </strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>



                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h3><strong>إدارة المتاجر</strong></h3>
                            </div>
                        </div>


                        <div class="row">
                            @foreach (config('roles.admin.StoreManagement') as $ability => $value)
                                @if ($value == 'التصنيفات الرئيسية' || $value == 'التصنيفات الفرعية' || $value == 'المنتجات')
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="checkbox-list">
                                                <label class="checkbox mb-2">
                                                    <input type="checkbox" class="checkitem" name="StoreManagement[]"
                                                        id="link_id_18" value="{{ $ability }}"
                                                        @if (in_array($ability, $manager->getRolesNames() ?? [])) checked @endif>
                                                    <span></span>
                                                    <strong> {{ $value }} </strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>


                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <h3><strong>إدارة الطلبات</strong></h3>
                            </div>
                        </div>

                        <div class="row">
                            @foreach (config('roles.admin.OrderManagement') as $ability => $value)
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <div class="checkbox-list">
                                            <label class="checkbox mb-2">
                                                <input type="checkbox" class="checkitem" name="OrderManagement[]"
                                                    id="link_id_18" value="{{ $ability }}"
                                                    @if (in_array($ability, $manager->getRolesNames() ?? [])) checked @endif>
                                                <span></span>
                                                <strong> {{ $value }} </strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <h3><strong>إدارة النظام</strong></h3>
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach (config('roles.admin.SystemManagement') as $ability => $value)
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="checkbox-list">
                                                    <label class="checkbox mb-2">
                                                        <input type="checkbox" name="SystemManagement[]" id="link_id_18"
                                                            value="{{ $ability }}"
                                                            @if (in_array($ability, $admin->getRolesNames() ?? [])) checked @endif>
                                                        <span></span>
                                                        <strong> {{ $value }} </strong>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تحديث
                            الصلاحيات</button>
                    </div>
                </form>
            @endif

        </div>
    </div>
</div>




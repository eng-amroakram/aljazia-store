<button id="add_data" class="btn btn-sm btn-primary font-weight-bolder" data-toggle="modal"
    data-target="#{{ $id }}">
    <span class="svg-icon svg-icon-md">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
            viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24" />
                <circle fill="#000000" cx="9" cy="15" r="6" />
                <path
                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                    fill="#000000" opacity="0.3" />
            </g>
        </svg>
    </span>{{ $titlebutton }}
</button>



<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg  text-left" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>{{ $modeltitle }}</strong></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
            </div>


            {{-- Form Creating Admin --}}
            @if ($page == 'admin')
                <form action="{{ $action }}" method="{{ $method }}" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            {{-- Store Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم الادمن</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        name="name" id="name" placeholder="اسم أدمن النظام" />
                                </div>
                                @error('name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">البريد الالكتروني </label>
                                    <input type="text" class="form-control" value="{{ old('email') }}"
                                        name="email" id="email" placeholder="البريد الالكتروني" />
                                </div>
                                @error('email')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- User Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المستخدم</label>
                                    <input type="text" class="form-control" value="{{ old('username') }}"
                                        name="username" id="username" placeholder="اسم المستخدم" />
                                </div>
                                @error('username')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Phone Number --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">رقم الجوال </label>
                                    <input type="text" class="form-control" name="phone_number"
                                        value="{{ old('phone_number') }}" id="phone_number"
                                        placeholder="رقم الجوال" />
                                </div>
                                @error('phone_number')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Role Store Managers --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">نوع الأدمن</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="admin" selected>اختر نوع الأدمن</option>
                                        <option value="superadmin">أدمن رئيسي</option>
                                        <option value="admin">أدمن فرعي</option>
                                    </select>
                                </div>
                                @error('role')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Store Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة الحساب</label>
                                    <select class="form-control" name="status" id="status"
                                        value="{{ old('status') }}">
                                        <option value="" selected>اختار حالة المتجر</option>
                                        <option value="active">مفعل</option>
                                        <option value="inactive">غير مفعل</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Store Password --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">كلمة المرور</label>
                                    <input type="password" value="{{ old('password') }}" class="form-control"
                                        name="password" id="password" placeholder="كلمة المرور" autocomplete="off"
                                        readonly onfocus="this.removeAttribute('readonly');" />
                                </div>

                                @error('password')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Store Password Confirmation --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">تأكيد كلمة المرور</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" id="password"
                                        placeholder="تأكيد كلمة المرور" autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');" />
                                </div>
                                @error('password_confirmation')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">إضافة
                            مدير</button>
                    </div>
                </form>
            @endif


            {{-- Form Creating User --}}
            @if ($page == 'user')
                <form action="{{ $action }}" method="{{ $method }}" class="form" id="kt_form_1">

                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            {{-- Store Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الاسم</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        name="name" id="name" placeholder="اسم مستخدم الجديد" />
                                </div>
                                @error('name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">البريد الالكتروني </label>
                                    <input type="text" class="form-control" value="{{ old('email') }}"
                                        name="email" id="email" placeholder="البريد الالكتروني" />
                                </div>
                                @error('email')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- User Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المستخدم</label>
                                    <input type="text" class="form-control" value="{{ old('username') }}"
                                        name="username" id="username" placeholder="اسم المستخدم" />
                                </div>
                                @error('username')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Phone Number --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">رقم الجوال </label>
                                    <input type="text" class="form-control" name="phone_number"
                                        value="{{ old('phone_number') }}" id="phone_number"
                                        placeholder="رقم الجوال" />
                                </div>
                                @error('phone_number')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Role Store Managers --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">نوع الأدمن</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="user" selected>اختر نوع الأدمن</option>
                                        <option value="superuser">مستخدم رئيسي</option>
                                        <option value="user">مستخدم عادي</option>
                                    </select>
                                </div>
                                @error('role')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Store Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة الحساب</label>
                                    <select class="form-control" name="status" id="status"
                                        value="{{ old('status') }}">
                                        <option value="" selected>اختار حالة الحساب</option>
                                        <option value="active">مفعل</option>
                                        <option value="inactive">غير مفعل</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Store Password --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">كلمة المرور</label>
                                    <input type="password" value="{{ old('password') }}" class="form-control"
                                        name="password" id="password" placeholder="كلمة المرور" autocomplete="off"
                                        readonly onfocus="this.removeAttribute('readonly');" />
                                </div>

                                @error('password')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Store Password Confirmation --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">تأكيد كلمة المرور</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" id="password"
                                        placeholder="تأكيد كلمة المرور" autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');" />
                                </div>
                                @error('password_confirmation')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">إضافة مستخدم
                            جديد</button>
                    </div>
                </form>
            @endif

            {{-- Form Creating Delivery --}}
            @if ($page == 'delivery')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            {{-- Store Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الاسم</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        name="name" id="name" placeholder="اسم الديلفري" />
                                </div>
                                @error('name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Phone Number --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">رقم الجوال</label>
                                    <input type="text" class="form-control" name="phone_number"
                                        value="{{ old('phone_number') }}" id="phone_number"
                                        placeholder="ادخل رقم الجوال" />
                                </div>
                                @error('phone_number')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">البريد الالكتروني </label>
                                    <input type="text" class="form-control" value="{{ old('email') }}"
                                        name="email" id="email" placeholder="البريد الالكتروني" />
                                </div>
                                @error('email')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المتاجر</label>
                                    <select class="selectpicker form-control" name="stores[]" id="stores"
                                        multiple>
                                        {{-- <option value="null" selected>اختر المتاجر التابع لها</option> --}}
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->ar_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('stores')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة الحساب</label>
                                    <select class="form-control" name="status" id="status"
                                        value="{{ old('status') }}">
                                        <option value="" selected>اختار حالة الحساب</option>
                                        <option value="active">مفعل</option>
                                        <option value="inactive">غير مفعل</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Store Password --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">كلمة المرور</label>
                                    <input type="password" value="{{ old('password') }}" class="form-control"
                                        name="password" id="password" placeholder="كلمة المرور" autocomplete="off"
                                        readonly onfocus="this.removeAttribute('readonly');" />
                                </div>
                                @error('password')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Delviery Password Confirmation --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">تأكيد كلمة المرور</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" id="password"
                                        placeholder="تأكيد كلمة المرور" autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');" />
                                </div>
                                @error('password_confirmation')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">إضافة
                            ديلفري</button>
                    </div>
                </form>
            @endif

            {{-- Form Creating storeManager --}}
            @if ($page == 'storeManager')
                <form action="{{ $action }}" method="{{ $method }}" class="form" id="kt_form_1">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            {{-- Store Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم مدير المتجر</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        name="name" id="name" placeholder="اسم مدير المتجر" />
                                </div>
                                @error('name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Role Store Managers --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">نوع المدير</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="manager" selected>اختر نوع المدير</option>
                                        <option value="supermanager">مدير رئيسي</option>
                                        <option value="manager">مدير فرعي</option>
                                    </select>
                                </div>
                                @error('role')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Email --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">البريد الالكتروني </label>
                                    <input type="text" class="form-control" value="{{ old('email') }}"
                                        name="email" id="email" placeholder="البريد الالكتروني" />
                                </div>
                                @error('email')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Phone Number --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">رقم الموبايل </label>
                                    <input type="text" class="form-control" name="phone_number"
                                        value="{{ old('phone_number') }}" id="phone_number"
                                        placeholder="رقم الموبايل" />
                                </div>

                                @error('phone_number')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>

                            {{-- Store Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة الحساب</label>
                                    <select class="form-control" name="status" id="status"
                                        value="{{ old('status') }}">
                                        <option value="" selected>اختار حالة المتجر</option>
                                        <option value="active">مفعل</option>
                                        <option value="inactive">غير مفعل</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Avaliable Stores --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المتاجر</label>
                                    <select class="form-control" name="store_id" id="store_id">
                                        <option value="none">اختر المتجر</option>
                                        @if ($stores->count())
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->ar_name }}</option>
                                            @endforeach
                                        @else
                                            <option value="none">لا يوجد متاجر حاليا</option>
                                        @endif
                                    </select>
                                </div>
                                @error('store_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Store Password --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">كلمة المرور</label>
                                    <input type="password" value="{{ old('password') }}" class="form-control"
                                        name="password" id="password" placeholder="كلمة المرور" autocomplete="off"
                                        readonly onfocus="this.removeAttribute('readonly');" />
                                </div>
                                @error('password')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">إضافة
                            مدير</button>
                    </div>
                </form>
            @endif

            {{-- Form Creating Store --}}
            @if ($page == 'store')
                <form action="{{ $action }}" method="{{ $method }}" class="form" id="kt_form_1"
                    files="true" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            {{-- Store Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">إسم المتجر باللغة العربية</label>
                                    <input type="text" class="form-control" value="{{ old('ar_name') }}"
                                        name="ar_name" id="name_ar" placeholder="إسم المتجر باللغة العربية" />
                                </div>
                                @error('ar_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Store English Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">إسم المتجر باللغة الإنجليزية </label>
                                    <input type="text" class="form-control" value="{{ old('en_name') }}"
                                        name="en_name" id="en_name" placeholder="إسم المتجر باللغة الإنجليزية" />
                                </div>

                                @error('en_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>

                            {{-- Phone Number --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">رقم الموبايل </label>
                                    <input type="text" class="form-control" name="phone_number"
                                        value="{{ old('phone_number') }}" id="phone_number"
                                        placeholder="رقم الموبايل" />
                                </div>

                                @error('phone_number')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>

                            {{-- Email --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">البريد الالكتروني </label>
                                    <input type="text" class="form-control" value="{{ old('email') }}"
                                        name="email" id="email" placeholder="البريد الالكتروني" />
                                </div>

                                @error('email')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>

                            {{-- @dd($managers); --}}

                            {{-- Avaliable Store Managers --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">مدير المتجر</label>
                                    <select class="form-control" name="super_store_manager_id"
                                        id="super_store_manager_id">

                                        <option value="null">اختر مدير المتجر</option>

                                        @if ($managers->count() > 0)
                                            @foreach ($managers as $manager)
                                                @if (!$manager->store_id)
                                                    <option value="{{ $manager->id }}">{{ $manager->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="null">لا يوجد مدراء حاليا</option>
                                        @endif

                                    </select>
                                </div>
                                @error('super_store_manager_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Avaliable Store Deliveries --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">أيام عمل المتجر</label>
                                    <select class="form-control selectpicker" name="days[]" id="days" multiple>
                                        @foreach (config('store.days') as $key => $day)
                                            <option value="{{ $key }}">{{ $day }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('days')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Avaliable Store Deliveries --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">فترات التوصيل</label>
                                    <select class="selectpicker form-control" name="delivery_times[]"
                                        id="delivery_times" value="{{ old('delivery_times') }}" multiple>
                                        @foreach ($deliverytimes as $deliverytime)
                                            <option value="{{ $deliverytime->id }}">
                                                {{ "$deliverytime->start_time" }} {{ "$deliverytime->end_time" }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('delivery_times')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Min Order --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الحد الأدنى للتوصيل</label>
                                    <input type="number" class="form-control" value="{{ old('min_order') }}"
                                        name="min_order" id="min_order" placeholder="الحد الأدنى للتوصيل" />
                                </div>
                                @error('min_order')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Tax Number --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الرقم الضريبي</label>
                                    <input type="text" class="form-control" value="{{ old('tax_number') }}"
                                        name="tax_number" id="vat_number" placeholder="الرقم الضريبي للمتجر" />
                                </div>
                                @error('tax_number')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>

                            {{-- Store Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة المتجر</label>
                                    <select class="form-control" name="status" value="{{ old('status') }}"
                                        id="status">
                                        <option value="" selected>اختار حالة المتجر</option>
                                        <option value="active">مفعل</option>
                                        <option value="inactive">غير مفعل</option>
                                    </select>
                                </div>

                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>

                            {{-- Store Password --}}
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">كلمة المرور</label>
                                    <input type="password" value="{{ old('password') }}" class="form-control"
                                        name="password" id="password" placeholder="كلمة المرور" autocomplete="off"
                                        readonly onfocus="this.removeAttribute('readonly');" />
                                </div>

                                @error('password')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div> --}}

                            {{-- Store Password Confirmation --}}
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">تأكيد كلمة المرور</label>
                                    <input type="password" class="form-control"
                                        value="{{ old('password_confirmation') }}" name="password_confirmation"
                                        id="password" placeholder="تأكيد كلمة المرور" autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');" />
                                </div>

                                @error('password_confirmation')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div> --}}

                            {{-- Store Logo Image --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الصورة </label>
                                    <input type="file" class="form-control" value="{{ old('image') }}"
                                        name="image" id="image">
                                </div>
                                @error('image')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                                <div id="div_pict" style="display: none;">
                                    <div class="form-group text-center">
                                        <label
                                            style="display: block; padding: 8px 15px; background-color: #f1f1f1; color: #121212; text-align: center;">الصورة
                                            الحالية</label>
                                        <img class="profile-pic pic1" id="pict" style="height: 75px;width: 75px"
                                            src="{{ asset('/images/16031246665f8dbdbadeaca.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إرسال</button>
                    </div>
                </form>
            @endif

            {{-- Form Creating Product --}}
            @if ($page == 'product')
                <form action="{{ $action }}" method="{{ $method }}" class="form" id="kt_form_1"
                    files="true" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body field_wrapper">



                        <div class="row">
                            <div class="col-lg-6">
                                <h6><strong>اختر تصنيف المنتج</strong></h6>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Product Stores --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">التصنيف الرئيسي</label>
                                    <select class="form-control selectpicker" name="category_id"
                                        value="{{ old('category_id') }}" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->ar_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Stores --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">التصنيف الفرعي</label>
                                    <select class="form-control selectpicker" name="sub_category_id"
                                        value="{{ old('sub_category_id') }}" id="sub_category_id">
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}"> {{ $subcategory->ar_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('sub_category_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-6">
                                <h6><strong>إضافة وصف المنتج بالعربية</strong></h6>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="ar_description" id="ar_description" placeholder="" rows="2"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <h6><strong>إضافة وصف المنتج بالانجليزية</strong></h6>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="en_description" id="en_description" placeholder="" rows="2"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <h6><strong>اختر اسم المنتج</strong></h6>
                            </div>
                        </div>

                        <div class="row">

                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المنتج بالعربية</label>
                                    <input type="text" class="form-control" value="{{ old('ar_name') }}"
                                        name="ar_name" id="name_ar" placeholder="إسم المتجر باللغة العربية" />
                                </div>
                                @error('ar_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product English Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المنتج بالانجليزية</label>
                                    <input type="text" class="form-control" value="{{ old('en_name') }}"
                                        name="en_name" id="en_name" placeholder="إسم المتجر باللغة الإنجليزية" />
                                </div>

                                @error('en_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <h6><strong>اختيار المتجر</strong></h6>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Product Stores --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المتجر</label>
                                    <select class="form-control selectpicker" name="store_id"
                                        value="{{ old('store_id') }}" id="store_id">
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->ar_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('store_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <h6><strong>إضافة مواصفات المنتج</strong></h6>
                            </div>
                        </div>


                        <div class="row">

                            {{-- Product Color --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">ألوان المنتج</label>
                                    <select class="form-control selectpicker" name="color_id"
                                        value="{{ old('color_id') }}" id="color_id">
                                        @if ($colors->count() > 0)
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">الألون غير متوفرة</option>
                                        @endif
                                    </select>
                                </div>
                                @error('color_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Product Sizes --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">أحجام المنتج</label>
                                    <select class="form-control selectpicker" name="size_id"
                                        value="{{ old('size_id') }}" id="size_id">
                                        @if ($sizes->count() > 0)
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->ar_name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">الأحجام غير متوفرة</option>
                                        @endif

                                    </select>
                                </div>
                                @error('size_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Prices --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">السعر</label>
                                    <input type="text" class="form-control" value="{{ old('price') }}"
                                        name="price" id="price" placeholder="السعر" />
                                </div>
                                @error('price')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Discount Price --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الخصم</label>
                                    <input type="text" class="form-control" value="{{ old('discount') }}"
                                        name="discount" id="discount" placeholder="الخصم" />
                                </div>
                                @error('discount')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة المنتج</label>
                                    <select class="form-control" name="status" value="{{ old('status') }}"
                                        id="status">
                                        <option value="" selected>اختار حالة المتجر</option>
                                        <option value="active">مفعل</option>
                                        <option value="inactive">غير مفعل</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Store Logo Image --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الصورة </label>
                                    <input type="file" class="form-control" value="{{ old('image') }}"
                                        name="image" id="image">
                                </div>
                                @error('image')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                                <div id="div_pict" style="display: none;">
                                    <div class="form-group text-center">
                                        <label
                                            style="display: block; padding: 8px 15px; background-color: #f1f1f1; color: #121212; text-align: center;">الصورة
                                            الحالية</label>
                                        <img class="profile-pic pic1" id="pict" style="height: 75px;width: 75px"
                                            src="{{ asset('/images/16031246665f8dbdbadeaca.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="text-right">الصور </label>
                                    <input type="file" class="form-control" value="{{ old('images') }}"
                                        name="images[]" id="image" multiple>
                                </div>

                                @error('images')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div> --}}

                        </div>





                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إرسال</button>
                    </div>
                </form>
            @endif

            {{-- Form Creating Attribute --}}
            @if ($page == 'attribute')


                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1" files="true"
                    enctype="multipart/form-data">

                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="modal-body">

                        <div class="row">
                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المنتج بالعربية</label>
                                    <input type="text" class="form-control" value="{{ $product->ar_name }}"
                                        name="ar_name" id="name_ar" placeholder="إسم المنتج باللغة العربية" />
                                </div>
                                @error('ar_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product English Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المنتج بالانجليزية</label>
                                    <input type="text" class="form-control" value="{{ $product->en_name }}"
                                        name="en_name" id="en_name" placeholder="إسم المنتج باللغة الإنجليزية" />
                                </div>

                                @error('en_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Color --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right"> اختيار لون المنتج</label>
                                    <select class="form-control selectpicker" name="color_id"
                                        value="{{ old('color_id') }}" id="color_id">
                                        @if ($colors->count() > 0)
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">الألون غير متوفرة</option>
                                        @endif
                                    </select>
                                </div>
                                @error('color_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Product Sizes --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حجم المنتج</label>
                                    <select class="form-control selectpicker" name="size_id"
                                        value="{{ old('size_id') }}" id="size_id">
                                        @if ($sizes->count() > 0)
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->ar_name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">الأحجام غير متوفرة</option>
                                        @endif

                                    </select>
                                </div>
                                @error('size_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Prices --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">السعر</label>
                                    <input type="text" class="form-control" value="{{ old('price') }}"
                                        name="price" id="price" placeholder="السعر" />
                                </div>
                                @error('price')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Discount Price --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الخصم</label>
                                    <input type="text" class="form-control" value="{{ old('discount') }}"
                                        name="discount" id="discount" placeholder="الخصم" />
                                </div>
                                @error('discount')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة المنتج</label>
                                    <select class="form-control" name="status" value="{{ old('status') }}"
                                        id="status">
                                        <option value="" selected>اختار حالة المتجر</option>
                                        <option value="active">مفعل</option>
                                        <option value="inactive">غير مفعل</option>
                                    </select>
                                </div>

                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Store Logo Image --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الصورة </label>
                                    <input type="file" class="form-control" value="{{ old('image') }}"
                                        name="image" id="image">
                                </div>

                                @error('image')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                                <div id="div_pict" style="display: none;">
                                    <div class="form-group text-center">
                                        <label
                                            style="display: block; padding: 8px 15px; background-color: #f1f1f1; color: #121212; text-align: center;">الصورة
                                            الحالية</label>
                                        <img class="profile-pic pic1" id="pict" style="height: 75px;width: 75px"
                                            src="{{ asset('storage') }}" alt="">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إرسال</button>
                    </div>
                </form>ب
            @endif

            {{-- Form Creating Color --}}
            @if ($page == 'color')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            {{-- Product Arabic Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم اللون</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        name="name" id="name" placeholder="ادخل اسم اللون" />
                                </div>
                                @error('name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product English Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">درجة اللون</label>
                                    <input type="color" class="form-control" value="{{ old('color') }}"
                                        name="color" id="color" placeholder="color" />
                                </div>
                                @error('color')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إرسال</button>
                    </div>
                </form>
            @endif

            {{-- Form Creating Size --}}
            @if ($page == 'size')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            {{-- Product Arabic Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم الحجم بالعربية</label>
                                    <input type="text" class="form-control" value="{{ old('ar_name') }}"
                                        name="ar_name" id="ar_name" placeholder="ادخل الحجم باللغة العربية" />
                                </div>
                                @error('ar_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product English Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم الحجم بالانجليزية</label>
                                    <input type="text" class="form-control" value="{{ old('en_name') }}"
                                        name="en_name" id="en_name" placeholder="ادخل الحجم باللغة الانجليزية" />
                                </div>
                                @error('en_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>
                </form>
            @endif

            {{-- Form Creating Offer --}}
            @if ($page == 'offer')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            {{-- Product Arabic Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم الحجم بالعربية</label>
                                    <input type="text" class="form-control" value="{{ old('ar_name') }}"
                                        name="ar_name" id="ar_name" placeholder="ادخل الحجم باللغة العربية" />
                                </div>
                                @error('ar_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product English Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم الحجم بالانجليزية</label>
                                    <input type="text" class="form-control" value="{{ old('en_name') }}"
                                        name="en_name" id="en_name" placeholder="ادخل الحجم باللغة الانجليزية" />
                                </div>
                                @error('en_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>
                </form>
            @endif

            {{-- Form Creating Slider Offer --}}

            @if ($page == 'sliderOffer')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1" files="true"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">


                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم العرض</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        name="name" id="name" placeholder="ادخل الحجم باللغة العربية" />
                                </div>
                                @error('name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Store Logo Image --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">صورة العرض </label>
                                    <input type="file" class="form-control" value="{{ old('image') }}"
                                        name="image" id="image">
                                </div>
                                @error('image')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                                <div id="div_pict" style="display: none;">
                                    <div class="form-group text-center">
                                        <label
                                            style="display: block; padding: 8px 15px; background-color: #f1f1f1; color: #121212; text-align: center;">الصورة
                                            الحالية</label>
                                        <img class="profile-pic pic1" id="pict" style="height: 75px;width: 75px"
                                            src="{{ asset('/images/16031246665f8dbdbadeaca.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                            {{-- Store Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة العرض</label>
                                    <select class="form-control" name="status" value="{{ old('status') }}"
                                        id="status">
                                        <option value="" selected>اختار حالة العرض</option>
                                        <option value="active">مفعل</option>
                                        <option value="inactive">غير مفعل</option>
                                    </select>
                                </div>

                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>
                </form>
            @endif


            {{-- Form Creating Category --}}

            @if ($page == 'category')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1" files="true"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المتاجر</label>
                                    <select class="selectpicker form-control" name="store_id" id="store_id">
                                        {{-- <option value="null" selected>اختر المتاجر التابع لها</option> --}}
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->ar_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('store_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Category Type --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">نوع التصنيف</label>
                                    <select class="form-control" name="category_type"
                                        value="{{ old('category_type') }}" id="category_type">
                                        <option value="sell">بيع</option>
                                        <option value="borrow">استعارة</option>
                                    </select>
                                </div>

                                @error('category_type')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Rank Category --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">ترتيب التصنيف</label>
                                    <input type="number" class="form-control" value="{{ old('ranking') }}"
                                        name="ranking" id="ranking" placeholder="ادخل ترتيب التصنيف" />
                                </div>
                                @error('ranking')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم التصنيف بالعربية</label>
                                    <input type="text" class="form-control" value="{{ old('ar_name') }}"
                                        name="ar_name" id="ar_name" placeholder="ادخل الاسم باللغة العربية" />
                                </div>
                                @error('ar_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم التصنيف بالانجليزية</label>
                                    <input type="text" class="form-control" value="{{ old('en_name') }}"
                                        name="en_name" id="en_name"
                                        placeholder="ادخل الاسم باللغة الانجليزية" />
                                </div>
                                @error('en_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Category Type --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة التصنيف</label>
                                    <select class="form-control" name="status" value="{{ old('status') }}"
                                        id="status">
                                        <option value="active">مفعل</option>
                                        <option value="inactive">معطل</option>
                                    </select>
                                </div>

                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Store Logo Image --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">صورة العرض </label>
                                    <input type="file" class="form-control" value="{{ old('image') }}"
                                        name="image" id="image">
                                </div>
                                @error('image')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                                <div id="div_pict" style="display: none;">
                                    <div class="form-group text-center">
                                        <label
                                            style="display: block; padding: 8px 15px; background-color: #f1f1f1; color: #121212; text-align: center;">الصورة
                                            الحالية</label>
                                        <img class="profile-pic pic1" id="pict"
                                            style="height: 75px;width: 75px"
                                            src="{{ asset('/images/16031246665f8dbdbadeaca.jpg') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>
                </form>
            @endif

            {{-- Form Creating SubCategory --}}

            @if ($page == 'subCategory')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1"
                    files="true" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            {{-- Category --}}
                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label class="text-right">التصنيف الرئيسي</label>

                                    <select class="form-control" name="category_id"
                                        value="{{ old('category_id') }}" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->ar_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                @error('category_id')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم التصنيف بالعربية</label>
                                    <input type="text" class="form-control" value="{{ old('ar_name') }}"
                                        name="ar_name" id="ar_name" placeholder="ادخل الاسم باللغة العربية" />
                                </div>
                                @error('ar_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم التصنيف بالانجليزية</label>
                                    <input type="text" class="form-control" value="{{ old('en_name') }}"
                                        name="en_name" id="en_name"
                                        placeholder="ادخل الاسم باللغة الانجليزية" />
                                </div>
                                @error('en_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Rank Category --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">ترتيب التصنيف</label>
                                    <input type="number" class="form-control" value="{{ old('ranking') }}"
                                        name="ranking" id="ranking" placeholder="ادخل ترتيب التصنيف" />
                                </div>
                                @error('ranking')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Category Type --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة التصنيف</label>
                                    <select class="form-control" name="status" value="{{ old('status') }}"
                                        id="status">
                                        <option value="active">مفعل</option>
                                        <option value="inactive">معطل</option>
                                    </select>
                                </div>

                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>
                </form>
            @endif

            @if ($page == 'area')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1"
                    files="true" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            {{-- Area Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المنطقة بالعربية</label>
                                    <input type="text" class="form-control" value="{{ old('ar_name') }}"
                                        name="ar_name" id="ar_name" placeholder="ادخل الاسم باللغة العربية" />
                                </div>
                                @error('ar_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المنطقة بالانجليزية</label>
                                    <input type="text" class="form-control" value="{{ old('en_name') }}"
                                        name="en_name" id="en_name"
                                        placeholder="ادخل الاسم باللغة الانجليزية" />
                                </div>
                                @error('en_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Delvier Price --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">سعر التوصيل</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('delivery_price') }}" name="delivery_price"
                                        id="delivery_price" placeholder="ادخل سعر التوصيل" />
                                </div>
                                @error('delivery_price')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة المنطقة</label>
                                    <select class="form-control" name="status" value="{{ old('status') }}"
                                        id="status">
                                        <option value="active">مفعل</option>
                                        <option value="inactive">معطل</option>
                                    </select>
                                </div>

                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>
                </form>
            @endif


            @if ($page == 'staticPage')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1"
                    files="true" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            {{-- Area Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم الصفحة بالعربية</label>
                                    <input type="text" class="form-control" value="{{ old('ar_name') }}"
                                        name="ar_name" id="ar_name" placeholder="ادخل الاسم باللغة العربية" />
                                </div>
                                @error('ar_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Arabic Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم الصفحة بالانجليزية</label>
                                    <input type="text" class="form-control" value="{{ old('en_name') }}"
                                        name="en_name" id="en_name"
                                        placeholder="ادخل الاسم باللغة الانجليزية" />
                                </div>
                                @error('en_name')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Arabic Name --}}
                            {{-- Arabic Page Details --}}

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-right">التفاصيل بالعربية</label>
                                    <textarea class="form-control" name="ar_description" id="ar_description"
                                        placeholder="ادخل التفاصيل باللغة العربية">{{ old('ar_description') }}</textarea>
                                </div>
                                @error('ar_description')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Arabic Page Details --}}
                            {{-- English Page Details --}}

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-right">التفاصيل بالانجليزية</label>
                                    <textarea class="form-control" name="en_description" id="en_description"
                                        placeholder="ادخل التفاصيل باللغة الانجليزية">{{ old('en_description') }}</textarea>
                                </div>
                                @error('en_description')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Page Link --}}

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-right">الرابط</label>
                                    <input type="text" class="form-control" value="{{ old('link') }}"
                                        name="link" id="link" placeholder="ادخل الرابط" />
                                </div>
                                @error('link')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>

                </form>
            @endif

            @if ($page == 'deliveryTime')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            {{-- Area Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">بداية الفترة</label>
                                    <input type="time" class="form-control" value="{{ old('start_time') }}"
                                        name="start_time" id="start_time" />
                                </div>
                                @error('start_time')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">نهاية الفترة</label>
                                    <input type="time" class="form-control" value="{{ old('end_time') }}"
                                        name="end_time" id="end_time" />
                                </div>
                                @error('end_time')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Delvier Price --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">سعر التوصيل</label>
                                    <input type="text" class="form-control" value="{{ old('price') }}"
                                        name="price" id="price" placeholder="ادخل سعر التوصيل" />
                                </div>
                                @error('price')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">أيام التوصيل</label>
                                    <select class="form-control selectpicker" name="days[]" id="days"
                                        multiple>
                                        @foreach (config('store.days') as $key => $day)
                                            <option value="{{ $key }}">{{ $day }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('days')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Delvier Price --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الحد الاقصى للطلبات</label>
                                    <input type="number" class="form-control" value="{{ old('capacity') }}"
                                        name="capacity" id="capacity" placeholder="ادخل سعر التوصيل" />
                                </div>
                                @error('capacity')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة التوقيت</label>
                                    <select class="form-control" name="status" value="{{ old('status') }}"
                                        id="status">
                                        <option value="active">مفعل</option>
                                        <option value="inactive">معطل</option>
                                    </select>
                                </div>

                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div> --}}

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>
                </form>
            @endif


            @if ($page == 'programPoints')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            {{-- Area Arabic Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">قيمة المشتريات</label>
                                    <input type="number" class="form-control"
                                        value="{{ old('purchase_value') }}" name="purchase_value"
                                        id="purchase_value" />
                                </div>
                                @error('purchase_value')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">النقاط المكتسبة</label>
                                    <input type="number" class="form-control"
                                        value="{{ old('points_earned') }}" name="points_earned"
                                        id="points_earned" />
                                </div>
                                @error('points_earned')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Delvier Price --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الحد الأدنى للتحويل</label>
                                    <input type="number" class="form-control"
                                        value="{{ old('minimum_number_of_points_to_transfer') }}"
                                        name="minimum_number_of_points_to_transfer"
                                        id="minimum_number_of_points_to_transfer" placeholder="ادخل سعر التوصيل" />
                                </div>
                                @error('minimum_number_of_points_to_transfer')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Area Delvier Price --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المقابل المادي للتحويل</label>
                                    <input type="number" class="form-control"
                                        value="{{ old('transfer_fee') }}" name="transfer_fee"
                                        id="transfer_fee" placeholder="ادخل سعر التوصيل" />
                                </div>
                                @error('transfer_fee')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>
                </form>
            @endif

            @if ($page == 'wallet')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">نوع الحركة</label>
                                    <select class="form-control selectpicker" name="type" id="type">
                                        <option value="withdrawal">سحب</option>
                                        <option value="deposit">إيداع</option>
                                    </select>
                                </div>
                                @error('type')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الرصيد</label>
                                    <input type="number" class="form-control" value="{{ $wallet->balance }}"
                                        name="amount" id="amount" placeholder="ادخل سعر التوصيل" />
                                </div>

                                @error('amount')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">إضافة</button>
                    </div>

                </form>
            @endif


        </div>
    </div>
</div>

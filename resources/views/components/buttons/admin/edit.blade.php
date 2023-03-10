<button data-toggle="modal" data-target="#{{ $id }}" id="29"
    class="btn btn-sm btn-clean btn-icon mr-2 edit" title="تعديل">
    <span class="svg-icon svg-icon-md">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
            viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"></rect>
                <path
                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                    fill="#000000" fill-rule="nonzero"
                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                </path>
                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                    rx="1"></rect>
            </g>
        </svg>
    </span>
</button>


<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content text-left">

            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel"><strong>{{ $edittitle }}</strong></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            {{-- Form Editing Admin --}}
            @if ($page == 'admin')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">
                        <div class="row">

                            {{-- Store Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الاسم</label>
                                    <input type="text" class="form-control" value="{{ $admin->name }}"
                                        name="name" id="name" placeholder="اسم مدير المتجر" />
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
                                    <input type="text" class="form-control" value="{{ $admin->email }}"
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
                                    <input type="text" class="form-control" value="{{ $admin->username }}"
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
                                        value="{{ $admin->phone_number }}" id="phone_number"
                                        placeholder="رقم الموبايل" />
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
                                    <label class="text-right">نوع الادمن</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="superadmin" @if ($admin->role == 'superadmin') selected @endif>
                                            مدير
                                            رئيسي</option>
                                        <option value="admin" @if ($admin->role == 'admin') selected @endif>مدير
                                            فرعي
                                        </option>
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
                                    <select class="form-control" name="status" id="status">
                                        <option value="active" @if ($admin->status == 'active') selected @endif>مفعل
                                        </option>
                                        <option value="inactive" @if ($admin->status == 'inactive') selected @endif>غير
                                            مفعل
                                        </option>
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
                                    <input type="password" value="{{ $admin->password }}" class="form-control"
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
                                    <input type="password" class="form-control" value="{{ $admin->password }}"
                                        name="password_confirmation" id="password" placeholder="تأكيد كلمة المرور"
                                        autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
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
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">تعديل</button>
                    </div>
                </form>
            @endif

            {{-- Form Editing User --}}
            @if ($page == 'user')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif
                    <div class="modal-body">
                        <div class="row">

                            {{-- Store Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الاسم</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}"
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
                                    <input type="text" class="form-control" value="{{ $user->email }}"
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
                                    <input type="text" class="form-control" value="{{ $user->username }}"
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
                                        value="{{ $user->phone_number }}" id="phone_number"
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
                                        <option value="superuser" @if ($user->role == 'superuser') selected @endif>
                                            مستخدم رئيسي</option>
                                        <option value="user" @if ($user->role == 'user') selected @endif>مستخدم
                                            عادي</option>
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
                                        <option value="active" @if ($user->status == 'active') selected @endif>مفعل
                                        </option>
                                        <option value="inactive" @if ($user->status == 'inactive') selected @endif>غير
                                            مفعل</option>
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
                                    <input type="password" value="{{ $user->password }}" class="form-control"
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
                                        value="{{ $user->password }}" id="password"
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
                        <button id="btn-action" type="submit" class="btn btn-primary font-weight-bold">تعديل مستخدم
                            جديد</button>
                    </div>
                </form>
            @endif


            {{-- Form Editing Delivery --}}
            @if ($page == 'delivery')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">
                        <div class="row">

                            {{-- Delivery  Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">الاسم</label>
                                    <input type="text" class="form-control" value="{{ $delivery->name }}"
                                        name="name" id="name" placeholder="اسم مدير المتجر" />
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
                                        value="{{ $delivery->phone_number }}" id="phone_number"
                                        placeholder="البريد الالكتروني" />
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
                                    <input type="text" class="form-control" value="{{ $delivery->email }}"
                                        name="email" id="email" placeholder="البريد الالكتروني" />
                                </div>
                                @error('email')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- @dd($delivery->stores, $stores) --}}
                            {{-- Delivery Stores --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المتاجر</label>
                                    <select class="selectpicker form-control" name="stores[]" id="stores" multiple>
                                        {{-- <option value="null" selected>اختر المتاجر التابع لها</option> --}}

                                        @foreach ($stores as $store)
                                            @if (!$delivery->stores->count())
                                                <option value="{{ $store->id }}">{{ $store->ar_name }}</option>
                                            @endif
                                            @foreach ($delivery->stores as $delivery_store)
                                                <option value="{{ $store->id }}"
                                                    @if ($delivery_store->id == $store->id) selected @endif>
                                                    {{ $store->ar_name }}</option>
                                            @endforeach
                                        @endforeach

                                    </select>
                                </div>
                                @error('stores')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            {{-- Delivery Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة الحساب</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="active" selected>اختار حالة المتجر</option>
                                        <option value="active"@if ($delivery->status == 'active') selected @endif>مفعل
                                        </option>
                                        <option value="inactive"@if ($delivery->status == 'inactive') selected @endif>غير
                                            مفعل</option>
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
                                    <input type="password" value="{{ $delivery->password }}" class="form-control"
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
                                        value="{{ $delivery->password_confirmation }}" id="password"
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
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">تعديل</button>
                    </div>
                </form>
            @endif

            {{-- Form Editing Store Manager --}}
            @if ($page == 'storeManager')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">
                    @csrf
                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">
                        <div class="row">

                            {{-- Store Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم مدير المتجر</label>
                                    <input type="text" class="form-control" value="{{ $manager->name }}"
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
                                        <option value="supermanager"
                                            @if ($manager->role == 'supermanager') selected @endif>مدير
                                            رئيسي</option>
                                        <option value="manager" @if ($manager->role == 'manager') selected @endif>
                                            مدير
                                            فرعي
                                        </option>
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
                                    <input type="text" class="form-control" value="{{ $manager->email }}"
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
                                        value="{{ $manager->phone_number }}" id="phone_number"
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
                                    <select class="form-control" name="status" id="status">
                                        <option value="active" @if ($manager->status == 'active') selected @endif>مفعل
                                        </option>
                                        <option value="inactive" @if ($manager->status == 'inactive') selected @endif>
                                            غير مفعل
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>

                            {{-- Stores Selection --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المتاجر</label>
                                    <select class="form-control" name="store_id" id="store_id">
                                        <option value="none">اختر المتجر</option>
                                        @if ($stores->count())
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}"
                                                    @if ($manager->store_id == $store->id) selected @endif>
                                                    {{ $store->ar_name }}
                                                </option>
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
                                    <input type="password" value="{{ $manager->password }}" class="form-control"
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
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">تعديل</button>
                    </div>
                </form>
            @endif

            {{-- Form Editing Super Store Manager --}}
            @if ($page == 'superStoreManager')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf
                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif
                    {{-- <input type="hidden" name="id" value="{{$manager->id}}"> --}}
                    <div class="modal-body">

                        <div class="row">

                            {{-- Store Arabic Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم مدير المتجر</label>
                                    <input type="text" class="form-control" value="{{ $manager->name }}"
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
                                        <option value="supermanager"
                                            @if ($manager->role == 'supermanager') selected @endif>مدير
                                            رئيسي</option>
                                        <option value="manager" @if ($manager->role == 'manager') selected @endif>
                                            مدير فرعي
                                        </option>
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
                                    <input type="text" class="form-control" value="{{ $manager->email }}"
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
                                        value="{{ $manager->phone_number }}" id="phone_number"
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
                                    <select class="form-control" name="status" id="status">
                                        <option value="active" @if ($manager->status == 'active') selected @endif>مفعل
                                        </option>
                                        <option value="inactive" @if ($manager->status == 'inactive') selected @endif>
                                            غير مفعل
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>

                            {{-- Stores Selection --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المتاجر</label>
                                    <select class="form-control" name="store_id" id="store_id">
                                        <option value="none">اختر المتجر</option>
                                        @if ($stores->count())
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}"
                                                    @if ($manager->store_id == $store->id) selected @endif>
                                                    {{ $store->ar_name }}
                                                </option>
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
                                    <input type="password" value="{{ $manager->password }}" class="form-control"
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
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">تعديل</button>
                    </div>
                </form>
            @endif

            {{-- Form Editing Store --}}
            @if ($page == 'store')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1" files="true"
                    enctype="multipart/form-data">
                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">
                        <div class="row">

                            {{-- Store Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">إسم المتجر باللغة العربية</label>
                                    <input type="text" class="form-control" value="{{ $store->ar_name }}"
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
                                    <input type="text" class="form-control" value="{{ $store->en_name }}"
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
                                        value="{{ $store->phone_number }}" id="phone_number"
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
                                    <input type="text" class="form-control" value="{{ $store->email }}"
                                        name="email" id="email" placeholder="البريد الالكتروني" />
                                </div>

                                @error('email')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            {{-- Avaliable Store Managers --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">مدير المتجر</label>
                                    <select class="form-control" name="store_manager_id" id="store_manager_id">
                                        <option value="null">اختر مدير المتجر</option>

                                        @if ($managers->count())
                                            @foreach ($managers as $manager)
                                                @if ($manager->store_id == $store->id)
                                                    <option value="{{ $manager->id }}" selected>
                                                        {{ $manager->name }} </option>
                                                @endif
                                                @if (!$manager->store_id)
                                                    <option value="{{ $manager->id }}"
                                                        @if ($manager->store_id == $store->id) selected @endif>
                                                        {{ $manager->name }} </option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="null">لا يوجد مدراء حاليا</option>
                                        @endif

                                    </select>
                                </div>
                                @error('store_manager_id')
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
                                            <option value="{{ $key }}"
                                                @if (in_array($key, $store->days_of_work ?? [])) selected @endif>
                                                {{ $day }}
                                            </option>
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
                                            <option value="{{ $deliverytime->id }}"
                                                @if ($deliverytime->stores->contains($store->id)) selected @endif>
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
                                    <input type="number" class="form-control" value="{{ $store->min_order }}"
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
                                    <input type="text" class="form-control" value="{{ $store->tax_number }}"
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
                                    <select class="form-control" name="status" id="status">
                                        <option value="active" @if ($store->status == 'active') selected @endif>مفعل
                                        </option>
                                        <option value="inactive" @if ($store->status == 'inactive') selected @endif>
                                            غير مفعل</option>
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
                                    <input type="password" value="{{ Crypt::decryptString($store->password) }}"
                                        class="form-control" name="password" id="password"
                                        placeholder="كلمة المرور" autocomplete="off" readonly
                                        onfocus="this.removeAttribute('readonly');" />
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
                                        value="{{ Crypt::decryptString($store->password) }}"
                                        name="password_confirmation" id="password" placeholder="تأكيد كلمة المرور"
                                        autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
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
                                    <input type="hidden" name="image_path" value="{{ $store->image }}">
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                @error('image')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                                <div id="div_pict">
                                    <div class="form-group text-center">
                                        <label
                                            style="display: block; padding: 8px 15px; background-color: #f1f1f1; color: #121212; text-align: center;">الصورة
                                            الحالية</label>
                                        <img class="profile-pic pic1" id="pict" style="height: 75px;width: 75px"
                                            src="{{ asset('storage') . $store->image }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">تعديل</button>
                    </div>
                </form>
            @endif

            {{-- Form Editing Product --}}
            @if ($page == 'product')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1" files="true"
                    enctype="multipart/form-data">
                    <input type="hidden" name="product" value="{{ $product->id }}">
                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">



                        <div class="row">
                            <div class="col-lg-6">
                                <h6><strong>تعديل اسم المنتج</strong></h6>
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
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == $product->category_id) selected @endif>
                                                {{ $category->ar_name }}</option>
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
                                            <option value="{{ $subcategory->id }}"
                                                @if ($subcategory->id == $product->sub_category_id) selected @endif>
                                                {{ $subcategory->ar_name }}</option>
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
                                <h6><strong>تعديل وصف المنتج بالعربية</strong></h6>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="ar_description" id="ar_description" placeholder="" rows="2">{{ $product->ar_description }}</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <h6><strong>تعديل وصف المنتج بالانجليزية</strong></h6>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="en_description" id="en_description" placeholder="" rows="2">{{ $product->en_description }}</textarea>
                                </div>
                            </div>
                        </div>


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

                            {{-- Product Stores --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المتجر</label>
                                    <select class="form-control selectpicker" name="store_id"
                                        value="{{ old('store_id') }}" id="store_id">
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}"
                                                @if ($store->id == $product->store_id) selected @endif>
                                                {{ $store->ar_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('store_id')
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
                                        <option value="active" @if ($product->status == 'active') selected @endif>مفعل
                                        </option>
                                        <option value="inactive" @if ($product->status == 'inactive') selected @endif>
                                            غير مفعل</option>
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
                            class="btn btn-primary font-weight-bold">إرسال</button>
                    </div>
                </form>
            @endif

            {{-- Form Editing Attribute --}}
            @if ($page == 'attribute')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1" files="true"
                    enctype="multipart/form-data">
                    <input type="hidden" name="attr_id" value="{{ $attr->id }}">
                    <input type="hidden" name="store_id" value="{{ $product->store->id ?? null }}">

                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">

                        <div class="row">

                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المنتج بالعربية</label>
                                    <input type="text" class="form-control" value="{{ $attr->ar_name }}"
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
                                    <input type="text" class="form-control" value="{{ $attr->en_name }}"
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
                                    <label class="text-right">ألوان المنتج</label>
                                    <select class="form-control selectpicker" name="color_id"
                                        value="{{ old('color_id') }}" id="color_id">
                                        @if ($colors->count() > 0)
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}"
                                                    @if ($attr->color_id == $color->id) seleted @endif>
                                                    {{ $color->name }}
                                                </option>
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
                                                <option value="{{ $size->id }}"
                                                    @if ($attr->size_id == $size->id) seleted @endif>
                                                    {{ $size->ar_name }}
                                                </option>
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
                                    <input type="text" class="form-control" value="{{ $attr->price }}"
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
                                    <input type="text" class="form-control" value="{{ $attr->discount }}"
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
                                        <option value="active" @if ($attr->status == 'active') selected @endif>مفعل
                                        </option>
                                        <option value="inactive" @if ($attr->status == 'inactive') selected @endif>
                                            غير مفعل
                                        </option>
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
                                    <input type="hidden" name="image_path" value="{{ $attr->image }}">
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
                                            src="{{ asset('storage') . $attr->image }}" alt="">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">تعديل</button>
                    </div>
                </form>
            @endif


            @if ($page == 'color')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">
                        <div class="row">

                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم اللون</label>
                                    <input type="text" class="form-control" value="{{ $color->name }}"
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
                                    <input type="color" class="form-control" value="{{ $color->color }}"
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

            @if ($page == 'size')

                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">

                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">

                        <div class="row">

                            {{-- Product Arabic Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم الحجم بالعربية</label>
                                    <input type="text" class="form-control" value="{{ $size->ar_name }}"
                                        name="ar_name" id="ar_name" placeholder="اسم الحجم بالعربية" />
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
                                    <input type="text" class="form-control" value="{{ $size->en_name }}"
                                        name="en_name" id="en_name" placeholder="اسم الحجم بالانجليزية" />
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
                            class="btn btn-primary font-weight-bold">تعديل</button>
                    </div>
                </form>
            @endif


            {{-- Form Editing Slider Offer --}}

            @if ($page == 'sliderOffer')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1" files="true"
                    enctype="multipart/form-data">

                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">

                        <div class="row">


                            {{-- Product Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم العرض</label>
                                    <input type="text" class="form-control" value="{{ $slideroffer->name }}"
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
                                    <input type="hidden" name="image_path" value="{{ $slideroffer->image }}">
                                    <input type="file" class="form-control" value="{{ $slideroffer->image }}"
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
                                            src="{{ storage_path('app/public') . $slideroffer->name }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                            {{-- Store Status --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">حالة العرض</label>
                                    <select class="form-control" name="status"
                                        value="{{ $slideroffer->status }}" id="status">
                                        <option value="" selected>اختار حالة العرض</option>
                                        <option value="active" @if ($slideroffer->status == 'active') selected @endif>مفعل
                                        </option>
                                        <option value="inactive" @if ($slideroffer->status == 'inactive') selected @endif>
                                            غير مفعل</option>
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

            {{-- Form Editing Category --}}
            @if ($page == 'category')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1" files="true"
                    enctype="multipart/form-data">

                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">

                        <div class="row">


                            {{-- Delivery Stores --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">المتاجر</label>
                                    <select class="selectpicker form-control" name="store_id" id="store_id"
                                        multiple>
                                        {{-- <option value="null" selected>اختر المتاجر التابع لها</option> --}}
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}"
                                                @if ($category->store_id == $store->id) selected @endif>
                                                {{ $store->ar_name }}</option>
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
                                    <input type="number" class="form-control" value="{{ $category->ranking }}"
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
                                    <input type="text" class="form-control"
                                        value="{{ $category->ar_name }}" name="ar_name" id="ar_name"
                                        placeholder="ادخل الاسم باللغة العربية" />
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
                                    <input type="text" class="form-control"
                                        value="{{ $category->en_name }}" name="en_name" id="en_name"
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
                                        <option value="active" @if ($category->status == 'active') selected @endif>
                                            مفعل
                                        </option>
                                        <option value="inactive" @if ($category->status == 'inactive') selected @endif>
                                            معطل</option>
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
                                    <input type="hidden" name="image_path" value="{{ $category->image }}">
                                    <input type="file" class="form-control" value="{{ $category->image }}"
                                        name="image" id="image">
                                </div>
                                @error('image')
                                    <div>
                                        <small class="text-danger">{{ $message }}</small>
                                    </div>
                                @enderror

                                <div id="div_pict">
                                    <div class="form-group text-center">
                                        <label
                                            style="display: block; padding: 8px 15px; background-color: #f1f1f1; color: #121212; text-align: center;">الصورة
                                            الحالية</label>
                                        <img class="profile-pic pic1" id="pict"
                                            style="height: 75px;width: 75px"
                                            src="{{ asset('storage/' . $category->image) }}" />

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">إغلاق</button>
                        <button id="btn-action" type="submit"
                            class="btn btn-primary font-weight-bold">تعديل</button>
                    </div>
                </form>
            @endif


            {{-- Form Editing Sub Category --}}
            @if ($page == 'subCategory')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1"
                    files="true" enctype="multipart/form-data">

                    @csrf

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">

                        <div class="row">

                            {{-- Category --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">التصنيف الرئيسي</label>
                                    <select class="form-control" name="category_id"
                                        value="{{ old('category_id') }}" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($subcategory->category_id == $category->id) selected @endif>
                                                {{ $category->ar_name }}</option>
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
                                    <input type="text" class="form-control"
                                        value="{{ $subcategory->ar_name }}" name="ar_name" id="ar_name"
                                        placeholder="ادخل الاسم باللغة العربية" />
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
                                    <input type="text" class="form-control"
                                        value="{{ $subcategory->en_name }}" name="en_name" id="en_name"
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
                                    <input type="number" class="form-control"
                                        value="{{ $subcategory->ranking }}" name="ranking" id="ranking"
                                        placeholder="ادخل ترتيب التصنيف" />
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
                                        <option value="active" @if ($subcategory->status == 'active') selected @endif>
                                            مفعل
                                        </option>
                                        <option value="inactive" @if ($subcategory->status == 'inactive') selected @endif>
                                            معطل</option>
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
                            class="btn btn-primary font-weight-bold">تعديل</button>
                    </div>
                </form>
            @endif


            @if ($page == 'area')
                <form action="{{ $action }}" method="POST" class="form" id="kt_form_1">[]
                    @csrf
                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">
                        <div class="row">

                            {{-- Area Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">اسم المنطقة بالعربية</label>
                                    <input type="text" class="form-control" value="{{ $area->ar_name }}"
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
                                    <input type="text" class="form-control" value="{{ $area->en_name }}"
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
                                        value="{{ $area->delivery_price }}" name="delivery_price"
                                        id="delivery_price" placeholder="ادخل الاسم باللغة الانجليزية" />
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
                                        <option value="active" @if ($area->status == 'active') selected @endif>
                                            مفعل
                                        </option>
                                        <option value="inactive" @if ($area->status == 'inactive') selected @endif>
                                            معطل</option>
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
                                    <input type="text" class="form-control"
                                        value="{{ $staticpage->ar_name }}" name="ar_name" id="ar_name"
                                        placeholder="ادخل الاسم باللغة العربية" />
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
                                    <input type="text" class="form-control"
                                        value="{{ $staticpage->en_name }}" name="en_name" id="en_name"
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
                                        placeholder="ادخل التفاصيل باللغة العربية">{{ $staticpage->ar_description }}</textarea>
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
                                        placeholder="ادخل التفاصيل باللغة الانجليزية">{{ $staticpage->en_description }}</textarea>
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
                                    <input type="text" class="form-control" value="{{ $staticpage->link }}"
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

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">

                        {{-- @dd(date('H:i', strtotime("03:00 PM")) , date("h:i", strtotime($deliverytime->start_time))) --}}
                        <div class="row">
                            {{-- Area Arabic Name --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">بداية الفترة</label>
                                    <input type="time" class="form-control"
                                        value="{{ date('H:i', strtotime($deliverytime->start_time)) }}"
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
                                    <input type="time" class="form-control"
                                        value="{{ date('H:i', strtotime($deliverytime->end_time)) }}"
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
                                    <input type="text" class="form-control"
                                        value="{{ $deliverytime->price }}" name="price" id="price"
                                        placeholder="ادخل سعر التوصيل" />
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
                                            <option
                                                value="{{ $key }}"@if (in_array($key, $deliverytime->days ?? [])) selected @endif>
                                                {{ $day }}</option>
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
                                    <input type="number" class="form-control"
                                        value="{{ $deliverytime->capacity }}" name="capacity" id="capacity"
                                        placeholder="ادخل سعر التوصيل" />
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
                                    <select class="form-control" name="status"
                                        value="{{ $deliverytime->status }}" id="status">
                                        <option value="active" @if ($deliverytime->status == 'active') selected @endif>
                                            مفعل</option>
                                        <option value="inactive" @if ($deliverytime->status == 'inactive') selected @endif>
                                            معطل</option>
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

                    @if ($method == 'PUT')
                        @method('PUT')
                    @endif

                    <div class="modal-body">

                        {{-- @dd(date('H:i', strtotime("03:00 PM")) , date("h:i", strtotime($deliverytime->start_time))) --}}

                        <div class="row">
                            {{-- Area Arabic Name --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-right">قيمة المشتريات</label>
                                    <input type="number" class="form-control"
                                        value="{{ $programpoint->purchase_value }}" name="purchase_value"
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
                                        value="{{ $programpoint->points_earned }}" name="points_earned"
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
                                        value="{{ $programpoint->minimum_number_of_points_to_transfer }}"
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
                                        value="{{ $programpoint->transfer_fee }}" name="transfer_fee"
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

        </div>
    </div>
</div>

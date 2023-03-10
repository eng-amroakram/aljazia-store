<x-layouts.app-layout>

    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">
                <h1 class="card-label"><strong>الإعدادات</strong></h1>
            </div>

            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Dashboard-->
                    <div class="card card-custom">

                        <div class="card-header card-header-tabs-line">
                            <div class="card-title">
                                <h3 class="card-label">الاعدادات</h3>
                            </div>
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_1_2">البيانات
                                            العامة</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_2">روابط
                                            التطبيقات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_2_1">ثوابت النظام</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_2">بيانات التواصل</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_4_2">السوشيال
                                            ميديا</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{route('admin.settings.update', $settings->id)}}" method="POST" id="kt_form_1">
                                @csrf
                                @method('PUT')
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="kt_tab_pane_1_2" role="tabpanel">
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="text-right">رابط الموقع</label>
                                                    <input value="{{$settings->website_link}}" type="url"
                                                        class="form-control" name="website_link" id="website_link"
                                                        placeholder="رابط الموقع">
                                                </div>
                                            </div>

                                            <div class="col-lg-8">

                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">التفاصيل بالإنجليزية</label>
                                                    <textarea class="form-control" name="en_decription" id="en_decription" placeholder="" rows="5">{{$settings->en_decription}} </textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">التفاصيل بالعربية</label>
                                                    <textarea class="form-control" name="ar_decription" id="ar_decription" placeholder="" rows="5">{{$settings->ar_decription}} </textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">العنوان بالعربية</label>
                                                    <input
                                                        value="{{$settings->ar_address}}"
                                                        type="text" class="form-control" name="ar_address"
                                                        id="ar_address" placeholder="إسم التطبيق بالعربية">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">العنوان بالانجليزية</label>
                                                    <input value="{{$settings->en_address}}" type="text" class="form-control"
                                                        name="en_address" id="en_address"
                                                        placeholder="اسم التطبيق بالانجليزية">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_tab_pane_2_2" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">رابط تطبيق iOS</label>
                                                    <input value="{{$settings->ios_link}}" type="url"
                                                        class="form-control" name="ios_link" id="ios_link"
                                                        placeholder="رابط تطبيق iOS">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">رابط تطبيق الأندرويد</label>
                                                    <input value="{{$settings->android_link}}" type="url"
                                                        class="form-control" name="android_link" id="android_link"
                                                        placeholder="رابط تطبيق الأندرويد">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_tab_pane_2_2_1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="text-right">قيمة الضريبة </label>
                                                    <input value="{{$settings->vat}}" type="number" class="form-control"
                                                        name="vat" id="vat" placeholder="قيمة الضريبة">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_tab_pane_3_2" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="text-right">بريد الإدارة</label>
                                                    <input value="{{$settings->email_manager}}" type="text"
                                                        class="form-control" name="email_manager" id="email_manager"
                                                        placeholder="بريد الإدارة">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">الموبايل</label>
                                                    <input value="{{$settings->mobile}}" type="text" class="form-control"
                                                        name="mobile" id="mobile" placeholder="الموبايل">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">الهاتف</label>
                                                    <input value="{{$settings->telephone}}" type="text" class="form-control"
                                                        name="telephone" id="telephone" placeholder="الهاتف">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active show" id="kt_tab_pane_4_2" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">فيسبوك</label>
                                                    <input value="{{$settings->facebook}}" type="url"
                                                        class="form-control" name="facebook" id="facebook"
                                                        placeholder="فيسبوك">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">تويتر</label>
                                                    <input value="{{$settings->twitter}}" type="url"
                                                        class="form-control" name="twitter" id="twitter"
                                                        placeholder="تويتر">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">انستجرام</label>
                                                    <input value="{{$settings->instagram}}" type="url"
                                                        class="form-control" name="instagram" id="instagram"
                                                        placeholder="انستجرام">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="text-right">يوتيوب</label>
                                                    <input value="{{$settings->youtube}}" type="url"
                                                        class="form-control" name="youtube" id="youtube"
                                                        placeholder="يوتيوب">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center text-center">
                                    <div class="col-lg-9">
                                        <button id="btn-action" type="submit"
                                            class="btn btn-primary font-weight-bold">حفظ</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app-layout>

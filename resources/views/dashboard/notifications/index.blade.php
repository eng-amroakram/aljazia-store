<x-layouts.app-layout>

    <link rel="stylesheet" href="dist/tagify.css">

    <div class="card card-custom gutter-b">

        <div class="d-flex flex-column-fluid">
            <div class="container-fluid">
                <div class="card card-custom">

                    <div class="card-header card-header-tabs-line">

                        <div class="card-title">
                            <h3 class="card-label">الاشعارات</h3>
                        </div>

                        <div class="card-toolbar">

                            <ul class="nav nav-tabs nav-bold nav-tabs-line">

                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_2">جميع
                                        المستخدمين</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_2">مستخدم واحد</a>
                                </li>

                            </ul>
                        </div>

                    </div>


                    <div class="card-body">
                        <div class="tab-content" data-select2-id="7">
                            <div class="tab-pane fade active show" id="kt_tab_pane_1_2" role="tabpanel">
                                <form action="{{route('admin.notifications-collection.store')}}" class="form-horizontal" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="text-right">عنوان الاشعار</label>
                                                <input value="" type="text" class="form-control" id="title"
                                                    name="title" placeholder="عنوان الاشعار">
                                            </div>
                                        </div>
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="text-right">نص الاشعار</label>
                                                <textarea class="form-control" name="description" id="description" placeholder="" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4"></div>
                                    </div>
                                    <div class="row justify-content-center text-center">
                                        <div class="col-lg-9">
                                            <button type="submit"
                                                class="btn btn-primary font-weight-bold mr-2">إرسال</button>
                                        </div>
                                    </div>
                                </form>
                            </div>



                            <div class="tab-pane fade" id="kt_tab_pane_2_2" role="tabpanel"
                                data-select2-id="kt_tab_pane_2_2">
                                <form action="{{route('admin.notifications.store')}}" class="form-horizontal" method="POST"
                                    data-select2-id="6">
                                    @csrf

                                    <div class="row">

                                        <div class="col-lg-4"></div>

                                        <div class="col-lg-4" data-select2-id="5">

                                            <div class="form-group" data-select2-id="4">

                                                <label class="text-right">رقم الجوال</label>

                                                <select class="form-control" name="user_id" id="user_id">
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}" data-select2-id="2">
                                                            {{ $user->phone_number }} </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                        </div>


                                        <div class="col-lg-4"></div>

                                        <div class="col-lg-4"></div>


                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="text-right">عنوان الاشعار</label>
                                                <input value="" type="text" class="form-control" id="title"
                                                    name="title" placeholder="عنوان الاشعار">
                                            </div>
                                        </div>

                                        <div class="col-lg-4"></div>

                                        <div class="col-lg-4"></div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="text-right">نص الاشعار</label>
                                                <textarea class="form-control" name="description" id="text" placeholder="" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-4"></div>

                                    </div>

                                    <div class="row justify-content-center text-center">
                                        <div class="col-lg-9">
                                            <button type="submit"
                                                class="btn btn-primary font-weight-bold mr-2">إرسال</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app-layout>

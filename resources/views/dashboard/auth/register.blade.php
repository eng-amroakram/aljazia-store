<x-layouts.dashboard-auth-layout>

    <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
        <!--begin::Content body-->
        <div class="d-flex flex-column-fluid flex-center">
            <!--begin::Signin-->
            <div class="login-form login-signin">
                <!--begin::Form-->
                <form method="POST" action="{{route('admin.auth.register')}}" class="form" novalidate="novalidate">
                    @csrf
                    <!--begin::Title-->
                    <div class="pb-13 pt-lg-0 pt-5 text-center">
                        <img src="{{ asset('assets/images/jaziah.png') }}" alt="الجازية" class="img-fluid mb-3" style="max-height: 70px" />
                        <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">مرحباً بالجازية</h3>
                    </div>

                        @if(Session::has('error-login'))
                            <span class="invalid-feedback" role="alert"><strong>{{ Session::get('error-login') }}</strong></span>
                        @endif

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">الاسم رباعي</label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="off" autofocus/>
                        @error('name')
                            <small class="invalid-feedback text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">اسم المستخدم</label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username') }}" required autocomplete="off" autofocus/>
                        @error('username')
                            <small class="invalid-feedback text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">البريد الإلكتروني</label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="off" autofocus/>
                        @error('email')
                            <small class="invalid-feedback text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between mt-n5">
                            <label class="font-size-h6 font-weight-bolder text-dark pt-5">كلمة المرور</label>
                        </div>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('password') is-invalid @enderror" type="password" name="password" id="password" required autocomplete="off" />
                        @error('password')
                            <small class="invalid-feedback text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between mt-n5">
                            <label class="font-size-h6 font-weight-bolder text-dark pt-5">تأكيد كلمة السر</label>
                        </div>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation" required autocomplete="off" />
                        @error('password_confirmation')
                            <small class="invalid-feedback text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>

                    <a href="{{ route('admin.auth.login') }}" class="forgot-pass"> <strong>اذا كان لديك حساب سابق </strong>قم بتسجيل الدخول</a>

                    <div class="pb-lg-0 pb-5">
                        <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 btn-block">تسجيل</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-layouts.dashboard-auth-layout>

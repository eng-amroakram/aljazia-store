<x-layouts.dashboard-auth-layout>


    <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
        <div class="d-flex flex-column-fluid flex-center">
            <div class="login-form login-signin">
                <form method="POST" action="{{route('manager.auth.login')}}" class="form" novalidate="novalidate">
                    @csrf

                    <div class="pb-13 pt-lg-0 pt-5 text-center">
                        <img src="{{ asset('assets/images/jaziah.png') }}" alt="الجازية" class="img-fluid mb-3" style="max-height: 70px" />
                        <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">مرحباً بالجازية</h3>
                    </div>

                        @if(Session::has('error-login'))
                            <span class="invalid-feedback" role="alert"><strong>{{ Session::get('error-login') }}</strong></span>
                        @endif

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
                    <a href="{{ route('store-manager.auth.password.request') }}" class="forgot-pass">هل نسيت كلمة السر</a><br>
                    {{-- <a href="{{ route('admin.auth.register') }}" class="forgot-pass">سجل حساب جديد</a> --}}
                    <div class="pb-lg-0 pb-5">
                        <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 btn-block">تسجيل الدخول</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-layouts.dashboard-auth-layout>

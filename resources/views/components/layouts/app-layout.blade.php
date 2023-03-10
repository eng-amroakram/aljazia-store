<!DOCTYPE html>
<html direction="rtl" dir="rtl" lang="ar" style="direction: rtl">
<!--begin::Head-->
@include('partials.head')
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile">
    <!--begin::Logo-->
    <a href="/">
        <img alt="Logo" src="{{ asset('assets/images/jaziah.png') }}" class="logo-default max-h-30px"/>
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle"><span></span></button>
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left d-flex aside-fixed" id="kt_aside">
            <!--begin::Primary-->
            <!--end::Primary-->
        @include('partials.primarysidebar')
            <!--begin::Secondary-->
        @include('partials.secondsidebar')
            <!--end::Secondary-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                @include('partials.breadcrumb')
                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Dashboard-->
                    {{$slot}}
                    <!--end::Dashboard-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <!--doc: add "bg-white" class to have footer with solod background color-->
            @include('partials.footer')
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::User Panel-->
@include('partials.profile')
<!-- end::User Panel-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
    <span class="svg-icon">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
             height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
                <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                      fill="#000000" fill-rule="nonzero"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>
</div>
<!--end::Scrolltop-->
<!--begin::Script-->
@include('partials.script')



<!--end::Script-->
</body>
</html>

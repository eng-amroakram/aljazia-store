<head>
    <base href="">
    <meta charset="utf-8" />
    {{-- {{ $title }} --}}
    <title>الجازية | مول</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet" type="text/css" />

    {{-- <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script> --}}

    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/widgets.js') }}"></script>

    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="shortcut icon" href="{{ asset('assets/images/jaziah.png') }}" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.3.3/css/searchBuilder.jqueryui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">



    <style>
        @yield('css')
    </style>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('ga4.id') }}"></script> --}}
    {{-- <script> --}}
    {{-- window.dataLayer = window.dataLayer || []; --}}
    {{-- function gtag(){dataLayer.push(arguments);} --}}
    {{-- gtag('js', new Date()); --}}

    {{-- gtag('config', '{{ config('ga4.id') }}'); --}}
    {{-- </script> --}}


</head>

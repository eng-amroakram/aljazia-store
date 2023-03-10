<button class="btn btn-sm btn-clean btn-icon mr-2 show-details" id="4394" data-toggle="modal"
    data-target="#{{ $id }}">
    <span class="svg-icon svg-icon-danger svg-icon-2x" data-toggle="tooltip" data-placement="top" title="عرض">
        <i class="flaticon-eye icon-md text-primary"></i>
    </span>
</button>



<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content text-left">

            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel"><strong>تفاصيل طلب {{ $order->user->name }}</strong>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <div class="modal-body">

                {{-- Order Number --}}
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">
                            <span class="svg-icon svg-icon-warning mr-5">
                                <span class="svg-icon svg-icon-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                fill="#000000"></path>
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                x="16.3255682" y="2.94551858" width="3" height="18"
                                                rx="1"></rect>
                                        </g>
                                    </svg>
                                </span>
                            </span>

                            <div class="d-flex flex-column flex-grow-1 mr-2">
                                <a href="#"
                                    class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">رقم
                                    الطلب</a>
                            </div>

                            <span class="font-weight-bolder text-warning py-1"
                                style="font-size: 22px;">{{ $order->id }} </span>
                        </div>
                    </div>
                </div>


                <div class="card-title text-center">
                    <h3 class="card-label font-weight-bold">بيانات صاحب الطلب
                    </h3>
                </div>


                <div class="row">
                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path
                                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">اسم صاحب الطلب</span>
                            <span
                                class="text-dark text-hover-primary mb-1 font-size-lg">{{ $order->user->name }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24">
                                            </rect>
                                            <path
                                                d="M11.914857,14.1427403 L14.1188827,11.9387145 C14.7276032,11.329994 14.8785122,10.4000511 14.4935235,9.63007378 L14.3686433,9.38031323 C13.9836546,8.61033591 14.1345636,7.680393 14.7432841,7.07167248 L17.4760882,4.33886839 C17.6713503,4.14360624 17.9879328,4.14360624 18.183195,4.33886839 C18.2211956,4.37686904 18.2528214,4.42074752 18.2768552,4.46881498 L19.3808309,6.67676638 C20.2253855,8.3658756 19.8943345,10.4059034 18.5589765,11.7412615 L12.560151,17.740087 C11.1066115,19.1936265 8.95659008,19.7011777 7.00646221,19.0511351 L4.5919826,18.2463085 C4.33001094,18.1589846 4.18843095,17.8758246 4.27575484,17.613853 C4.30030124,17.5402138 4.34165566,17.4733009 4.39654309,17.4184135 L7.04781491,14.7671417 C7.65653544,14.1584211 8.58647835,14.0075122 9.35645567,14.3925008 L9.60621621,14.5173811 C10.3761935,14.9023698 11.3061364,14.7514608 11.914857,14.1427403 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">رقم الجوال</span>
                            <span
                                class="text-dark text-hover-primary mb-1 font-size-lg">{{ $order->user->phone_number }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24">
                                            </rect>
                                            <path
                                                d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">العنوان</span>
                            <span href="#"
                                class="text-dark text-hover-primary mb-1 font-size-lg">{{ $order->address->description }}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24">
                                            </rect>
                                            <path
                                                d="M7.14319965,19.3575259 C7.67122143,19.7615175 8.25104409,20.1012165 8.87097532,20.3649307 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 L7.14319965,19.3575259 Z M15.1367085,20.3616573 C15.756345,20.0972995 16.3358198,19.7569961 16.8634386,19.3524415 L17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L15.1367085,20.3616573 Z"
                                                fill="#000000"></path>
                                            <path
                                                d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z M19.068812,3.25407593 L20.8181344,5.00339833 C21.4039208,5.58918477 21.4039208,6.53893224 20.8181344,7.12471868 C20.2323479,7.71050512 19.2826005,7.71050512 18.696814,7.12471868 L16.9474916,5.37539627 C16.3617052,4.78960984 16.3617052,3.83986237 16.9474916,3.25407593 C17.5332781,2.66828949 18.4830255,2.66828949 19.068812,3.25407593 Z M5.29862906,2.88207799 C5.8844155,2.29629155 6.83416297,2.29629155 7.41994941,2.88207799 C8.00573585,3.46786443 8.00573585,4.4176119 7.41994941,5.00339833 L5.29862906,7.12471868 C4.71284263,7.71050512 3.76309516,7.71050512 3.17730872,7.12471868 C2.59152228,6.53893224 2.59152228,5.58918477 3.17730872,5.00339833 L5.29862906,2.88207799 Z"
                                                fill="#000000" opacity="0.3"></path>
                                            <path
                                                d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">وقت التوصيل</span>
                            <span
                                class="text-dark text-hover-primary mb-1 font-size-lg">{{"Time ("}} {{ $order->deliveryTime->start_time}} {{$order->deliveryTime->end_time}} {{")"}}</span>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24">
                                            </rect>
                                            <path
                                                d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z"
                                                fill="#000000" opacity="0.3"></path>
                                            <path
                                                d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z"
                                                fill="#000000"></path>
                                            <path
                                                d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">طريقة الدفع</span>
                            <span
                                class="text-dark text-hover-primary mb-1 font-size-lg">{{ $order->payment_method }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24">
                                            </rect>
                                            <path
                                                d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                            </path>
                                            <rect fill="#000000" opacity="0.3" x="5" y="20"
                                                width="15" height="2" rx="1"></rect>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">في حال عدم توفر المنتج</span>
                            <span
                                class="text-dark text-hover-primary mb-1 font-size-lg">{{ $order->not_found_option }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path
                                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">اسم المندوب</span>

                            @if ($order->delivery)
                                <span
                                    class="text-dark text-hover-primary mb-1 font-size-lg">{{ $order->delivery->name }}</span>
                            @endif
                        </div>
                    </div>
                </div>



                <div class="card-title text-center">
                    <h3 class="card-label font-weight-bold">تفاصيل السعر
                    </h3>
                </div>


                <div class="row">

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24">
                                            </rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="2"
                                                width="2" height="4" rx="1"></rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="16"
                                                width="2" height="5" rx="1"></rect>
                                            <path
                                                d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">إجمالي سعر المنتجات</span>
                            <span
                                class="text-dark text-hover-primary mb-1 font-size-lg">{{ $order->total_price }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24">
                                            </rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="2"
                                                width="2" height="4" rx="1"></rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="16"
                                                width="2" height="5" rx="1"></rect>
                                            <path
                                                d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">الضريبة المضافة</span>
                            <span class="text-dark text-hover-primary mb-1 font-size-lg" id="vat">15%</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24">
                                            </rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="2"
                                                width="2" height="4" rx="1"></rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="16"
                                                width="2" height="5" rx="1"></rect>
                                            <path
                                                d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">خصم المحفظة</span>
                            <span class="text-dark text-hover-primary mb-1 font-size-lg" id="wallet_price">????</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center m-3 bg-ifors p-2" style="border-radius: 10px;">
                        <div class="symbol symbol-40 symbol-light-white mr-5">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24">
                                            </rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="2"
                                                width="2" height="4" rx="1"></rect>
                                            <rect fill="#000000" opacity="0.3" x="11.5" y="16"
                                                width="2" height="5" rx="1"></rect>
                                            <path
                                                d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-success">صافي قيمة الطلب</span>
                            <span class="text-dark text-hover-primary mb-1 font-size-lg">289.49</span>
                        </div>
                    </div>

                </div>



                <div class="card-title text-center">
                    <h3 class="card-label font-weight-bold">بيانات الطلب
                    </h3>
                </div>

                <table class="table table-bordered table-checkable">
                    <thead>
                        <tr class="bg-secondary">
                            <th>اسم المنتج</th>
                            <th>سعر</th>
                            <th>تفاصيل المنتج</th>
                            <th>الكمية المطلوب</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach (json_decode(json_encode($order->products)) as $product)
                            <tr>
                                <td>{{ $product->ar_name }} || {{ $product->en_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->ar_description }} || {{ $product->en_description }}</td>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-5">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                        إغلاق
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

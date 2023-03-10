<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>


<!--end::Page Scripts-->
<script>
    //Accept function
    function fAccept(selectID) {
        let id = selectID.id;
        $.ajax({
            url: "/cp/accept/" + id,
            complete: function (data) {
                if (data.status == 200) {
                    Swal.fire("نجاح!", 'تمت العملية بنجاح', "success");
                } else {
                    Swal.fire("خطأ!", 'حدث خطأ اثناء تنفيذ العملية', "error");
                }
                $('.swal2-confirm').click(function(){$('#order-table').DataTable().ajax.reload();});
            }
        })
    }

    //Reject function
    function fReject(selectID) {
        let id = selectID.id;
        Swal.fire({
            title: 'تاكيد الرفض',
            text: "هل انت متاكد من رفض الطلبية",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'حذف ',
            cancelButtonText: 'الغاء'
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    url: "/cp/reject/" + id,
                    complete: function (data) {
                        if (data.status == 200) {
                            Swal.fire("نجاح!", 'تمت العملية بنجاح', "success");
                        } else {
                            Swal.fire("خطأ!", 'حدث خطأ اثناء تنفيذ العملية', "error");
                        }
                        $('.swal2-confirm').click(function () {
                            $('#order-table').DataTable().ajax.reload();
                        });
                    }
                })
            }
        })

    }

    $(function () {
        $(document).on('click', '.show-details', function () {
            let id = $(this).attr('id');
            $('#order_code').text('');
            $('#customer_name').text('');
            $('#customer_mobile').text('');
            $('#customer_address').text('');
            $('#order_date_time').text('');
            $('#payment_type').text('');
            $('#not_found_option').text('');
            $('#order_price').text('');
            $('#vat').text('');
            $('#wallet_price').text('');
            $('#total_price').text('');
            $('#reject_name').text('');
            $('#reject_type').text('');
            $('#driver_name').text('');
            $('#div_order_products').hide();
            $.ajax({
                url: '/cp/order-accept/create',
                method: 'get',
                data: {id: id},
                dataType: 'json',
                success: function (data) {
                    $('#order_code').text(data.order_code);
                    $('#customer_name').text(data.customer_name);
                    $('#customer_mobile').text(data.customer_mobile);
                    $('#customer_address').text(data.customer_address);
                    $('#order_date_time').text(data.order_date_time);
                    $('#payment_type').text(data.payment_type);
                    $('#not_found_option').text(data.not_found_option);
                    $('#order_price').text(data.order_price);
                    $('#vat').text(data.vat);
                    $('#wallet_price').text(data.wallet_price);
                    $('#total_price').text(data.total_price);
                    $('#reject_name').text(data.reject_name);
                    $('#reject_type').text(data.reject_type);
                    $('#driver_name').text(data.driver_name);
                    $('#changeOrderDriver').attr("href" , "change-driver/" + data.order_id);

                    if (data.order_products) {
                        let order_products = data.order_products;
                        let model = $('#order_products');
                        model.empty();
                        $.each(order_products, function(index, element) {
                            model.append('<tr style=""><td>'+element.product_name+'</td><td>'+element.product_price+'</td><td>'+element.product_desc+'</td><td>'+ element.product_qty +'</td></tr>');
                        });
                        $('#div_order_products').show();
                    }
                }
            })
        });
    });

    $(function () {
        $(document).on('click', '.show-rate-details', function () {
            let id = $(this).attr('id');
            $('#order_code').text('');
            $('#rate_details').text('');
            $.ajax({
                url: '/show-rate-details',
                method: 'get',
                data: {id: id},
                dataType: 'json',
                success: function (data) {
                    $('#order_code').text(data.order_code);
                    $('#rate_details').text(data.rate_details);
                }
            })
        });
    });
</script>



@if(Session::has('success'))
    <script type="text/javascript">

        Swal.fire("نجاح!", 'تمت العملية بنجاح', "success");

    </script>
@endif

@if(Session::has('error'))
    <script type="text/javascript">
        swal({
            title: '{{ Session::get('error') }}',
            text: "",
            icon: "error"
        });
    </script>
@endif

@yield('js')



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.jqueryui.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.3.3/js/dataTables.searchBuilder.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.3.3/js/searchBuilder.jqueryui.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

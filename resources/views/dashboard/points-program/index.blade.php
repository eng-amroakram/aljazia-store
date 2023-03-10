<x-layouts.app-layout>

    <link rel="stylesheet" href="dist/tagify.css">


    <div class="card card-custom gutter-b">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">
                <h1 class="card-label"><strong>برنامج النقاط</strong></h1>
            </div>

            @if (!($program_points->count() > 0))
                <div class="card-toolbar">
                    <x-buttons.admin.create page="programPoints" id="addProgramPoints"
                        titlebutton="إضافة برنامج نقاط جديد " modeltitle="برنامج نقاط جديد"
                        action="{{ route('admin.points-program.store') }}" method="POST" />
                </div>
            @endif

        </div>

        <div class="card-header flex-wrap border-0 pt-6 pb-0">


            <div class="card-body">

                <div class="table-responsive">
                    <table id="stores" class="table text-center">
                        <thead>

                            <tr>
                                {{-- <th scope="col" style="font-weight: bold;">ID</th> --}}
                                <th scope="col" style="font-weight: bold;">قمية المشتريات</th>
                                <th scope="col" style="font-weight: bold;">النقاط المكتسبة</th>
                                <th scope="col" style="font-weight: bold;">أدنى عدد نقاط للتحويل</th>
                                <th scope="col" style="font-weight: bold;">المقابل المادة للتحويل</th>
                                <th scope="col" style="font-weight: bold;">التعديل</th>
                            </tr>

                        </thead>
                        <tbody>

                            @if ($program_points->count() > 0)
                                @foreach ($program_points as $program_point)
                                    <tr>
                                        {{-- <td>{{ $store->id }}</td> --}}
                                        <td>{{ $program_point->purchase_value }}</td>
                                        <td>{{ $program_point->points_earned }}</td>
                                        <td>{{ $program_point->minimum_number_of_points_to_transfer }}</td>
                                        <td>{{ $program_point->transfer_fee }}</td>

                                        <td>
                                            <x-buttons.admin.edit page="programPoints"
                                                id="editProgramPoints{{ $program_point->id }}"
                                                edittitle="تعديل عرض الشركة {{ $program_point->name }}"
                                                action="{{ route('admin.points-program.update', $program_point->id) }}"
                                                method="PUT" :programpoint="$program_point" />
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10" class="text-center">
                                        <h1> لا يوجد بيانات </h1>
                                    </td>
                                </tr>
                            @endif

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        {{ $program_points->links() }}

</x-layouts.app-layout>

<script>
    // $(document).ready(function() {
    //     $('#stores').DataTable();
    // });
    $('select').selectpicker();
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="dist/jQuery.tagify.min.js"></script>

<script data-name="[colors,sizes, prices]">
    (function() {
        // The DOM element you wish to replace with Tagify
        var colors = document.querySelector('input[name=colors]');
        var sizes = document.querySelector('input[name=sizes]');
        var prices = document.querySelector('input[name=prices]');

        // initialize Tagify on the above input node reference
        new Tagify(colors)
        new Tagify(sizes)
        new Tagify(prices)
    })()
</script>

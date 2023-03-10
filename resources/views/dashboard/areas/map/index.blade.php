<x-layouts.app-layout>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">تحديد المناطق على الخريطة</h3>
            </div>
        </div>
        <div class="card-body">

            <div class="mb-12">

                <form action="{{ route('admin.maps.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="table-toolbar">
                        <div class="form-group">
                            <div style="width: 100%; height: 500px;" id="map"></div>
                        </div>
                        <input type="hidden" name="points" id="points">
                        <input type="hidden" name="area_id" id="area_id" value="{{ $id }}">
                        <button type="submit" id="save" class="btn btn-sm btn-danger"> حفظ البيانات </button>
                        <a href="{{ route('admin.areas.index') }}" type="submit" id="save"
                            class="btn btn-sm btn-info">رجوع </a>

                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($bounds)
        {!! $bounds !!}
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        $('document').ready(function() {
            var map; // Global declaration of the map
            var iw = new google.maps.InfoWindow(); // Global declaration of the infowindow
            var lat_longs = new Array();
            var markers = new Array();
            var drawingManager;

            function initialize() {
                var myLatlng = new google.maps.LatLng(24.774265, 46.738586);
                var myOptions = {
                    zoom: 8,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                map = new google.maps.Map(document.getElementById("map"), myOptions);

                var polygonCoords = [
                    @foreach(json_decode($bounds); as $mybound)
                        {
                            "lat": {{ $mybound->lat }},
                            "lng": {{ $mybound->lng }}
                        },
                    @endforeach
                ];

                console.log(polygonCoords);

                var polygon = new google.maps.Polygon({
                    paths: polygonCoords,
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35
                });

                polygon.setMap(map);


                drawingManager = new google.maps.drawing.DrawingManager({
                    drawingMode: google.maps.drawing.OverlayType.POLYGON,
                    drawingControl: true,
                    drawingControlOptions: {
                        position: google.maps.ControlPosition.TOP_CENTER,
                        drawingModes: [google.maps.drawing.OverlayType.POLYGON]
                    },

                    polygonOptions: {
                        editable: true
                    }
                });

                drawingManager.setMap(map);

                google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
                    var newShape = event.overlay;
                    newShape.type = event.type;
                });

                google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
                    overlayClickListener(event.overlay);
                    $('#points').val(JSON.stringify(event.overlay.getPath().getArray()));

                });
            }

            function overlayClickListener(overlay) {
                google.maps.event.addListener(overlay, "mouseup", function(event) {
                    var path = overlay.getPath();
                    var new_path = new Array();
                    for (var i = 0; i < path.getLength(); i++) {
                        new_path.push({
                            lat: path.getAt(i).lat(),
                            lng: path.getAt(i).lng()
                        });
                    }

                    $('#points').val(JSON.stringify(Object.assign({}, new_path)));
                });
            }

            // google.maps.event.addDomListener(window, 'load', initialize);

            window.addEventListener('load', initialize);

            $(function() {
                $('#save').click(function() {
                    //iterate polygon vertices?
                });
            });
        });
    </script>


</x-layouts.app-layout>

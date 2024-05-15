@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div>
            <ol class="breadcrumb mb-2 d-flex justify-content-between">
                <li class="breadcrumb-item active font-weight-bold text-dark">Search Location</li>

                <!-- Add Back Button -->
                <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;"><i class="fas fa-backward"></i></Button></a>
            </ol>
        </div>

        <div class=" m-auto">
            <div class="card">
                <div class="card-title"></div>
                <div class="card-body row">
                    <div class="col-md-3">
                        <form action="{{ url('/admin/location/filter') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label font-weight-bold">Division</label>
                                <select name="division" id="division" class=" form-control">
                                        <option value="">Select Division</option>
                                        <option value="Gilgit">Gilgit</option>
                                        <option value="Baltistan">Baltistan</option>
                                        <option value="Hunza">Hunza</option>
                                        <option value="Diamer">Diamer</option>
                                </select>
                                @if ($errors->has('division'))
                                <span class="text-danger">{{ $errors->first('division') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label font-weight-bold">District</label>
                                <select name="district" id="district" class=" form-control">
                                        <option value="">Select District</option>
                                        <option value="Hunza">Hunza</option>
                                        <option value="Ghizer">Ghizer</option>
                                        <option value="Diamer">Diamer</option>
                                        <option value="Astore">Astore</option>
                                        <option value="Nagar">Nagar</option>
                                </select>
                                @if ($errors->has('district'))
                                <span class="text-danger">{{ $errors->first('district') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label font-weight-bold">Tehsil</label>
                                <select name="tehsil" id="tehsil" class=" form-control">
                                        <option value="">Select Tehsil</option>
                                        <option value="Aliabad">Aliabad</option>
                                        <option value="Danyore">Danyore</option>
                                </select>
                                @if ($errors->has('tehsil'))
                                <span class="text-danger">{{ $errors->first('tehsil') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label font-weight-bold">Mineral</label>
                                <select name="mineral" id="mineral" class=" form-control">
                                        <option value="">Select Mineral</option>
                                        <option value="Topas">Topas</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Ruby">Ruby</option>
                                        <option value="Cooper">Cooper</option>
                                        <option value="Aquamarine">Aquamarine</option>
                                    </select>
                                    @if ($errors->has('mineral'))
                                    <span class="text-danger">{{ $errors->first('mineral') }}</span>
                                    @endif
                            </div>
                            <div class="text-right">
                                <input type="submit" class="btn btn-sm" style="background-color: #0f172b; color: #fff;" value='Submit Location'>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div id="map" style="width: 100%; height: 100%;">
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyLZCbRGhWTf7YajA56LlSHgX4wHNxK90&callback=initMap&v=weekly" async defer></script>

                            <!-- <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=gilgit baltistan&amp;t=&amp;z=8&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://piratebay-proxys.com/">Piratebay</a></div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    width: 100%;
                                    height: 400px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    width: 100%;
                                    height: 400px;
                                }

                                .gmap_iframe {
                                    width: 100% !important;
                                    height: 400px !important;
                                }
                            </style> -->


                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</main>



<script type="text/javascript">
    let map;
    var locations = <?php echo $locations; ?>;
    console.log(locations[0])

    function initMap() {

        map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(35.925623, 74.366250),
            zoom: 8,
        });
        /* Add multiple markers to map */
        var infoWindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {
            var position = new google.maps.LatLng(locations[i].latitude, locations[i].longitude);
            console.log(position)
            const tittle = position;
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: locations[i].location_name

            });
            // console.log(marker)

        //     /* Add info window to marker   */
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(

                        '<div class="info_content">' +
                        '<h3 class="dialog-title"  >Name: ' + locations[i].location_name + '</h3>' +
                        '<pre class="dialog-title">latitude     ' + locations[i].latitude + '</pre>' +
                        '<pre class="dialog-title">longitude    ' + locations[i].longitude + '</pre>' +
                        '<pre class="dialog-title">Description    ' + locations[i].description + '</pre>' +
                        '</div>'
                    );
                    infoWindow.open(map, marker);
                }
            })(marker, i));


        }


    }
</script>


@endsection
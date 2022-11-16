@extends('layouts.app')

@section('styles')
    <style>
        .text-center {
            text-align: center;
        }

        #map {
            width: '100%';
            height: 400px;
        }
    </style>
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-8 col-xs-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Map Location
                </div>
                <div class="card-body">

                    <div id="map"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xs-12 mt-3">

            <div class="card">
                <div class="card-header">
                    Current Location
                </div>
                <div class="card-body">
                    <div id="lat">Latitude: {{$lat}}</div>
                    <div id="lon">Longitude: {{$lon}}</div>
                    <button type="button" onclick="updateLocation()" class="btn btn-dark">Update Location</button>
                </div>
            </div>            

            <div class="card mt-3">
                <div class="card-header">
                    Play Mode
                </div>
                <div class="card-body">
                    - traveller, answer question, GOLD
                    - trader, find trading ports and exchange gems/badges/compass material, GOLD/FIAT
                    - explorer, update locations and image editing, WISDOM
                    - diplomat, create & conduct multiplayer games, WISDOM
                </div>
            </div>

        </div>
    </div>
    <div class="row py-5">

     
        <div class="col-xl-8 col-xs-12">

            <div class="card">
                <div class="card-header">
                    List of Location
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Coordinate</th>
                                    <th scope="col">Distance</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lokasis as $lokasi)                                
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$lokasi->name}}</td>
                                    <td>{{$lokasi->coord->latitude}}, {{$lokasi->coord->longitude}}</td>
                                    <td>Distance</td>
                                    <td><button type="button" class="btn btn-secondary">View</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection

@section('scripts')
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script>

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }
        getLocation();

        function showPosition(position) {
            document.getElementById("lat").innerHTML = "Latitude: " + position.coords.latitude; 
            document.getElementById("lon").innerHTML = "Longitude: " + position.coords.longitude;
            var newCoord = new L.LatLng(position.coords.latitude, position.coords.longitude);            
            userLocation.setLatLng(newCoord);
        }

        function showPosition2(position) {
            window.location.href = '/play/' + position.coords.latitude + '/' + position.coords.longitude;
        }        

        function updateLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition2);
                
            } else {
                console.log("Geolocation is not supported by this browser.");
            }            
        }

        let map, markers = [];
        let userLocation;

        function initMap() {
            map = L.map('map', {
                center: {
                    lat: {{ $lat }},
                    lng: {{ $lon }},
                },
                zoom: 18
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            userLocation = L.marker([0,0]).addTo(map);

            map.on('click', mapClicked);
            initMarkers();
        }
        initMap();


        function initMarkers() {
            const initialMarkers = {!! json_encode($lokasis) !!};
            console.log(initialMarkers);

            for (let index = 0; index < initialMarkers.length; index++) {

                var data = initialMarkers[index];                
                var newCoord = new L.LatLng(data.coord.coordinates[0], data.coord.coordinates[1]);          
                var marker = L.circle(newCoord);
                marker.addTo(map);
                console.log(marker);
                markers.push(marker)
            }
        }

        // function generateMarker(data, index) {
        //     var newCoord = new L.LatLng(data.coord.coordinates[0], data.coord.coordinates[1]);          
        //     return L.marker(newCoord)
        //         // .on('click', (event) => markerClicked(event, index))
        //         // .on('dragend', (event) => markerDragEnd(event, index));
        // }

        function mapClicked($event) {
            console.log(map);
            console.log($event.latlng.lat, $event.latlng.lng);
        }

        function markerClicked($event, index) {
            console.log(map);
            console.log($event.latlng.lat, $event.latlng.lng);
        }

        function markerDragEnd($event, index) {
            console.log(map);
            console.log($event.target.getLatLng());
        }

    </script>
@endsection

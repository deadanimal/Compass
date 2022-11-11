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
        <div class="col-8">
            <div id="map"></div>
        </div>
        <div class="col-4">

            <div class="card">
                <div class="card-header">
                    Current Location
                </div>
                <div class="card-body">
                    <div id="lat"></div>
                    <div id="lon"></div>
                    <div id="res"></div>
                </div>
            </div>            

            <div class="card mt-3">
                <div class="card-header">
                    Puzzle
                </div>
                <div class="card-body">
                </div>
            </div>

        </div>
    </div>
    <div class="row py-5">


        <div class="col-4">

            <div class="card">
                <div class="card-header">
                    Cipta Lokasi
                </div>
                <div class="card-body">
                </div>
            </div>

        </div>        
        <div class="col-8">

            <div class="card">
                <div class="card-header">
                    Cipta Lokasi
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>mdo</td>
                                    <td>view</td>
                                </tr>
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
            map.panTo(new L.LatLng(position.coords.latitude, position.coords.longitude));
            document.getElementById("lat").innerHTML = "Latitude: " + position.coords.latitude; 
            document.getElementById("lon").innerHTML = "Longitude: " + position.coords.longitude;
            axios.post('/kedudukan', {
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude
                })
                .then(function(response) {
                    document.getElementById("res").innerHTML = response.data;
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        let map, markers = [];

        function initMap() {
            map = L.map('map', {
                center: {
                    lat: 28.626137,
                    lng: 79.821603,
                },
                zoom: 15
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            map.on('click', mapClicked);
            initMarkers();
        }
        initMap();


        function initMarkers() {
            const initialMarkers = '';

            for (let index = 0; index < initialMarkers.length; index++) {

                const data = initialMarkers[index];
                const marker = generateMarker(data, index);
                marker.addTo(map).bindPopup(`<b>${data.position.lat},  ${data.position.lng}</b>`);
                map.panTo(data.position);
                markers.push(marker)
            }
        }

        function generateMarker(data, index) {
            return L.marker(data.position, {
                    draggable: data.draggable
                })
                .on('click', (event) => markerClicked(event, index))
                .on('dragend', (event) => markerDragEnd(event, index));
        }

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

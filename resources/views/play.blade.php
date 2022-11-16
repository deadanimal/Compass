@extends('layouts.app')

@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            
        </div>

    </div>

@endsection

@section('scripts')
    
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
            window.location.href = '/play/' + position.coords.latitude + '/' + position.coords.longitude;
            // axios.post('/kedudukan', {
            //         latitude: position.coords.latitude,
            //         longitude: position.coords.longitude
            //     })
            //     .then(function(response) {
            //         document.getElementById("res").innerHTML = response.data;
            //         console.log(response);
            //     })
            //     .catch(function(error) {
            //         console.log(error);
            //     });
        }


    </script>
@endsection

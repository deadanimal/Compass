@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="px-4 pt-5 my-5 text-center">
    <h1 class="display-4 fw-bold">Loading....</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{$quote}}</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        </div>
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
            setTimeout(()=> {
                window.location.href = '/play/' + position.coords.latitude + '/' + position.coords.longitude;
            }, 3000);            
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

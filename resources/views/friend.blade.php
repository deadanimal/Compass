@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-3">

            <div class="card">
                <div class="card-header">
                    Username: {{$user->username}}
                </div>
                <div class="card-body">
                </div>
            </div>

        </div>

        <div class="col-9">
            <div class="row">badges</div>
            <div class="row">compasses</div>
        </div>
      
    </div>


@endsection

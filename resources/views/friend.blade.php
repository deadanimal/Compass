@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-3">

            <div class="card">
                <div class="card-header">
                    Username: {{ $friend->username }}
                </div>
                <div class="card-body">
                </div>
            </div>
            

            @if($auth_user)
            @else
            <div class="card mt-3">
                <div class="card-header">
                    Register as a Student 
                </div>
                <div class="card-body">

                    <form action="/friend/{{$friend->username}}" method="POST">
                        @csrf
                        <input type="hidden" name="introducer_id" value="{{$friend->id}}">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="name" placeholder="My name is Sam">
                            <label for="floatingInput">Name</label>
                        </div>                        
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                            <label for="floatingInput">Email Address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="w-100 btn mt-3 btn-lg btn-primary" type="submit">Register</button>                        
                    </form>
                </div>
            </div>   
            @endif         

        </div>

        <div class="col-9">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            - list of badges
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            - list of compasses
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

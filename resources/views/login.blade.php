@extends('layouts.app')

@section('styles')

@section('content')
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <form action="/login" method="POST">
            @csrf
            {{-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
            {{-- <h1 class="h3 mb-3 fw-normal">Please sign in</h1> --}}

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            {{-- <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div> --}}
            <button class="w-100 btn mt-3 btn-lg btn-primary" type="submit">Sign in</button>
            {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
        </form>
    </div>
</div>
@endsection

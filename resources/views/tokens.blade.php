@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-3">
        <form action="/admin/token" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>             
            <button type="submit" class="btn btn-primary">Generate Token</button>
        </form>

    </div>      
</div>
@endsection
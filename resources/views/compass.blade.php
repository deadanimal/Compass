@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-3">
            <form action="/compass" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Compass Type</label>
                    <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Compass Level</label>
                    <input type="password" class="form-control" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Randomness</label>
                    <input type="password" class="form-control" >
                </div>                
                <button type="submit" class="btn btn-primary">Build Compass</button>
            </form>

        </div>
        <div class="col-3">
            <form action="/gem" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Gem Type</label>
                    <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Randomness</label>
                    <input type="password" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">Build Gem</button>
            </form>
        </div>
        <div class="col-6">
            - - -
        </div>        
    </div>

    <div class="row py-5">
        <div class="col-4">
        </div>        
        <div class="col-8">

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
@endsection

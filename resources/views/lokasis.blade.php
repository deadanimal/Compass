@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3">

            <div class="card">
                <div class="card-header">
                    Cipta Lokasi
                </div>
                <div class="card-body">

                    <form action="/admin/lokasi" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Latitude</label>
                            <input type="number" step='0.0000001' name="latitude" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Longitude</label>
                            <input type="number" step='0.0000001' name="longitude" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Create Lokasi</button>
                    </form>


                </div>
            </div>

        </div>
        <div class="col-9">


            <div class="card">
                <div class="card-header">
                    Senarai Lokasi
                </div>
                <div class="card-body">

            
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Coord</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lokasis as $lokasi)
                                    <tr>
                                        <th scope="row">{{ $lokasi->id }}</th>
                                        <td>{{ $lokasi->name }}</td>
                                        <td>({{ $lokasi->coord->latitude }}, {{ $lokasi->coord->longitude }})</td>
                                        <td><a href="/admin/lokasi/{{ $lokasi->id }}">View</a></td>
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

{{-- <div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">


    </div>
</div> --}}

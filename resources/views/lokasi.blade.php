@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xl-8 col-xs-12 mt-3">
        <div class="card">
            <div class="card-header">
                #{{$lokasi->id}} {{$lokasi->name}}
            </div>
            <div class="card-body">

                <div id="map"></div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Explorer Screenshot
            </div>
            <div class="card-body">
            </div>
        </div>        
    </div>
    <div class="col-xl-4 col-xs-12 mt-3">

        <div class="card">
            <div class="card-header">
                Location Data
            </div>
            <div class="card-body">
                {{-- <div id="lat">Latitude: {{$lat}}</div>
                <div id="lon">Longitude: {{$lon}}</div>                     --}}
            </div>
        </div>            
        

        <div class="card mt-3">
            <div class="card-header">
                Player Historical Trace
            </div>
            <div class="card-body">
     
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


<div class="row mt-3">
    <div class="col-3">
        {{$lokasi}}
    </div>
    <div class="col-3">  
        stats about player lokasi
    </div>
    <div class="col-3">
        <form action="/admin/lokasi/{{$lokasi->id}}/puzzle" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Question</label>
                <input type="text" name="question" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Right Pilihan</label>
                <input type="number" name="ropt" class="form-control">
            </div>            
            <div class="mb-3">
                <label class="form-label">Pilihan 1</label>
                <input type="text" name="opt1" class="form-control">
            </div>       
            <div class="mb-3">
                <label class="form-label">Pilihan 2</label>
                <input type="text" name="opt2" class="form-control">
            </div>              
            <div class="mb-3">
                <label class="form-label">Pilihan 3</label>
                <input type="text" name="opt3" class="form-control">
            </div>              
            <div class="mb-3">
                <label class="form-label">Pilihan 4</label>
                <input type="text" name="opt4" class="form-control">
            </div>                                                             
            <button type="submit" class="btn btn-success">Create Puzzle</button>
        </form>        
    </div>    
    <div class="col-3">  
        {{$lokasi->puzzles}}
    </div>     
</div>

@endsection
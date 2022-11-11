@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-3">
        <form action="/admin/puzzle" method="POST">
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
    <div class="col-9">     
        {{$puzzles}}
    </div>
</div>

@endsection
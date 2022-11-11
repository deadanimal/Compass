<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;

use App\Models\Kedudukan;
use App\Models\Lokasi;
use App\Models\Puzzle;

class LokasiController extends Controller
{

    public function senarai(Request $request) {
        $lokasis = Lokasi::all();
        return view('lokasis', compact('lokasis'));
    }

    public function cipta(Request $request) {

        Lokasi::create([
            'name' => $request->name,
            'coord' => new Point($request->latitude, $request->longitude),
        ]);       
        return back();
    }

    public function kemaskini(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $lokasi = Lokasi::find($id);
    }

    public function satu(Request $request) {
        $id = $request->route('id');
        $lokasi = Lokasi::find($id);   
        return view('lokasi', compact('lokasi'));     
    }

    public function cari(Request $request) {
        $id = $request->route('id');
        $lokasi = Lokasi::find($id);
    }

    public function hantar_kedudukan(Request $request) {
        $user = $request->user();
        $duduk = New Kedudukan;
        $duduk->user_id = $user->id;
        $duduk->latitude = $request->latitude;
        $duduk->longitude = $request->longitude;
        $duduk->save();         
    }

    public function senarai_kedudukan(Request $request) {
        $user = $request->user();
        $duduks = Kedudukan::where('user_id', $user->id)->get();
    }
    
}

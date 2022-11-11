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
        //$lokasis = Lokasi::whereDistance('coord', new Point(2.9240584, 101.6364349), '<', 100)->get();
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
        $duduk->coord = new Point($request->latitude, $request->longitude);
        $duduk->save();     

        $lokasis = Lokasi::whereDistance('coord', new Point($request->latitude, $request->longitude), '<', 0.01)->get();    
        if ($lokasis) {
            return $lokasis->toJson(JSON_PRETTY_PRINT);
        } else {
            return;    
        }        
    }

    public function senarai_kedudukan(Request $request) {
        $user = $request->user();
        $duduks = Kedudukan::where('user_id', $user->id)->get();
    }
    
}

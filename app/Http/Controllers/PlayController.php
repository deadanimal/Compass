<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compass;
use App\Models\Wallet;
use App\Models\TokenBalance;
use App\Models\Lokasi;
use App\Models\Puzzle;
use App\Models\PuzzleAnswer;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;

class PlayController extends Controller
{

    public function muka_play(Request $request) {
        
        $user = $request->user();
        $compas = Compass::where('user_id', $user->id)->get();
        $wallets = Wallet::where('user_id', $user->id)->get();
        $balances = TokenBalance::where('user_id', $user->id)->get();
        $lokasis = Lokasi::all();

        return view('play', compact([
            'user', 'compas', 'wallets', 'balances'
        ]));
    }

    public function lat_lon_play(Request $request) {
        $lat = $request->route('lat');
        $lon = $request->route('lon');
        $user = $request->user();
        $lokasis = Lokasi::whereDistance('coord', new Point($lat, $lon), '<', 0.01)->get();    

        return view('play_lat_lon', compact([
            'user', 'lokasis', 'lat', 'lon'
        ]));
    }    

    public function senarai_puzzle(Request $request) {
        $puzzles = Puzzle::all();
        return view('puzzles', compact('puzzles'));
    }    

    public function cipta_puzzle(Request $request) {
        $user = $request->user();

        $puzzle = New Puzzle;
        $puzzle->question = $request->question;
        $puzzle->ropt = $request->ropt;
        $puzzle->opt1 = $request->opt1;
        $puzzle->opt2 = $request->opt2;
        $puzzle->opt3 = $request->opt3;
        $puzzle->opt4 = $request->opt4;
        $puzzle->user_id = $user->id;
        $puzzle->save();    

        $id = $request->route('id');
        if($id) {
            $lokasi = Lokasi::find($id);
            $lokasi->puzzles()->attach($puzzle);
        }        
        return back();      
    }

    public function kemaskini_puzzle(Request $request) {}

    public function satu_puzzle(Request $request) {}

    public function jawap_puzzle(Request $request) {}
}

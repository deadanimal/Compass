<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compass;
use App\Models\Wallet;
use App\Models\TokenBalance;
use App\Models\Lokasi;
use App\Models\Puzzle;

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

    public function cipta_puzzle(Request $request) {
        $user = $request->user();
        $compass_id = $request->compass_id;

        $puzzle = New Puzzle;
        $puzzle->name = $request->name;
        $puzzle->jenis = $request->jenis;
        $puzzle->user_id = $user->id;
        $puzzle->compass_id = $compass_id;
        $puzzle->save();          
    }

    public function kemaskini_puzzle(Request $request) {}

    public function satu_puzzle(Request $request) {}

    public function jawap_puzzle(Request $request) {}
}

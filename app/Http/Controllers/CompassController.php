<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compass;
use App\Models\CompassGem;
use App\Models\CompassModification;
use App\Models\CompassUpgrade;

class CompassController extends Controller
{

    public function muka_compass(Request $request) {
        $user = $request->user();
        $compas = Compass::where('user_id', $user->id)->get();

        return view('compass', compact([
            'user', 'compas'
        ]));
    }

    public function cipta_compass(Request $request) {}

    public function beli_compass(Request $request) {}

    public function kemaskini_compass(Request $request) {}

    public function upgrade_compass(Request $request) {}

    public function modify_compass(Request $request) {}

    public function jual_compass(Request $request) {}

    public function sewakan_compass(Request $request) {}

    public function tarik_sewa_compass(Request $request) {}

    public function beli_gem(Request $request) {}

    public function jual_gem(Request $request) {}

    public function kemaskini_gem(Request $request) {}
}

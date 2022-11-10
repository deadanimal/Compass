<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    public function cipta(Request $request) {
        $lokasi = New Lokasi;
        $lokasi->save();           
    }

    public function kemaskini(Request $request) {}

    public function satu(Request $request) {}

    public function cari(Request $request) {}
    
}

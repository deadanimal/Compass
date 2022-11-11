<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compass;
use App\Models\CompassGem;
use App\Models\CompassModification;
use App\Models\CompassUpgrade;
use App\Models\CompassRental;
use App\Models\CompassSale;

class CompassController extends Controller
{

    public function muka_compass(Request $request) {
        $user = $request->user();
        $compas = Compass::where('user_id', $user->id)->get();

        return view('compass', compact([
            'user', 'compas'
        ]));
    }

    public function senarai_compass(Request $request) {
        $compas = Compass::all();
        return view('compasses', compact('compas'));
    }    

    public function cipta_compass(Request $request) {
        $user = $request->user();
        $compass = New Compass;
        $compass->creator_id = $user->id;
        $compass->save();
    }

    public function beli_compass(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $sale_id = $request->route('sale_id');

        $compass = Compass::find($id);
        $compass->save();

        $sale = CompassSale::find($sale_id);
        $sale->buyer_id = $user->id;
        $sale->buy_at = new DateTime('now');        
        $sale->save();        
    }

    public function kemaskini_compass(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $compass = Compass::find($id); 
        $compass->save();       
    }

    public function upgrade_compass(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $compass = Compass::find($id); 
        $compass->save();       
    }

    public function modify_compass(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $compass = Compass::find($id); 
        $compass->save();               
    }

    public function jual_compass(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $compass = Compass::find($id); 
        $compass->save();   

        $sale = New CompassSale;
        $sale->seller_id = $user->id;
        $sale->sell_at = new DateTime('now');
        $sale->save();                          
    }

    public function takjadi_jual_compass(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $sale_id = $request->route('sale_id');

        $compass = Compass::find($id);
        $compass->save();

        $sale = CompassSale::find($sale_id);
        $sale->save();                           
    }    

    public function sewakan_compass(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $compass = Compass::find($id); 
        $compass->save();   

        $rental = New CompassRental;
        $rental->owner_id = $user->id;
        $rental->rent_out_at = new DateTime('now');
        $rental->save();         
    }

    public function terima_sewaan_compass(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $rental_id = $request->route('rental_id');
        $compass = Compass::find($id); 
        $compass->save();   

        $rental = CompassRental::find($rental_id);
        $rental->renter_id = $user->id;
        $rental->rent_at = new DateTime('now');
        $rental->save();          
    }    

    public function tarik_sewa_compass(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $rental_id = $request->route('rental_id');
        $compass = Compass::find($id); 
        $compass->save();   

        $rental = CompassRental::find($rental_id);
        $rental->save();          
    }

    public function cipta_gem(Request $request) {}

    public function beli_gem(Request $request) {
        $user = $request->user();
        $id = $request->route('id');

        $gem = CompassGem::find($id);
        $gem->save();           
    }

    public function jual_gem(Request $request) {
        $user = $request->user();
        $id = $request->route('id');

        $gem = CompassGem::find($id);
        $gem->save();           
    }

    public function kemaskini_gem(Request $request) {
        $user = $request->user();
        $id = $request->route('id');

        $gem = CompassGem::find($id);
        $gem->save();        
    }

    public function pasang_gem(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $gem_id = $request->route('gem_id');

        $compass = Compass::find($id); 
        $compass->save();   

        $gem = CompassGem::find($gem_id);
        $gem->save();           
    }
}

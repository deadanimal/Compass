<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Token;
use App\Models\TokenBalance;
use App\Models\TokenTransaction;

class FinanceController extends Controller
{
    public function muka_finance(Request $request) {
        $user = $request->user();

        $tokens = Token::all();
        foreach ($tokens as $token) {
            $balance_exists = TokenBalance::where([
                ['user_id', '=', $user->id],
                ['token_id', '=', $token->id],
            ])->exists();
            if(!$balance_exists) {
                $balance = New TokenBalance;
                $balance->user_id = $user->id;
                $balance->token_id = $token->id;
                $balance->save();
            }
        }


        $wallets = Wallet::where('user_id', $user->id)->get();
        $balances = TokenBalance::where('user_id', $user->id)->get();
        $txs = TokenTransaction::where('user_id', $user->id)->get();

        return view('finance', compact([
            'user', 'wallets', 'balances', 'txs'
        ]));
    }

    public function cipta_wallet(Request $request) {
        $user = $request->user();
        $wallet = New Wallet;
        $wallet->user_id = $user->id;
        $wallet->save();
    }

    public function kemaskini_wallet(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $wallet = Wallet::find($id);        
    }

    public function senarai_token(Request $request) {
        $tokens = Token::all();

        return view('tokens', compact([
            'tokens'
        ]));
    }    

    public function cipta_token(Request $request) {
        $token = New Token;
        $token->save();        
    }

    public function kemaskini_token(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $token = Token::find($id);          
    }

    public function hantar_token(Request $request) {
        $tx = New TokenTransaction;
        $tx->save();            
    }

    public function beli_token(Request $request) {
        $tx = New TokenTransaction;
        $tx->save();           
    }

    public function jual_token(Request $request) {
        $tx = New TokenTransaction;
        $tx->save();        
    }

    public function offboard_token(Request $request) {
        $tx = New TokenTransaction;
        $tx->save();        
    }
}

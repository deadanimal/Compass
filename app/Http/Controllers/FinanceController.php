<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Billplz\Client;
use RealRashid\SweetAlert\Facades\Alert;
use DateTime;
use DateTimeZone;
use Carbon\Carbon;

use App\Models\Wallet;
use App\Models\Token;
use App\Models\TokenBalance;
use App\Models\TokenPurchase;
use App\Models\TokenMint;
use App\Models\TokenTransaction;
use App\Models\Invoice;

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

    public function buy_token(Request $request) {

        $token_name = $request->token;
        $token_amount = $request->amount;
        if($token_name == 'gold') {
            $token_id = 1;
            $token_cost = $token_amount;
        } else {
            $token_id = 2;
            $token_cost = $token_amount * 100;
        }
        

        $billplz_statement = 'Purchase of '.number_format(($token_amount), 3, ".", ",").' of '.ucfirst($token_name);
        $datetime = new DateTime('tomorrow');

        $user = $request->user();

        $billplz = Client::make(env('BILLPLZ_KEY'), env('BILLPLZ_XSIGNATURE'));
        $bill = $billplz->bill();
        $response = $bill->create(
            'b6grdq8f',
            $user->email,
            $user->mobile,
            'Compass - Purchase of Token',
            \Duit\MYR::given($token_cost),
            'https://metaversecompass.org/billplz-callback',
            $billplz_statement,
            [
                "reference_1_label" => "Token",
                "reference_1" => ucfirst($token_name),
                "reference_2_label" => "Amount",
                "reference_2" => number_format(($token_amount), 3, ".", ","),
                "due_at" => new \DateTime($datetime->format('Y-m-d')),
                "redirect_url" => 'https://metaversecompass.org/billplz-redirect',
                "callback_url" => 'https://metaversecompass.org/billplz-callback',
            ]
        );

        $billplz_data = $response->toArray();
        
        $invoice = new Invoice;
        $invoice->user_id = $user->id;     
        $invoice->status = 'Waiting For Payment';
        $invoice->amount = $token_cost;
        $invoice->billplz_id = $billplz_data['id'];
        $invoice->save();

        $purchase = new TokenPurchase;
        $purchase->user_id = $user->id;
        $purchase->invoice_id = $invoice->id;
        $purchase->token_id = $token_id;
        $purchase->amount = $token_amount;
        $purchase->save();

        $invoice->token_purchase_id = $purchase->id; 
        $invoice->save();        

        return redirect($billplz_data['url']);
    }

    public function jual_token(Request $request) {
        $tx = New TokenTransaction;
        $tx->save();        
    }

    public function offboard_token(Request $request) {
        $tx = New TokenTransaction;
        $tx->save();        
    }

    public function billplz_redirect(Request $request)
    {
        $billplz = Client::make(env('BILLPLZ_KEY'), env('BILLPLZ_XSIGNATURE'));
        $bill = $billplz->bill();
        $data = $bill->redirect($_GET);
        $bill_id = $data['id'];
        $invoice = Invoice::where('billplz_id', $bill_id)->first();
        if($invoice->status != 'Waiting For Payment'){
            return redirect('/token');
        }
        $bill_paid = $data['paid'];
        $bill_paid_at = $data['paid_at'];
        $bill_paid_at->setTimeZone(new DateTimeZone('Asia/Kuala_Lumpur'));
        $bill_x_signature = $data['x_signature'];
        $bill_string = 'billplzid' . $bill_id . '|billplzpaid_at' . $bill_paid_at->format('Y-m-d H:i:s O') . '|billplzpaidtrue';
        
        $bill_self_compute = hash_hmac('sha256', $bill_string, env('BILLPLZ_XSIGNATURE'));
        if($bill_x_signature == $bill_self_compute) {
            if ($bill_paid) {        
                $invoice->status = 'Paid';
                $invoice->save();

                $purchase = TokenPurchase::find($invoice->token_purchase_id);
                $purchase->completed = true;
                $purchase->save();

                $balance = TokenBalance::where([
                    ['user_id', '=', $purchase->user_id],
                    ['token_id', '=', $purchase->token_id],
                ])->first();
                $balance->amount += $purchase->amount;
                $balance->save();
            }                        
            return redirect('/token');
        } else {
            Alert::error('False Signature', 'Your transaction is not successful, please contact our support team.');
            return redirect('/token');
        }        
    }

    public function billplz_callback(Request $request)
    {
        $billplz = Client::make(env('BILLPLZ_KEY'), env('BILLPLZ_XSIGNATURE'));
        $bill = $billplz->bill();
        $data = $bill->webhook($_POST);
        return response('', 200);
    }    
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\info;
use App\Http\Requests\withdraw;
use App\Models\cards;
use App\Models\Withdrawal;
use Carbon\Carbon;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{

    public function info(info $request){

        $barcode = $request->get('barcode');

        $card = cards::where('barcode','=',$barcode)->with('withdraw')->first();

        //dd($card);
        return view('card.info',compact('card'));

    }


    public function withdraw(withdraw $request){




        $barcode = $request->get('barcode');
        $amount = $request->get('amount');
        $orderNo = $request->get('orderNo');




        DB::beginTransaction();
        try {

            $withdraw = Withdrawal::create([
                'barcode' => $barcode,
                'amount' => $amount,
                'orderNo' =>$orderNo,
                'date' => Carbon::now(),
                'user_id' => Auth::id(),
            ]);

            $card = cards::where('barcode','=',$barcode)->with('withdraw')->first();
            $card->balance = $card->balance - $amount;
            $card->update();
            DB::commit();

            return response()->json([
                'data' => true,
            ]);

            return redirect('info',compact('card'));

        }catch (Exception $e){

            DB::rollBack();
            $card = cards::where('barcode','=',$barcode)->with('withdraw.user')->first();
            return response()->json([
                'data' => false,
            ]);
            dd($card);
            return redirect('info',compact('card'));

        }





    }
}

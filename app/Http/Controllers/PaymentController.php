<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\CreatePayment;
use App\Http\Requests\Payment\UpdatePayment;
use App\Payment;
use Karson\MpesaPhpSdk\Mpesa;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $mpesa = new Mpesa();
         $mpesa->setApiKey('83f7zvajuj5dp27aj9fsrcm1py6lqsr4');
         $mpesa->setPublicKey('MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAmptSWqV7cGUUJJhUBxsMLonux24u+FoTlrb+4Kgc6092JIszmI1QUoMohaDDXSVueXx6IXwYGsjjWY32HGXj1iQhkALXfObJ4DqXn5h6E8y5/xQYNAyd5bpN5Z8r892B6toGzZQVB7qtebH4apDjmvTi5FGZVjVYxalyyQkj4uQbbRQjgCkubSi45Xl4CGtLqZztsKssWz3mcKncgTnq3DHGYYEYiKq0xIj100LGbnvNz20Sgqmw/cH+Bua4GJsWYLEqf/h/yiMgiBbxFxsnwZl0im5vXDlwKPw+QnO2fscDhxZFAwV06bgG0oEoWm9FnjMsfvwm0rUNYFlZ+TOtCEhmhtFp+Tsx9jPCuOd5h2emGdSKD8A6jtwhNa7oQ8RtLEEqwAn44orENa1ibOkxMiiiFpmmJkwgZPOG/zMCjXIrrhDWTDUOZaPx/lEQoInJoE2i43VN/HTGCCw8dKQAwg0jsEXau5ixD0GUothqvuX3B9taoeoFAIvUPEq35YulprMM7ThdKodSHvhnwKG82dCsodRwY428kg2xM/UjiTENog4B6zzZfPhMxFlOSFX4MnrqkAS+8Jamhy1GgoHkEMrsT5+/ofjCx0HjKbT5NuA2V/lmzgJLl3jIERadLzuTYnKGWxVJcGLkWXlEPYLbiaKzbJb2sYxt+Kt5OxQqC1MCAwEAAQ==');
         $mpesa->setEnv('test');// 'live' production environment

         //This creates transaction between an M-Pesa short code to a phone number registered on M-Pesa.

         $result = $mpesa->c2b('11114', '258847607095','10', 'T34000000000000000000', '171717');

         return response()->json($result);
         //dd($result);
       // return Payment::with('orders')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dashboard.payment')->with('payments',Payment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Payment\CreatePayment $createPaymentRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePayment $createPaymentRequest)
    {
         try {
                $created = Payment::Create(
                    $createPaymentRequest->all()
                );
                session()->flash('success','Payment inserted successful');
          return redirect()->back();
          //return response()->json(['Payment'=>$created,'message'=>'Payment inserted successful','status'=>201],201);
        } catch (\Throwable $th) {
            //return response()->json(['error'=>$th],404);
            session()->flash('error','Error inserting Payment');
          return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return $payment->with('orders')->where('id',$payment->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Payment\UpdatePayment $updatePaymentRequest
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayment $updatePaymentRequest, Payment $payment)
    {
         try {
            $payment->update($updatePaymentRequest->all());
               //  return response()->json(['Payment'=>$payment,'message'=>'Payment updated successful','status'=>201],201);
        session()->flash('success','Payment updated successful');
          return redirect()->back();
            } catch (\Throwable $th) {
                session()->flash('error','Error updating Payment');
          return redirect()->back();
            //return response()->json(['error'=>'Error on updating data. Please try again.'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        try {
             $payment->delete();
             session()->flash('success','Payment deleted successful');
          return redirect()->back();
              //return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
            session()->flash('erro','Error deleting Payment');
          return redirect()->back();
              //return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
        }
    }
}
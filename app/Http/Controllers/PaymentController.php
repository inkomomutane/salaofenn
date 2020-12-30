<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\CreatePayment;
use App\Http\Requests\Payment\UpdatePayment;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Payment::with('orders')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Payment\CreatePayment $createPaymentRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePayment $createPaymentRequest)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
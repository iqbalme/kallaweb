<?php

namespace App\Http\Controllers;

use App\Models\Payment;
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
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
	
	public function getPayment(Request $request){
		if ($request->hasHeader('X-CALLBACK-TOKEN')) {
			if($request->header('X-CALLBACK-TOKEN') == 'ddc8ee21298c4c5a813efae52f64b8435bdfde8d1fedcc2535985f90c2a283d3'){
				return response()->json(['status' => 'COMPLETED',
    'message' => 'Payment for the Fixed VA with external id VA_fixed-1541055143 is currently being processed. Please ensure that you have set a callback URL for VA payments via Dashboard Settings and contact us if you do not receive a VA payment callback within the next 5 mins.']);
			}
		}
		return response()->json(['status' => 'FAILED'], 500);
		
	}
	
	public function success_payment_callback(Request $request){
		return response()->json(['status' => 'berhasil'], 200);
	}
	
	public function failed_payment_callback(Request $request){
		return response()->json(['status' => 'gagal'], 200);
	}
}

<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Invoice;
use App\Models\Pendaftar;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function updateInvoice(Request $request){
		$setting = Setting::where('nama_setting', 'xendit_callback_token');
		if($setting->count()){
			if($request->header('X-CALLBACK-TOKEN') == $setting->first()->isi_setting){
				$invoice = Invoice::where(['xendit_invoice_id' => $request->id, 'no_invoice' => $request->external_id]);
				if($invoice->count()){
					$invoice_data = $invoice->first();
					if($request->status == 'PAID'){
						$invoice_data->status_payment = $request->status;
						$invoice_data->save();
						$pendaftar = $invoice_data->pendaftar;
						$pendaftar->aktif = true;
						$invoice_data->pendaftar()->save($pendaftar);
					} elseif ($request->status == 'EXPIRED'){
						$invoice_data->delete();
					};
					return response()->json($invoice_data, 200);
				};
				return response()->json(['message' => 'Sukses validasi callback'], 200);
			}
		}
		return response()->json(['message' => 'Gagal validasi callback'], 401);		
	}
	
	public function success_payment_callback(){
		$referer = request()->headers->get('referer');
		if(str_contains($referer, 'xendit.co')){ //jika referer dari xendit
			return redirect()->route('payment.success');
		};
		return redirect()->route('home');
	}
	
	public function failed_payment_callback(Request $request){
		return redirect()->route('payment.expired');
	}

}

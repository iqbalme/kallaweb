<?php
namespace App\Http\Traits;

use Xendit\Xendit;
use App\Models\Setting;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Pendaftar;

trait CommonTrait
{
	public $xenditApiKey;
	
	public function __construct(){
		$this->xenditApiKey = Setting::where('nama_setting', 'xendit_key_secret')->first()->isi_setting;
	}
	
	public function setSlug($string) {
	   $string = substr(str_replace(' ', '-', $string),0,100); // Replaces all spaces with hyphens with max 100 characters
	   return preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($string)); // Removes special chars.
	}
	
	public function generateInvoiceNo(){
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		return strtoupper(substr(str_shuffle($permitted_chars), 0, 17));
	}
	
	public function buatInvoice($params, $data, $isVoucher, $katalogs){
		Xendit::setApiKey($this->xenditApiKey);
		$createdInvoice = \Xendit\Invoice::create($params);
		if($createdInvoice){
			$invoice = Invoice::create([
				'no_invoice' => $params['external_id'],
				'total' => $params['amount'],
				'use_voucher' => $isVoucher,
				'xendit_invoice_id' => $createdInvoice['id'],
				'status_payment' => $createdInvoice['status']
			]);
			foreach($katalogs as $katalog){
				InvoiceItem::create([
					'invoice_id' => $invoice->id,
					'katalog_id' => $katalog->id,
					'harga' => $katalog->harga
				]);
			}
			Pendaftar::create([
				'nama' => $data['nama_lengkap'],
				'email' => $data['email'],
				'hp' => $data['no_hp'],
				'prodi_id' => $data['prodi'],
				'aktif' => false,
			]);
			return redirect()->away($createdInvoice['invoice_url']);
		} else {
			return 'gagal';
		}		
	}
}
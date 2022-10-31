<?php
namespace App\Http\Traits;

use Xendit\Xendit;
use App\Models\Setting;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Pendaftar;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

trait CommonTrait
{
	public $xenditApiKey;
	
	public function __construct(){
		$this->xenditApiKey = Setting::where('nama_setting', 'xendit_key_secret')->first()->isi_setting;
	}
	
	public function setSlug($string) {
	   $string = str_replace(' ', '-', $string);
	   $string_slug = substr($string,0,100); // Replaces all spaces with hyphens with max 100 characters
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
				$invoice_items = new InvoiceItem([
					'katalog_id' => $katalog->id,
					'harga' => $katalog->harga
				]);
				$invoice->invoice_items()->save($invoice_items);
			}
			$pendaftar = new Pendaftar([
				'nama' => $data['nama_lengkap'],
				'email' => $data['email'],
				'hp' => $data['no_hp'],
				'prodi_id' => $data['prodi'],
				'no_ktp' => $data['no_ktp'],
				'aktif' => false
			]);
			$invoice->pendaftar()->save($pendaftar);				
			return redirect()->away($createdInvoice['invoice_url']);
		}		
	}
	
	public function paginate2($items, $perPage = 5, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total ,$perPage);
    }
	
	public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
	
}
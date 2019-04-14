<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use PDF;
use Carbon\Carbon;

class LaporanController extends AppBaseController
{
    public function index()
    {
    	$barang = Barang::all()->count();        
    	$totalstok = Barang::where('stok',0)->count();        
    	$totalPembelian = DetailPembelian::all()->sum('subtotal');
    	$totalPenjualan = DetailPenjualan::all()->sum('subtotal');
        $Penjualan = Penjualan::all()->pluck('id','tanggal','total');
    	
    	$labaRugi = $totalPenjualan - $totalPembelian;         

        return view('laporans.index')
            ->with(['barang'=>$barang,'totalstok'=>$totalstok,'totalPembelian'=>$totalPembelian,'totalPenjualan'=>$totalPenjualan, 'labaRugi'=>$labaRugi,'penjualan'=>$penjualan]);
    }

        public function prosesLabaRugi(Request $request)
        {
        $tanggalStart 	= Carbon::createFromFormat('d/m/Y', $request->get('tanggal_start'))->format('Y-m-d');
        $tanggalEnd 	= Carbon::createFromFormat('d/m/Y', $request->get('tanggal_end'))->format('Y-m-d');
    	$totalPembelian = Pembelian::whereBetween('tanggal', [$tanggalStart, $tanggalEnd])->sum('total');
    	$totalPenjualan = Penjualan::whereBetween('tanggal', [$tanggalStart, $tanggalEnd])->sum('total');    	
        	
        	if ((int)$totalPenjualan > (int)$totalPembelian ) {
        	    $cekLabaRugi = true; //jika laba true
        	}else{
        		$cekLabaRugi = false; //jika rugi false
        	}
        	$labaRugi = (int)$totalPenjualan - (int)$totalPembelian;
        	return view('laporans.index')
                ->with(['totalPembelian'=>$totalPembelian,'totalPenjualan'=>$totalPenjualan, 'labaRugi'=>$labaRugi, 'cekLabaRugi'=>$cekLabaRugi]);
        }
   public function search(Request $request)
    {

        $from = Carbon::parse($request->input('dari'))->format('Y-m-d'); // asumsi input tanggal menggunakan format d-m-Y
        $to = Carbon::parse($request->input('sampai'))->format('Y-m-d'); // asumsi input tanggal menggunakan format d-m-Y
        $laporan = Barang::whereBetween('created_at', [$from, $to])->with('kategori')->get();
 // dd($laporan);
        return view('laporans.show')->with(['laporan'=>$laporan]);
        
    }
    public function store(Request $request)
    {
        $dari=date('Y-m-d',strtotime($request->input('dari')));
        $sampai=date('Y-m-d',strtotime($request->input('sampai')));
        $laporanstok = Barang::whereBetween('created_at', array($dari, $sampai))->with('kategori')->get();
        return redirect('laporans.index');//store/show/apa');
    }
    public function show()
    {
        $laporandates = Barang::all();

        return view('laporans.show')->with('laporandates',$laporandates);

    }
    
}
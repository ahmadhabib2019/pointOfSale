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
use App\Models\Pelanggan;
use App\Models\Pegawai;
use Carbon\Carbon;

class LaporanController extends AppBaseController
{
    public function index(Request $request)
    {
        $from   = Carbon::parse($request->input('dari'))->format('Y-m-d'); 
        $to     = Carbon::parse($request->input('sampai'))->format('Y-m-d'); 

        $start  = Carbon::parse($request->input('start'))->format('Y-m-d'); 
        $end    = Carbon::parse($request->input('end'))->format('Y-m-d'); 

        $penjualans = Penjualan::whereBetween('created_at', [$from, $to])->get();
        $beli = Pembelian::whereBetween('created_at', [$start,$end])->get();

        $jumlahPembelian    = $beli->sum('total');
        $jumlahPenjualan    = $penjualans->sum('total');

        $grandTotal         = 0;
       $date = \Carbon\Carbon::now();
        return view('laporans.index')
            ->with(['penjualans'    =>$penjualans,
                    'beli'    =>$beli,
                    'jumlahPembelian'=>$jumlahPembelian,
                    'jumlahPenjualan'=>$jumlahPenjualan,
                    // 'totalPendapatan'=>$totalPendapatan,
                    'grandTotal'        =>$grandTotal,
                    'date'        =>$date
            ]);
    }  
    public function prosesLabaRugi(Request $request)
    {
        $from   = Carbon::parse($request->input('dari'))->format('Y-m-d'); 
        $to     = Carbon::parse($request->input('sampai'))->format('Y-m-d'); 

        $start  = Carbon::parse($request->input('start'))->format('Y-m-d'); 
        $end    = Carbon::parse($request->input('end'))->format('Y-m-d'); 

        $penjualans = Penjualan::whereBetween('created_at', [$from, $to])->get();
        $beli       = Pembelian::whereBetween('created_at', [$from,$to])->get();

        $jumlahPembelian    = $beli->sum('total');
        $jumlahPenjualan    = $penjualans->sum('total');
        // $totalPenjualan     = $penjualans->count();        
        // $totalRatarata      = $jumlahPenjualan / $totalPenjualan;

        // $totalPendapatan    = $totalRatarata + $jumlahPenjualan;
        $grandTotal         = $jumlahPenjualan - $jumlahPembelian;
        $date = \Carbon\Carbon::now();
        return view('laporans.index')
            ->with(['penjualans'=>$penjualans,
                    'beli'      =>$beli,
                    'jumlahPembelian' =>$jumlahPembelian,
                    'jumlahPenjualan' =>$jumlahPenjualan,                
                    'grandTotal'        =>$grandTotal,
                    'date'        =>$date
            ]);
    }  
}
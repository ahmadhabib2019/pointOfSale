<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgamaRequest;
use App\Http\Requests\UpdateAgamaRequest;
use App\Repositories\AgamaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\DetailPembelian;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use PDF;

class AgamaController extends AppBaseController
{    
    private $agamaRepository;

    public function __construct(AgamaRepository $agamaRepo)
    {
        $this->agamaRepository = $agamaRepo;
    }  
        public function index()
    {       
        $barang = Barang::all()->count();
        $totalstok = Barang::where('stok',0)->count();        
        
        $totalPembelian = DetailPembelian::all()->sum('subtotal');
        
         $totalPenjualan = DetailPenjualan::all()->sum('subtotal');
          $labaRugi = $totalPenjualan - $totalPembelian;         
          $penjualan = Penjualan::all()->count();
          $kategori = Kategori::all()->count();

        return view('agamas.index')
          ->with(['barang'        =>$barang,
                  'totalstok'     =>$totalstok,
                  'totalPembelian'=>$totalPembelian,
                  'totalPenjualan'=>$totalPenjualan,
                  'labaRugi'      =>$labaRugi,
                  'penjualan'     =>$penjualan,
                  'kategori'      =>$kategori]);
    }
        public function current()
        {
         $from = date('Y-m-d' . ' 00:00:00', time()); //need a space after dates.
         $to = date('Y-m-d' . ' 24:60:60', time());
         dd($to);
           $current = DetailPenjualan::where('user_id',$this->user_id)
                ->where('status','active')
                ->whereBetween('created_at', array($from, $to))->first();
           
            return $current;
          }

}

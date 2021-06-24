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
use App\Models\retur;
use DB;

class AgamaController extends AppBaseController
{    
        public function index()
        {       
          $now            = \Carbon\Carbon::now()->format('d, M Y');      
          $barang         = Barang::count();
          $totalstok      = Barang::where('stok',0)->count();          
          // $totalstok      = DB::table('barangs')->where('stok','<=5')->count();
          // dd($totalstok);
          $penjualan      = Penjualan::all()->count();
          $kategori       = Kategori::all()->count();
          $retur          = retur::all()->count();

          return view('agamas.index')->with([
                    'barang'        =>$barang,
                    'totalstok'     =>$totalstok,              
                    'penjualan'     =>$penjualan,
                    'now'           =>$now,
                    'kategori'      =>$kategori,
                    'retur'         =>$retur
                  ]);
        }
}

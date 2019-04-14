<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
class DetailPenjualanController extends Controller
{
    public function index(){
    	$detail = DetailPenjualan::all();
    	$penjualan = Penjualan::pluck('id','total');
    	return view('detail_penjualans.index')->with('detail',$detail)->with( 'penjualan',$penjualan);
    }
}

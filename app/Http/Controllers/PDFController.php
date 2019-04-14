<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
class PDFController extends Controller
{
    public function getPDF()
    {
    	$barangs=Barang::all();
    	$kategori= Kategori::all();

    	// $pdf =PDF::loadView('pdf.index',['barangs'=>$barangs,'kategori'=>$kategori]);
    	// return $pdf->download('barang.pdf');
    	 return view('pdf.index')->with(['barangs'=>$barangs,'kategori'=>$kategori]);
    }
}
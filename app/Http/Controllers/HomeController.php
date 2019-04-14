<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDasborRequest;
use App\Http\Requests\UpdateDasborRequest;
use App\Repositories\DasborRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Barang;
use App\Models\Kategori;


class HomeController extends AppBaseController
{
    /** @var  DasborRepository */
    private $dasborRepository;

  
    public function index()
    {
       $barang = Barang::all()->count();
        $kategori = Kategori::all()->count();
        

        return view('home')
            ->with(['barang'=>$barang, 'kategori'=>$kategori]);
    }
   
}

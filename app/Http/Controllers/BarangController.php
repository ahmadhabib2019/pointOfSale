<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Repositories\BarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Excel;
use DB;
use File;
use App\Models\Kategori;
use App\Models\Barang;
use App\Exports\BarangReport;
use App\Exports\BarangsExport;
use App\Imports\BarangsImport;

class BarangController extends AppBaseController
{    
    public function earch(Request $request)
    {        
        $search = $request->get('q');      
        $cari = Barang::where('nama','LIKE', '%'. $search.'%')
        ->orwhere('kode', 'LIKE', '%' . $search . '%')->with('kategori')->get();      
        return view('barangs.index',[
            'barangs'=>$cari,
            'kategori'=>$cari
            ]);
    }

     public function export() 
    {
        return Excel::download(new BarangsExport, 'barang.xlsx');
    }
    
    public function getUpload()
    {
        $file = request()->import;        
        $file_name = $file->getClientOriginalName();
        $file->move('files',$file_name);
        $results= Excel::import(new BarangsImport, "files/$file_name");
                
        Flash::success('Barang Upload Successfully.');

        return redirect()->route('barangs.index');

    }
    private $barangRepository;

    public function __construct(BarangRepository $barangRepo)
    {
        $this->barangRepository = $barangRepo;
    }

    public function index(Request $request)
    {
        // $this->barangRepository->pushCriteria(new RequestCriteria($request));
        $barangs =Barang::get();
        $jumlah = Barang::count();

        return view('barangs.index')
            ->with(['barangs'=> $barangs,'jumlah'=>$jumlah]);
    }

    public function create()
    {
    $kategori = Kategori::pluck('nama','id');
        return view('barangs.create')->with('kategori',$kategori);
    }
    

    public function store(CreateBarangRequest $request)
    {
        $input = $request->all();

        $barang = $this->barangRepository->create($input);

        Flash::success('Barang saved successfully.');

        return redirect(route('barangs.index'));
    }

   
    public function show($id)
    {
        $barang = $this->barangRepository->findWithoutFail($id);
        
        if (empty($barang)) {
            Flash::error('Barang not found');
            return redirect(route('barangs.index'));
        }

        return view('barangs.show')->with('barang', $barang);
    }

    public function edit($id)
    {
        $barang = $this->barangRepository->findWithoutFail($id);

        if (empty($barang)) {
            Flash::error('Barang not found');
            return redirect(route('barangs.index'));

        }   
        $kategori = Kategori::pluck('nama','id');
        return view('barangs.edit')
        ->with('barang', $barang)
        ->with('kategori', $kategori);
    }
    
    public function update($id, UpdateBarangRequest $request)
    {
        // request()->validate([
        //     'kode' => 'required|unique:barang,kode,' . $id . ',id'
        // ]);
        // $request->validate([
        //     'kode' => 'unique:barang,kode,' . $barang->id
        // ]);
        $barang = $this->barangRepository->findWithoutFail($id);
        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }
        $barang = $this->barangRepository->update($request->all(), $id);


        Flash::success('Barang updated successfully.');

        return redirect(route('barangs.index'));
    }

    /**
     * Remove the specified Barang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barang = $this->barangRepository->findWithoutFail($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        $this->barangRepository->delete($id);

        Flash::success('Barang deleted successfully.');

        return redirect(route('barangs.index'));
    }

      public function search($id){
        $barang = $this->barangRepository->findWithoutFail($id);
        return $barang;
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use App\Repositories\PembelianRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Carbon\Carbon;
use App\Models\Pembelian;
class PembelianController extends AppBaseController
{
    /** @var  PembelianRepository */
    private $pembelianRepository;

    public function __construct(PembelianRepository $pembelianRepo)
    {
        $this->pembelianRepository = $pembelianRepo;
    }

    /**
     * Display a listing of the Pembelian.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pembelianRepository->pushCriteria(new RequestCriteria($request));
        $pembelians =  Pembelian::orderBy('id','desc')->paginate(15);
        $beli = Pembelian::paginate(15);
        return view('pembelians.index')
            ->with('pembelians', $pembelians)
            ->with('beli', $beli);
    }

    /**
     * Show the form for creating a new Pembelian.
     *
     * @return Response
     */
    public function create()
    {
        $supplier =\App\Models\Supplier::pluck('nama','id');
        $pegawai =\App\Models\Pegawai::pluck('nama','id');
        $barang =\App\Models\Barang::pluck('nama','id');
        $user = \App\Models\User::pluck('name','id');
        return view('pembelians.create')
        ->with('supplier',$supplier)
        ->with('barang',$barang)
        ->with('user',$user)
        ->with('pegawai',$pegawai);
    }

    /**
     * Store a newly created Pembelian in storage.
     *
     * @param CreatePembelianRequest $request
     *
     * @return Response
     */
    public function store(CreatePembelianRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $pembelian = $this->pembelianRepository->create($input);
            foreach ($input['kode'] as $key => $row) {
                $detail_pembelian = new \App\Models\Detailpembelian();
                $barang = \App\Models\Barang::where('kode', $input['kode'][$key])->first();
                $detail_pembelian->barang_id = $barang->id;
                $detail_pembelian->harga_beli_baru = $input['harga_beli_baru'][$key];
                $detail_pembelian->satuan = $input['satuan'][$key];
                $detail_pembelian->subtotal = $input['subtotal'][$key];
                

                if ($input['satuan'][$key] === 'Unit') {
                    $detail_pembelian->qty = $input['qty'][$key];
                    $detail_pembelian->pembelian_id = $pembelian->id;
                    $detail_pembelian->save();
                    $new_stok = (int)$barang->stok + ((int)$input['qty'][$key] * 1);
                }                 
                elseif ($input['satuan'][$key] === 'Lusin') {
                    $detail_pembelian->qty = $input['qty'][$key];
                    $detail_pembelian->pembelian_id = $pembelian->id;
                    $detail_pembelian->save();
                    $new_stok = (int)$barang->stok + ((int)$input['qty'][$key] * 12);
                    $barang->stok = $new_stok;
                }
                elseif ($input['satuan'][$key] === 'Gross') {
                    $detail_pembelian->qty = $input['qty'][$key];
                    $detail_pembelian->pembelian_id = $pembelian->id;
                    $detail_pembelian->save();
                    $new_stok = (int)$barang->stok + ((int)$input['qty'][$key] * 144);
                    $barang->stok = $new_stok;
                }
                elseif ($input['satuan'][$key] === 'Kodi') {
                    $detail_pembelian->qty = $input['qty'][$key];
                    $detail_pembelian->pembelian_id = $pembelian->id;
                    $detail_pembelian->save();
                    $new_stok = (int)$barang->stok + ((int)$input['qty'][$key] * 20);
                    $barang->stok = $new_stok;
                }

                if ($input['harga_beli_baru'][$key] != 0) {
                    $detail_pembelian->harga_beli_baru = $input['harga_beli_baru'][$key];
                    $detail_pembelian->save();
                    $rataRata = ($barang->harga_beli + $input['harga_beli_baru'][$key])/2;

                    // $new_harga = ( $input['harga_beli_baru'][$key]);
                    // $barang->harga_beli = $new_harga;
                    $barang->harga_beli = $rataRata;

                }
                    $barang->save();
            }
            $result = $pembelian->id;
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        Flash::success('Pembelian saved successfully.');

        return redirect(route('pembelians.index'));
    }

    /**
     * Display the specified Pembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        return view('pembelians.show')->with('pembelian', $pembelian);
    }

    /**
     * Show the form for editing the specified Pembelian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }
        $supplier =\App\Models\Supplier::pluck('nama','id');
        $pegawai =\App\Models\Pegawai::pluck('nama','id');
        $barang =\App\Models\Barang::pluck('nama','id');

        return view('pembelians.edit')->with('pembelian', $pembelian)
        ->with('supplier',$supplier)
        ->with('barang',$barang)
        ->with('pegawai',$pegawai);
    }

    /**
     * Update the specified Pembelian in storage.
     *
     * @param  int              $id
     * @param UpdatePembelianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembelianRequest $request)
    {
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        $pembelian = $this->pembelianRepository->update($request->all(), $id);

        Flash::success('Pembelian updated successfully.');

        return redirect(route('pembelians.index'));
    }

    /**
     * Remove the specified Pembelian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pembelian = $this->pembelianRepository->findWithoutFail($id);

        if (empty($pembelian)) {
            Flash::error('Pembelian not found');

            return redirect(route('pembelians.index'));
        }

        $this->pembelianRepository->delete($id);

        Flash::success('Pembelian deleted successfully.');

        return redirect(route('pembelians.index'));
    }
     public function search(Request $request)
    {     
        $pembelians = Pembelian::where(function($query) use($request) {
            $request->has('tanggal');
            $query->where('tanggal', $request->tanggal);              
        })->get();
         $beli = Pembelian::paginate(15);
 
        return view('pembelians.index')->with(['pembelians'=>$pembelians,'beli'=>$beli]);
    }
     public function barangajax(Request $request)
    {   
        $barang = \App\Models\Barang::all();
        return response()->json($barang);
    }
}

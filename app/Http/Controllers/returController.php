<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatereturRequest;
use App\Http\Requests\UpdatereturRequest;
use App\Repositories\returRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use PDF;
use Carbon\Carbon;
use App\Models\retur;
class returController extends AppBaseController
{
    /** @var  returRepository */
    private $returRepository;

    public function __construct(returRepository $returRepo)
    {
        $this->returRepository = $returRepo;
    }

    /**
     * Display a listing of the retur.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->returRepository->pushCriteria(new RequestCriteria($request));
        $returs = $this->returRepository->all();

        return view('returs.index')
            ->with('returs', $returs);
    }

    /**
     * Show the form for creating a new retur.
     *
     * @return Response
     */
    public function create()
    {   
        $supplier =\App\Models\Supplier::pluck('nama','id');
        $pegawai =\App\Models\Pegawai::pluck('nama','id');
        $barang =\App\Models\Barang::pluck('nama','id');
        $detail = \App\Models\DetailRetur::pluck('qty','id');
        $user = \App\Models\User::pluck('name','id');
        
        return view('returs.create')
        ->with('supplier',$supplier)
        ->with('barang',$barang)
        ->with('detail',$detail)
        ->with('user',$user)
        ->with('pegawai',$pegawai);
    }

    /**
     * Store a newly created retur in storage.
     *
     * @param CreatereturRequest $request
     *
     * @return Response
     */
    public function store(CreatereturRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $retur = $this->returRepository->create($input);
            foreach ($input['kode'] as $key => $row) {
                $detail_retur = new \App\Models\DetailRetur();
                $barang = \App\Models\Barang::where('kode', $input['kode'][$key])->first();
                $detail_retur->barang_id = $barang->id;
                $detail_retur->qty = $input['qty'][$key];
                $detail_retur->subtotal = $input['subtotal'][$key];
                $detail_retur->status = $input['status'][$key];
                $detail_retur->retur_id = $retur->id;
                $detail_retur->save();
                $new_stok = (int)$barang->stok - (int)$input['qty'][$key];
                $barang->stok = $new_stok;
                $barang->save();
            }
            $result = $retur->id;
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        Flash::success('Retur saved successfully.');

        return redirect(route('returs.index'));
    }

    /**
     * Display the specified retur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $retur = $this->returRepository->findWithoutFail($id);

        if (empty($retur)) {
            Flash::error('Retur not found');

            return redirect(route('returs.index'));
        }

        return view('returs.show')->with('retur', $retur);
    }

    /**
     * Show the form for editing the specified retur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $retur = $this->returRepository->findWithoutFail($id);

        if (empty($retur)) {
            Flash::error('Retur not found');

            return redirect(route('returs.index'));
        }
        $supplier =\App\Models\Supplier::pluck('nama','id');
        $pegawai =\App\Models\Pegawai::pluck('nama','id');
        $barang =\App\Models\Barang::pluck('nama','id');
        $detail = \App\Models\DetailRetur::pluck('qty','id');
        $user = \App\Models\User::pluck('name','id');
        
        return view('returs.edit')
        ->with('supplier',$supplier)
        ->with('barang',$barang)
        ->with('detail',$detail)
        ->with('user',$user)
        ->with('pegawai',$pegawai)
        ->with('retur',$retur);    
    }

    /**
     * Update the specified retur in storage.
     *
     * @param  int              $id
     * @param UpdatereturRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereturRequest $request)
    {
        $retur = $this->returRepository->findWithoutFail($id);

        if (empty($retur)) {
            Flash::error('Retur not found');

            return redirect(route('returs.index'));
        }

        $retur = $this->returRepository->update($request->all(), $id);

        Flash::success('Retur updated successfully.');

        return redirect(route('returs.index'));
    }

    /**
     * Remove the specified retur from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $retur = $this->returRepository->findWithoutFail($id);

        if (empty($retur)) {
            Flash::error('Retur not found');

            return redirect(route('returs.index'));
        }

        $this->returRepository->delete($id);

        Flash::success('Retur deleted successfully.');

        return redirect(route('returs.index'));
    }
    public function search(Request $request)
    {     
        $returs = retur::where(function($query) use($request) {
            $request->has('tanggal');
            $query->where('tanggal', $request->tanggal);              
        })->get();
         // $beli = Pembelian::paginate(15);
 
        return view('returs.index')->with(['returs'=>$returs]);
    }
}

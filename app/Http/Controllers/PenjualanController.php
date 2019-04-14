<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreatePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Repositories\PenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use PDF;
use Carbon\Carbon;
use App\Models\Penjualan;
class PenjualanController extends AppBaseController
{
    /** @var  PenjualanRepository */
    private $penjualanRepository;

    public function __construct(PenjualanRepository $penjualanRepo)
    {
        $this->penjualanRepository = $penjualanRepo;
    }
    public function index(Request $request)
    {
        $this->penjualanRepository->pushCriteria(new RequestCriteria($request));
        $penjualans = $this->penjualanRepository->all();
        // $detail = \App\Models\DetailPenjualan::pluck('id','qty');

        return view('penjualans.index')
        // ->with('detail',$detail)
        ->with('penjualans', $penjualans);
    }

    public function search(Request $request)
    {
        $from = Carbon::parse($request->input('dari'))->format('Y-m-d'); 
        $to = Carbon::parse($request->input('sampai'))->format('Y-m-d'); 

        $penjualans = Penjualan::whereBetween('created_at', [$from, $to])->get();
        
        return view('penjualans.index')->with(['penjualans'=>$penjualans]);
    }
    
    public function pdf(Request $request)
    {
        $from = Carbon::parse($request->input('dari'))->format('Y-m-d'); 
        $to = Carbon::parse($request->input('sampai'))->format('Y-m-d'); 

        $penjualans = Penjualan::whereBetween('created_at', [$from, $to])->get();
        // dd($penjualans);
        $pdf =PDF::loadView('penjualans.pdfprint',['penjualans'=>$penjualans]);
        return $pdf->stream();
        redirect ('penjualans.index');
    }

    /**
     * Show the form for creating a new Penjualan.
     *
     * @return Response
     */
    public function create()
    {
        $pelanggan =\App\Models\Pelanggan::pluck('nama','id');
        $pegawai =\App\Models\Pegawai::pluck('nama','id');
        $barang =\App\Models\Barang::pluck('nama','id');
        $detail = \App\Models\DetailPenjualan::pluck('qty','id');
        // $user =\App\Models\User::pluck('name','id');

        return view('penjualans.create')
        ->with('pelanggan',$pelanggan)
        ->with('barang',$barang)
        ->with('detail',$detail)
        ->with('pegawai',$pegawai);
        // ->with('user',$user);
    }

    /**
     * Store a newly created Penjualan in storage.
     *
     * @param CreatePenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreatePenjualanRequest $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            // dd($input);
            $penjualan = $this->penjualanRepository->create($input);
            foreach ($input['kode'] as $key => $row) {
                $detail_penjualan = new \App\Models\DetailPenjualan();
                $barang = \App\Models\Barang::where('kode', $input['kode'][$key])->first();
                $detail_penjualan->barang_id = $barang->id;
                $detail_penjualan->qty = $input['qty'][$key];
                $detail_penjualan->subtotal = $input['subtotal'][$key];
                $detail_penjualan->penjualan_id = $penjualan->id;
                $detail_penjualan->save();
                $new_stok = (int)$barang->stok - (int)$input['qty'][$key];
                $barang->stok = $new_stok;
                $barang->save();
            }
            $result = $penjualan->id;
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        Flash::success('Penjualan saved successfully.');

        return redirect(route('penjualans.index'));
    }

    /**
     * Display the specified Penjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualans.index'));
        }

        return view('penjualans.show')->with('penjualan', $penjualan);
    }

    /**
     * Show the form for editing the specified Penjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualans.index'));
        }

        $pelanggan =\App\Models\Pelanggan::pluck('nama','nama');
        $pegawai =\App\Models\Pegawai::pluck('nama','id');
        $barang =\App\Models\Barang::pluck('nama','id');
        $detail = \App\Models\DetailPenjualan::pluck('qty','id');
        // $user =\App\Models\User::pluck('name','id');
        return view('penjualans.edit')->with('penjualan',$penjualan)
        ->with('pelanggan',$pelanggan)
        ->with('barang',$barang)
        ->with('detail',$detail)
        ->with('pegawai',$pegawai);
        // ->with('user',$user);
    }

    /**
     * Update the specified Penjualan in storage.
     *
     * @param  int              $id
     * @param UpdatePenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenjualanRequest $request)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualans.index'));
        }

        $penjualan = $this->penjualanRepository->update($request->all(), $id);

        Flash::success('Penjualan updated successfully.');

        return redirect(route('penjualans.index'));
    }

    /**
     * Remove the specified Penjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualans.index'));
        }

        $this->penjualanRepository->delete($id);

        Flash::success('Penjualan deleted successfully.');

        return redirect(route('penjualans.index'));
    }
    public function print($id) {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);
        $id = $penjualan->id;
        $pdf = PDF::loadView('penjualans.print', compact('penjualan', 'id'))->setPaper('A5', 'potrait');
        return $pdf->stream('invoice.pdf');

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');
            return redirect(route('penjualans.index'));
        }
        return view('penjualans.print', compact('penjualan'));
    }
    public function getPDF() {
    $penjualans = Penjualans::all();
    $pdf =PDF::loadView('pdf.indexx',['penjualans'=>$penjualans,'kategoris'=>$kategoris]);
        return $pdf->download('bar-bara.pdf');
    }
}
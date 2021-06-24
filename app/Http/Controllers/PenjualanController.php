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
        $penjualans = Penjualan::orderBy('id','desc')->get();/*menampilkan data berdasarkan data terbesar ke terkecil*/
        $total = Penjualan::all()->count();
    // $penjual = Penjualan::whereMonth('created_at',\Carbon\Carbon::now()->format('m'))->get();
    /*menampilkan berdasarkan bulan saat ini*/
        
        return view('penjualans.index')
        ->with(['penjualans'=>$penjualans,'total'=>$total]);
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
        $count = $penjualans->count();
        $date = \Carbon\Carbon::now()->format('d, M Y');
        $total= Penjualan::all()->count();
        // if(empty($penjualans)){
        //     Flash::error('Penjualan not found');
        //     return redirect(route('penjualans.index'));
        // }

        $pdf =PDF::loadView('penjualans.pdfprint',[
            'date'=>$date,
            'penjualans'=>$penjualans,
            'count'=>$count]);
        return $pdf->stream();
        redirect ('penjualans.index',['date'=>$date]);
    }

    public function create()
    {           
        $pelanggan =\App\Models\Pelanggan::pluck('nama','id');
        $pegawai =\App\Models\Pegawai::pluck('nama','id');
        $barang =\App\Models\Barang::pluck('nama','id');
        $barangg =\App\Models\Barang::pluck('kode','nama','id');
        $detail = \App\Models\DetailPenjualan::pluck('qty','id');
        $user = \App\Models\User::pluck('name','id');
        
        return view('penjualans.create')
        ->with('pelanggan',$pelanggan)
        ->with('barang',$barang)
        ->with('barangg',$barangg)
        ->with('detail',$detail)
        ->with('user',$user)
        ->with('pegawai',$pegawai);        
    }

    public function store(CreatePenjualanRequest $request)
    {
        DB::beginTransaction();
        try {
                $input = $request->all();
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
                    if($new_stok < 0){
                        Flash::error('Barang Habis');
                        DB::rollBack();
                        return redirect(route('penjualans.create'));
                    }elseif($new_stok >=0){
                        $barang->stok = $new_stok;
                        $barang->save();
                        $result = $penjualan->id;
                        DB::commit();       
                        
                        Flash::success('Penjualan saved successfully.');
                        return redirect(route('penjualans.index'));
                        }
                }            
            }
            catch (Exception $e) {
                // $input = $request->all();
                // $penjualan = $this->penjualanRepository->create($input);
                // foreach ($input['kode'] as $key => $row) {
                //     $barang = \App\Models\Barang::where('kode', $input['kode'][$key])->first();
                //     $new_stok = (int)$barang->stok - (int)$input['qty'][$key];
                //     if($new_stok < 0){
                //         Flash::error('Barang Habis');
                //     }
                }
        }

    public function show($id)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');
            return redirect(route('penjualans.index'));
        }

        return view('penjualans.show')->with('penjualan', $penjualan);
    }

   
    public function edit($id)
    {
        $penjualan = $this->penjualanRepository->findWithoutFail($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualans.index'));
        }

        $pelanggan =\App\Models\Pelanggan::pluck('nama','nama');
        $pegawai =\App\Models\Pegawai::pluck('nama','id');
        $barang =\App\Models\Barang::pluck('kode','nama','id');
        $detail = \App\Models\DetailPenjualan::pluck('qty','id');
        $user = \App\Models\User::pluck('name','id');
        
        return view('penjualans.edit')->with('penjualan',$penjualan)
        ->with('pelanggan',$pelanggan)
        ->with('barang',$barang)
        ->with('detail',$detail)
        ->with('user',$user)
        ->with('pegawai',$pegawai);
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
        $pdf = PDF::loadView('penjualans.print', compact('penjualan', 'id'))->setPaper('A7', 'potrait');
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

    public function barangajax(Request $request)
    {   
        $barang = \App\Models\Barang::all();
        return response()->json($barang);
    }
}
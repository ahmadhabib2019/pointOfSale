<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Repositories\PegawaiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use File;
use App\Models\Agama;
use App\Models\Pegawai;
class PegawaiController extends AppBaseController
{
    /** @var  PegawaiRepository */
    private $pegawaiRepository;
    public function earch(Request $request)
    {        
       $search = $request->get('q');          
        $cari = Pegawai::where('nama','LIKE', '%'. $search.'%')->paginate(10);
        return view('pegawais.index',['pegawais'=>$cari,'pegawai'=>$cari]);
    }
    public function __construct(PegawaiRepository $pegawaiRepo)
    {
        $this->pegawaiRepository = $pegawaiRepo;
    }

    /**
     * Display a listing of the Pegawai.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pegawaiRepository->pushCriteria(new RequestCriteria($request));
        $pegawais = $this->pegawaiRepository->all();

        return view('pegawais.index')
            ->with('pegawais', $pegawais);
    }

    /**
     * Show the form for creating a new Pegawai.
     *
     * @return Response
     */
    public function create()
    {
        
        return view('pegawais.create');
    }

    /**
     * Store a newly created Pegawai in storage.
     *
     * @param CreatePegawaiRequest $request
     *
     * @return Response
     */
    public function store(CreatePegawaiRequest $request)
    {
        $input = $request->all();
        // $imageName = time().'.'.request()->foto-> getClientOriginalExtension();
        // request()->foto->move(public_path('images'),$imageName);

        // $input['foto']=$imageName;        
        $pegawai = $this->pegawaiRepository->create($input);

        Flash::success('Pegawai saved successfully.');

        return redirect(route('pegawais.index'));
    }

    /**
     * Display the specified Pegawai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');

            return redirect(route('pegawais.index'));
        }

        return view('pegawais.show')->with('pegawai', $pegawai);
    }

    /**
     * Show the form for editing the specified Pegawai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');
            return redirect(route('pegawais.index'));
        }         
        return view('pegawais.edit')->with('pegawai', $pegawai);
    }

    /**
     * Update the specified Pegawai in storage.
     *
     * @param  int              $id
     * @param UpdatePegawaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePegawaiRequest $request)
    {
         $input =$request->all();
         $pegawai = $this->pegawaiRepository->update($input, $id);
       
        if (empty($pegawai)) {
            Flash::error('Pegawai not found');
            return redirect(route('pegawais.index'));
        }
         if (!empty($request->foto)){
            File::delete(public_path("images/".$pegawai->foto));
            $imageName = time().'.'.request()->foto-> getClientOriginalExtension();
            request()->foto->move(public_path("images"),$imageName);
            $input['foto'] = $imageName;
            }

       
        Flash::success('Pegawai updated successfully.');
        return redirect(route('pegawais.index'));
    }

    /**
     * Remove the specified Pegawai from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pegawai = $this->pegawaiRepository->findWithoutFail($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');

            return redirect(route('pegawais.index'));
        }

        $this->pegawaiRepository->delete($id);

        Flash::success('Pegawai deleted successfully.');

        return redirect(route('pegawais.index'));
    }
}

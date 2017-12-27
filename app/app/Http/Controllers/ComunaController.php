<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ComunaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateComunaRequest;
use App\Http\Requests\UpdateComunaRequest;
use App\Repositories\ComunaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Pais;
use App\Models\Comuna;

class ComunaController extends AppBaseController
{
    /** @var  ComunaRepository */
    private $comunaRepository;

    public function __construct(ComunaRepository $comunaRepo)
    {
        $this->comunaRepository = $comunaRepo;
    }

    /**
     * Restore a soft deleted Ciudad
     *
     * @return Response
     */
    public function restore($id){
        Comuna::withTrashed()->find($id)->restore();
        Flash::success('Comuna restaurada.');

        $ciudades = \DB::table('comunas')
            ->leftJoin('pais', 'comunas.pais_id', '=', 'pais.id')
            ->select('comunas.id', 'comunas.nombre', 'pais.nombre as nombre_pais', 'pais.id as pais_id')
            ->whereNotNull('comunas.deleted_at')
            ->paginate(5);

        return redirect(route('comunas.deleted'));
    }

    /**
     * Display a listing of the deleted Ciudad .
     *
     * @return Response
     */
    public function deleted()
    {
        $comunas = \DB::table('comunas')
            ->leftJoin('pais', 'comunas.pais_id', '=', 'pais.id')
            ->select('comunas.id', 'comunas.nombre', 'pais.nombre as nombre_pais', 'pais.id as pais_id')
            ->whereNotNull('comunas.deleted_at')
            ->paginate(5);


        return view('comunas.index', ['states' => $comunas,
            'deletedData'=>'1',
            'btn' => 'btn-success',
            'text_button' => 'Restaurar']);
    }

    /**
     * Display a listing of the Comuna.
     *
     * @return Response
     */
    public function index()
    {
        $comunas = \DB::table('comunas')
            ->leftJoin('pais', 'comunas.pais_id', '=', 'pais.id')
            ->select('comunas.id', 'comunas.nombre', 'pais.nombre as nombre_pais', 'pais.id as pais_id')
            ->whereNull('comunas.deleted_at')
            ->paginate(5);

        return view('comunas.index', ['states' => $comunas,
            'deletedData'=>'0',
            'btn' => 'btn-danger',
            'text_button'=> 'Borrar']);
    }

    /**
     * Show the form for creating a new Comuna.
     *
     * @return Response
     */
    public function create()
    {
        $paises = \DB::table('pais')->whereNull('deleted_at')->pluck('nombre', 'id');
        return view('comunas.create')->with('countries', $paises);
    }

    /**
     * Store a newly created Comuna in storage.
     *
     * @param CreateComunaRequest $request
     *
     * @return Response
     */
    public function store(CreateComunaRequest $request)
    {
        $input = $request->all();

        $comuna = $this->comunaRepository->create($input);

        Flash::success('Comuna saved successfully.');

        return redirect(route('comunas.index'));
    }

    /**
     * Display the specified Comuna.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comuna = $this->comunaRepository->findWithoutFail($id);

        if (empty($comuna)) {
            Flash::error('Comuna not found');

            return redirect(route('comunas.index'));
        }

        return view('comunas.show')->with('comuna', $comuna);
    }

    /**
     * Show the form for editing the specified Comuna.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comuna = $this->comunaRepository->findWithoutFail($id);

        if (empty($comuna)) {
            Flash::error('Comuna not found');

            return redirect(route('comunas.index'));
        }
        $paises = Pais::all();
        return view('comunas.edit')->with(['state' => $comuna, 'countries'=>$paises]);
    }

    /**
     * Update the specified Comuna in storage.
     *
     * @param  int              $id
     * @param UpdateComunaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComunaRequest $request)
    {
        $comuna = $this->comunaRepository->findWithoutFail($id);

        if (empty($comuna)) {
            Flash::error('Comuna not found');

            return redirect(route('comunas.index'));
        }

        $comuna = $this->comunaRepository->update($request->all(), $id);

        Flash::success('Comuna updated successfully.');

        return redirect(route('comunas.index'));
    }

    /**
     * Remove the specified Comuna from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comuna = $this->comunaRepository->findWithoutFail($id);

        if (empty($comuna)) {
            Flash::error('Comuna not found');

            return redirect(route('comunas.index'));
        }

        $this->comunaRepository->delete($id);

        Flash::success('Comuna deleted successfully.');

        return redirect(route('comunas.index'));
    }

    public function loadStates($countryId) {
        $states = Comuna::where('pais_id', '=', $countryId)->get(['id', 'nombre']);
        return response()->json($states);
    }

    /**
     * Search state from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'comunas.nombre' => $request['name'],
            'deletedData' => $request['deletedData'],
        ];

        if($request['deletedData'] == 1){
            $btn = "btn-success";
            $text_button = "Restaurar";
        }else{
            $btn = "btn-danger";
            $text_button = "Borrar";
        }

        $comunas = $this->doSearchingQuery($constraints);
        return view('comunas.index', ['states' => $comunas,
            'searchingVals' => $constraints,
            'deletedData' => $request['deletedData'],
            'btn'=>$btn,
            'text_button'=>$text_button]);
    }

    private function doSearchingQuery($constraints) {
        $query = \DB::table('comunas');
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if($fields[$index] != "deletedData"){
                if ($constraint != null) {
                    $query = $query
                        ->where( $fields[$index], 'like', '%'.$constraint.'%');
                }
            }
            if($fields[$index] == "deletedData"){
                $constraint ? $query =  $query->whereNotNull('comunas.deleted_at') : $query = $query->whereNull('comunas.deleted_at');

            }

            $index++;
        }

        $query = $query
                ->leftJoin('pais', 'comunas.pais_id', '=', 'pais.id')
                ->select('comunas.id', 'comunas.nombre', 'pais.nombre as nombre_pais', 'pais.id as pais_id');

        return $query->paginate(5);
    }

}

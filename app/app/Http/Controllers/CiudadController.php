<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CiudadDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCiudadRequest;
use App\Http\Requests\UpdateCiudadRequest;
use App\Repositories\CiudadRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Comuna;
use App\Models\Ciudad;

class CiudadController extends AppBaseController
{
    /** @var  CiudadRepository */
    private $ciudadRepository;

    public function __construct(CiudadRepository $ciudadRepo)
    {
        $this->ciudadRepository = $ciudadRepo;
    }

    /**
     * Restore a soft deleted Ciudad
     *
     * @return Response
     */
    public function restore($id){
        Ciudad::withTrashed()->find($id)->restore();
        Flash::success('Ciudad restaurada.');

        $ciudades = \DB::table('ciudades')
            ->leftJoin('comunas', 'ciudades.comunas_id', '=', 'comunas.id')
            ->select('ciudades.id', 'ciudades.nombre', 'comunas.nombre as nombre_comuna', 'comunas.id as comunas_id')
            ->whereNotNull('ciudades.deleted_at')
            ->paginate(5);

        return redirect(route('ciudades.deleted'));
    }

    /**
     * Display a listing of the deleted Ciudad .
     *
     * @return Response
     */
    public function deleted()
    {
        $ciudades = \DB::table('ciudades')
            ->leftJoin('comunas', 'ciudades.comunas_id', '=', 'comunas.id')
            ->select('ciudades.id', 'ciudades.nombre', 'comunas.nombre as nombre_comuna', 'comunas.id as comunas_id')
            ->whereNotNull('ciudades.deleted_at')
            ->paginate(5);
        return view('ciudades.index', ['ciudades' => $ciudades,
                                             'deletedData'=>'1',
                                             'btn' => 'btn-success',
                                             'text_button' => 'Restaurar']);
    }

    /**
     * Display a listing of the Ciudad.
     *
     * @return Response
     */
    public function index()
    {
        $ciudades = \DB::table('ciudades')
            ->leftJoin('comunas', 'ciudades.comunas_id', '=', 'comunas.id')
            ->select('ciudades.id', 'ciudades.nombre', 'comunas.nombre as nombre_comuna', 'comunas.id as comunas_id')
            ->whereNull('ciudades.deleted_at')
            ->paginate(5);

        return view('ciudades.index', ['ciudades' => $ciudades,
                                             'deletedData'=>'0',
                                             'btn' => 'btn-danger',
                                             'text_button'=> 'Borrar']);
    }

    /**
     * Show the form for creating a new Ciudad.
     *
     * @return Response
     */
    public function create()
    {
        $comunas = \DB::table('comunas')->whereNull('deleted_at')->pluck('nombre', 'id');
        return view('ciudades.create')->with('comunas', $comunas);
    }

    /**
     * Store a newly created Ciudad in storage.
     *
     * @param CreateCiudadRequest $request
     *
     * @return Response
     */
    public function store(CreateCiudadRequest $request)
    {
        $input = $request->all();

        $ciudad = $this->ciudadRepository->create($input);

        Flash::success('Ciudad saved successfully.');

        return redirect(route('ciudades.index'));
    }

    /**
     * Display the specified Ciudad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ciudad = $this->ciudadRepository->findWithoutFail($id);

        if (empty($ciudad)) {
            Flash::error('Ciudad not found');

            return redirect(route('ciudades.index'));
        }

        return view('ciudades.show')->with('ciudad', $ciudad);
    }

    /**
     * Show the form for editing the specified Ciudad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ciudad = $this->ciudadRepository->findWithoutFail($id);


        if (empty($ciudad)) {
            Flash::error('Ciudad not found');

            return redirect(route('ciudades.index'));
        }

        $comunas = Comuna::all();
        return view('ciudades.edit')->with(['ciudad' => $ciudad, 'comunas' => $comunas]);
    }

    /**
     * Update the specified Ciudad in storage.
     *
     * @param  int              $id
     * @param UpdateCiudadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCiudadRequest $request)
    {
        $ciudad = $this->ciudadRepository->findWithoutFail($id);

        if (empty($ciudad)) {
            Flash::error('Ciudad not found');

            return redirect(route('ciudades.index'));
        }

        $ciudad = $this->ciudadRepository->update($request->all(), $id);

        Flash::success('Ciudad updated successfully.');

        return redirect(route('ciudades.index'));
    }

    /**
     * Remove the specified Ciudad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ciudad = $this->ciudadRepository->findWithoutFail($id);

        if (empty($ciudad)) {
            Flash::error('Ciudad not found');

            return redirect(route('ciudades.index'));
        }

        $this->ciudadRepository->delete($id);

        Flash::success('Ciudad deleted successfully.');

        return redirect(route('ciudades.index'));
    }

    /**
     * Search city from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'ciudades.nombre' => $request['name'],
            'deletedData' => $request['deletedData'],
        ];

        if($request['deletedData'] == 1){
            $btn = "btn-success";
            $text_button = "Restaurar";
        }else{
            $btn = "btn-danger";
            $text_button = "Borrar";
        }

        $ciudades = $this->doSearchingQuery($constraints);
        return view('ciudades.index', ['ciudades' => $ciudades,
                                             'searchingVals' => $constraints,
                                             'deletedData' => $request['deletedData'],
                                             'btn'=>$btn,
                                             'text_button'=>$text_button]);
    }

    private function doSearchingQuery($constraints) {
        $query = \DB::table('ciudades');
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
                $constraint ? $query =  $query->whereNotNull('ciudades.deleted_at') : $query = $query->whereNull('ciudades.deleted_at');

            }

            $index++;
        }

        $query = $query
            ->leftJoin('comunas', 'ciudades.comunas_id', '=', 'comunas.id')
            ->select('ciudades.id', 'ciudades.nombre', 'comunas.nombre as nombre_comuna', 'comunas.id as comunas_id');

        return $query->paginate(5);
    }

    private function validateInput($request) {
        $this->validate($request, [
            'name' => 'required|max:60|unique:ciudad'
        ]);
    }
}

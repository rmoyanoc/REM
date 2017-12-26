<?php

namespace App\Http\Controllers;

use App\DataTables\empresasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateempresasRequest;
use App\Http\Requests\UpdateempresasRequest;
use App\Repositories\empresasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class empresasController extends AppBaseController
{
    /** @var  empresasRepository */
    private $empresasRepository;

    public function __construct(empresasRepository $empresasRepo)
    {
        $this->empresasRepository = $empresasRepo;
    }

    /**
     * Display a listing of the empresas.
     *
     * @param empresasDataTable $empresasDataTable
     * @return Response
     */
    public function index(empresasDataTable $empresasDataTable)
    {
        return $empresasDataTable->render('empresas.index');
    }

    /**
     * Show the form for creating a new empresas.
     *
     * @return Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created empresas in storage.
     *
     * @param CreateempresasRequest $request
     *
     * @return Response
     */
    public function store(CreateempresasRequest $request)
    {
        $input = $request->all();

        $empresas = $this->empresasRepository->create($input);

        Flash::success('Empresas saved successfully.');

        return redirect(route('empresas.index'));
    }

    /**
     * Display the specified empresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empresas = $this->empresasRepository->findWithoutFail($id);

        if (empty($empresas)) {
            Flash::error('Empresas not found');

            return redirect(route('empresas.index'));
        }

        return view('empresas.show')->with('empresas', $empresas);
    }

    /**
     * Show the form for editing the specified empresas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empresas = $this->empresasRepository->findWithoutFail($id);

        if (empty($empresas)) {
            Flash::error('Empresas not found');

            return redirect(route('empresas.index'));
        }

        return view('empresas.edit')->with('empresas', $empresas);
    }

    /**
     * Update the specified empresas in storage.
     *
     * @param  int              $id
     * @param UpdateempresasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateempresasRequest $request)
    {
        $empresas = $this->empresasRepository->findWithoutFail($id);

        if (empty($empresas)) {
            Flash::error('Empresas not found');

            return redirect(route('empresas.index'));
        }

        $empresas = $this->empresasRepository->update($request->all(), $id);

        Flash::success('Empresas updated successfully.');

        return redirect(route('empresas.index'));
    }

    /**
     * Remove the specified empresas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empresas = $this->empresasRepository->findWithoutFail($id);

        if (empty($empresas)) {
            Flash::error('Empresas not found');

            return redirect(route('empresas.index'));
        }

        $this->empresasRepository->delete($id);

        Flash::success('Empresas deleted successfully.');

        return redirect(route('empresas.index'));
    }
}

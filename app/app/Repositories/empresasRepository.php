<?php

namespace App\Repositories;

use App\Models\empresas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class empresasRepository
 * @package App\Repositories
 * @version December 25, 2017, 5:54 am UTC
 *
 * @method empresas findWithoutFail($id, $columns = ['*'])
 * @method empresas find($id, $columns = ['*'])
 * @method empresas first($columns = ['*'])
*/
class empresasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rut',
        'razon_social',
        'nombre_fantasia',
        'direccion',
        'comuna',
        'ciudad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return empresas::class;
    }
}

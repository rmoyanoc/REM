<?php

namespace App\Repositories;

use App\Models\Ciudad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CiudadRepository
 * @package App\Repositories
 * @version December 26, 2017, 8:01 am UTC
 *
 * @method Ciudad findWithoutFail($id, $columns = ['*'])
 * @method Ciudad find($id, $columns = ['*'])
 * @method Ciudad first($columns = ['*'])
*/
class CiudadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'comunas_id',
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ciudad::class;
    }
}

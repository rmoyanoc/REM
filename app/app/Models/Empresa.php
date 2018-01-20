<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Empresa
 * @package App\Models
 * @version January 20, 2018, 12:55 am UTC
 *
 * @property string rut
 * @property string razon_social
 * @property string nombre_fantasia
 * @property string direccion
 * @property integer comunas_id
 * @property integer provincias_id
 * @property string logotipo
 */
class Empresa extends Model
{
    use SoftDeletes;

    public $table = 'empresas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'rut',
        'razon_social',
        'nombre_fantasia',
        'direccion',
        'comunas_id',
        'provincias_id',
        'logotipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'rut' => 'string',
        'razon_social' => 'string',
        'nombre_fantasia' => 'string',
        'direccion' => 'string',
        'comunas_id' => 'integer',
        'provincias_id' => 'integer',
        'logotipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rut' => 'required|max:10',
        'razon_social' => 'required|max:150',
        'nombre_fantasia' => 'max:150',
        'direccion' => 'required|max:70',
        'comunas_id' => 'required',
        'provincias_id' => 'required',
        'logotipo' => 'max:45'
    ];

    
}

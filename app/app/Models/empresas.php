<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class empresas
 * @package App\Models
 * @version December 25, 2017, 5:54 am UTC
 *
 * @property string rut
 * @property string razon_social
 * @property string nombre_fantasia
 * @property string direccion
 * @property string comuna
 * @property string ciudad
 */
class empresas extends Model
{
    use SoftDeletes;

    public $table = 'empresas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'rut',
        'razon_social',
        'nombre_fantasia',
        'direccion',
        'comuna',
        'ciudad'
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
        'comuna' => 'string',
        'ciudad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rut' => 'required|max:10',
        'razon_social' => 'required|min:10|max:150',
        'nombre_fantasia' => 'max:150',
        'direccion' => 'required|min:10|max:70',
        'comuna' => 'required|min:5|max:40',
        'ciudad' => 'required|min:5|max:40'
    ];

    
}

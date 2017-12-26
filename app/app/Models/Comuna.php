<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comuna
 * @package App\Models
 * @version December 26, 2017, 7:56 am UTC
 *
 * @property integer pais_id
 * @property string nombre
 */
class Comuna extends Model
{
    use SoftDeletes;

    public $table = 'comunas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'pais_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pais_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pais_id' => 'required',
        'nombre' => 'required|max:60'
    ];

    
}

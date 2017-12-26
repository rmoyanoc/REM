<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ciudad
 * @package App\Models
 * @version December 26, 2017, 8:01 am UTC
 *
 * @property integer comunas_id
 * @property string nombre
 */
class Ciudad extends Model
{
    use SoftDeletes;

    public $table = 'ciudades';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'comunas_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'comunas_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'comunas_id' => 'required',
        'nombre' => 'required|max:60'
    ];

    
}

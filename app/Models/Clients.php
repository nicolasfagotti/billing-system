<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Clients
 * @package App\Models
 * @version July 8, 2019, 12:00 am UTC
 *
 * @property string name
 * @property string email
 * @property string address
 */
class Clients extends Model
{
    public $table = 'clients';

    public $fillable = [
        'name',
        'email',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required|email',
        'address' => 'required'
    ];
}

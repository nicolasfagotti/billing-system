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
        'surname',
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
        'surname' => 'string',
        'email' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'surname' => 'required',
        'email' => 'email'
    ];

    public function getFullNameAttribute()
    {
        return "$this->surname, $this->name";
    }
}

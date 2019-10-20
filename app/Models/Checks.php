<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Checks
 * @package App\Models
 * @version September 22, 2019, 7:14 am UTC
 *
 * @property string number
 * @property float amount
 * @property integer bank_id
 * @property integer bill_id
 */
class Checks extends Model
{

    public $table = 'checks';



    public $fillable = [
        'number',
        'amount',
        'bank_id',
        'bill_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number' => 'string',
        'amount' => 'double',
        'bank_id' => 'integer',
        'bill_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number' => 'required',
        'amount' => 'required',
        'bank_id' => 'required',
        'bill_id' => 'required'
    ];

    public function getBank()
    {
        return Banks::find($this->bank_id);
    }

    public function getFormatedAmount()
    {
        return '$ ' . number_format($this->amount, 2, ',', '.');
    }
}

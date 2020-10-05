<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Transfers
 * @package App\Models
 * @version September 26, 2020, 10:54 pm UTC
 *
 * @property string $number
 * @property number $amount
 * @property integer $bank_id
 * @property integer $bill_id
 */
class Transfers extends Model
{
    public $table = 'transfers';

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Concepts
 * @package App\Models
 * @version September 12, 2019, 10:01 pm UTC
 *
 * @property string detail
 * @property float amount
 * @property integer bill_id
 */
class Concepts extends Model
{
    public $table = 'concepts';

    public $fillable = [
        'detail',
        'amount',
        'bill_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'detail' => 'string',
        'amount' => 'double',
        'bill_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'detail' => 'required',
        'amount' => 'required',
        'bill_id' => 'required'
    ];

    public function getFormatedAmount()
    {
        return '$ ' . number_format($this->amount, 2, ',', '.');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Bills
 * @package App\Models
 * @version July 17, 2019, 4:49 pm UTC
 *
 * @property integer client_id
 * @property float amount
 */
class Bills extends Model
{
    public $table = 'bills';

    public $fillable = [
        'client_id',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'amount' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required',
        'amount' => 'required'
    ];

    public function getClient()
    {
        return Clients::find($this->client_id);
    }

    public function getConcepts()
    {
        $concepts = Concepts::where('bill_id', $this->id)->get();
        return $concepts;
    }

    public function getFormatedAmount()
    {
        $amount = Concepts::where('bill_id', $this->id)->sum('amount');
        return '$ ' . number_format($amount, 2, ',', '.');
    }
}

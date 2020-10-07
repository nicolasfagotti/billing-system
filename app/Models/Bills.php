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
        'cash'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'cash' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required',
        'cash' => 'required'
    ];

    public function getClient()
    {
        return Clients::find($this->client_id);
    }

    public function getFormatedCash()
    {
        return '$ ' . number_format($this->cash, 2, ',', '.');
    }

    public function getChecks()
    {
        $checks = Checks::where('bill_id', $this->id)->get();
        return $checks;
    }

    public function getTransfers()
    {
        $transfers = Transfers::where('bill_id', $this->id)->get();
        return $transfers;
    }

    public function getConcepts()
    {
        $concepts = Concepts::where('bill_id', $this->id)->get();
        return $concepts;
    }

    public function getAmount()
    {
        $cAmount = Checks::where('bill_id', $this->id)->sum('amount');
        $tAmount = Transfers::where('bill_id', $this->id)->sum('amount');
        return $cAmount + $tAmount + $this->cash;
    }

    public function getFormatedAmount()
    {
        $cAmount = Checks::where('bill_id', $this->id)->sum('amount');
        $tAmount = Transfers::where('bill_id', $this->id)->sum('amount');
        return '$ ' . number_format($cAmount + $tAmount + $this->cash, 2, ',', '.');
    }
}

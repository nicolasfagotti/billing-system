<?php

use App\Models\Bills;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ConceptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concepts')->insert([
            'detail'     => 'Concepto de haberes',
            'amount'     => 2000,
            'bill_id'    => Bills::first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('concepts')->insert([
            'detail'     => 'Investigación de mercado',
            'amount'     => 4000,
            'bill_id'    => Bills::first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('concepts')->insert([
            'detail'     => 'Pago de impuestos',
            'amount'     => 3533.88,
            'bill_id'    => Bills::first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

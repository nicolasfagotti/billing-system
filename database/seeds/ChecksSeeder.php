<?php

use App\Models\Banks;
use App\Models\Bills;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ChecksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checks')->insert([
            'number'     => '232988732498147924324',
            'amount'     => 5000,
            'bank_id'    => Banks::all()->random()->id,
            'bill_id'    => Bills::first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('checks')->insert([
            'number'     => '834492749832749847923',
            'amount'     => 3333.88,
            'bank_id'    => Banks::all()->random()->id,
            'bill_id'    => Bills::first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

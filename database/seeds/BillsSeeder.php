<?php

use App\Models\Clients;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            'client_id'  => Clients::all()->random()->id,
            'cash'       => 1200.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

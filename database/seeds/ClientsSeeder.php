<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name'       => 'Juan Roman',
            'surname'    => 'Riquelme',
            'email'      => 'roman@gmail.com',
            'address'    => 'Mario Yepes 123',
            'created_at' => Carbon::parse('2000-11-28'),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('clients')->insert([
            'name'       => 'Carlos',
            'surname'    => 'Bianchi',
            'email'      => 'carlos@gmail.com',
            'address'    => 'Real Madrid 2000',
            'created_at' => Carbon::parse('2000-11-28'),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('clients')->insert([
            'name'       => 'Martín',
            'surname'    => 'Palermo',
            'email'      => 'martin@gmail.com',
            'address'    => 'Titán 236',
            'created_at' => Carbon::parse('2000-11-28'),
            'updated_at' => Carbon::now(),
        ]);
    }
}

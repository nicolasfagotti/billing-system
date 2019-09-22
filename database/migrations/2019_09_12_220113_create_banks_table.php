<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name', 255);
        });

        DB::table('banks')->insert(['name' => 'Banco BBVA']);
        DB::table('banks')->insert(['name' => 'Banco Galicia']);
        DB::table('banks')->insert(['name' => 'Banco HSBC']);
        DB::table('banks')->insert(['name' => 'Banco ICBC']);
        DB::table('banks')->insert(['name' => 'Banco Macro']);
        DB::table('banks')->insert(['name' => 'Banco Nación']);
        DB::table('banks')->insert(['name' => 'Banco Patagonia']);
        DB::table('banks')->insert(['name' => 'Banco Provincia']);
        DB::table('banks')->insert(['name' => 'Banco Santander']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banks');
    }
}

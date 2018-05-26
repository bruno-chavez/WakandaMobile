<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('old_division_approval')->default('0');
            $table->boolean('new_division_approval')->default('0');
            $table->integer('user_id');
            $table->integer('old_division_id');
            $table->integer('new_division_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portabilities');
    }
}

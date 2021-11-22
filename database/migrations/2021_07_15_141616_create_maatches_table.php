<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maatches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('team1_id')->unsigned();
            $table->bigInteger('team2_id')->unsigned();
            $table->date('date');
            $table->string('result')->default('/');
            $table->timestamps();


            $table->foreign('team1_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maatches', function (Blueprint $table) {
            $table->dropForeign('teams_team1_id_foreign');
            $table->dropColumn('team1_id');
            $table->dropForeign('teams_team2_id_foreign');
            $table->dropColumn('team1_id');
        });
    }
}
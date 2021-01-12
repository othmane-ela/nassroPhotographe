<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPackToMariageReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mariage_reservations', function (Blueprint $table) {
            $table->string('pack')->after('prenom');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mariage_reservations', function (Blueprint $table) {
            $table->dropColumn('pack');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoverTableEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('endereco', function (Blueprint $table) {
            $table->dropColumn('contact');
            $table->dropColumn('address');
            $table->dropColumn('address_number');
            $table->dropColumn('address_city');
            $table->dropColumn('address_state');
            $table->dropColumn('complement');
            $table->dropColumn('neighborhood');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

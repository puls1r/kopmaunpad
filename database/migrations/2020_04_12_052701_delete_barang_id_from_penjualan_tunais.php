<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteBarangIdFromPenjualanTunais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualan_tunais', function (Blueprint $table) {
            $table->dropForeign('penjualan_tunais_barang_id_foreign');
            $table->dropColumn('barang_id');
            $table->dropColumn('kuantitas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penjualan_tunais', function (Blueprint $table) {
            //
        });
    }
}

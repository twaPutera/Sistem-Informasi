<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTambahkerjasamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambahkerjasama', function (Blueprint $table) {
            $table->id();
            $table->string("namamitra");
            $table->string("jenismitra");
            $table->string("judulkerjasama");
            $table->string("lingkupkerja");
            $table->string("alamat");
            $table->string("negara");
            $table->bigInteger("notelpmitra");
            $table->string("website");
            $table->string("bulaninput");
            $table->bigInteger("nilaikontrak", false, true)->nullable();
            $table->string("judul_mou");
            $table->date("tglmulai_mou");
            $table->date("tglselesai_mou");
            $table->string("path_mou");
            $table->string("judul_moa")->nullable();
            $table->date("tglmulai_moa")->nullable();
            $table->date("tglselesai_moa")->nullable();
            $table->string("path_moa");
            $table->string("narahubung");
            $table->bigInteger("notelpnara");
            $table->string("emailnara");
            $table->string("pic")->nullable();
            $table->bigInteger('notelppic')->nullable();
            $table->string('emailpic')->nullable();
            $table->string("status");
            $table->datetime("updated_at");
            $table->datetime("created_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tambahkerjasama');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KatalogMetadataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katalog_metadata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('metadata_id')->constrained();
            $table->integer('type')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('katalog_metadata');
    }
}

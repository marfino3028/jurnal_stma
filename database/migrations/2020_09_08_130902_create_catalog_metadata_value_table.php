<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogMetadataValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_metadata_value', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catalog_id')->constrained();
            $table->foreignId('metadata_id')->constrained();
            $table->string('metadata_key');
            $table->text('value');
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
        Schema::dropIfExists('catalog_metadata_value');
    }
}

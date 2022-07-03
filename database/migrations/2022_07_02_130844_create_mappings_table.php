<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mappings', function (Blueprint $table) {
            $table->id();
            $table->string('from_model')->length(20);
            $table->integer('from_id')->length(10);
            $table->string('to_model')->length(20);
            $table->integer('to_id')->length(10);
            $table->integer('deleted')->length(1)->default(0);
            $table->timestamps();
            $table->index(['from_model', 'from_id', 'to_model', 'to_id', 'deleted']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mappings');
    }
}

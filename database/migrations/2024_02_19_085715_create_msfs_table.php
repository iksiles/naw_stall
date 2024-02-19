<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msfs', function (Blueprint $table) {
            $table->id();
            $table->string('manufact', 40);
            $table->string('model', 40);
            $table->integer('year');
            $table->integer('weight');
            $table->string('img', 30);
            $table->string('type', 30);
            $table->string('model_ORG', 40)->index();
            $table->foreign('model_ORG')->references('model')->on('plane')->onUpdate('cascade')->onDelete('restrict');
            $table->string('engineType', 40);
            $table->string('engineManu', 40);
            $table->integer('cargo');
            $table->integer('travelNum');
            $table->integer('fuelCap');
            $table->integer('maxAlt');
            $table->integer('maxVel');
            $table->integer('flyRange');
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
        Schema::dropIfExists('msfs');
    }
};

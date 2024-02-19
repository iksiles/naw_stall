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
        Schema::create('plane', function (Blueprint $table) {
            $table->id();
            $table->string('manufact', 40);
            $table->string('model', 40)->index();
            $table->integer('year');
            $table->integer('weight');
            $table->string('img', 30);
            $table->string('type', 30);
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
        Schema::dropIfExists('planes');
        Schema::dropIfExists('plane');
    }
};

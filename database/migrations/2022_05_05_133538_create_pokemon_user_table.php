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
        Schema::create('pokemon_user', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_owned')->nullable()->default(false);
            $table->boolean('is_shiny')->nullable()->default(false);
            $table->longText('description')->nullable();
            $table->longText('nickname')->nullable();
            $table->integer('level')->nullable()->default(0);
            $table->foreignId('pokemon_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('pokemon_user');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_level')->nullable();
            $table->foreign('ID_level')->references('ID_level')->on('menu_levels')->onDelete('cascade')->onUpdate('cascade');
            $table->string('menu_name');
            $table->string('menu_link')->nullable();
            $table->string('menu_icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

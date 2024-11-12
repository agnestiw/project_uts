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
        Schema::create('setting_menus', function (Blueprint $table) {
            $table->id('ID_setting');
            $table->unsignedBigInteger('ID_jenis_user');
            $table->foreign('ID_jenis_user')->references('ID_jenis_user')->on('jenis_users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('ID_menu');
            $table->foreign('ID_menu')->references('id')->on('menus')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_menus');
    }
};

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
        Schema::create('rubrique', function (Blueprint $table) {
            $table->increments('id_rubrique');
            $table->string('nom', 200)->nullable()->default("test");
            $table->unsignedInteger('id_news')->default(5);
            $table->foreign(('id_news'))->references('id')->on('newsletter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rubrique');
    }
};

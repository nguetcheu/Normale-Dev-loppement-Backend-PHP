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
        Schema::create('abonne', function (Blueprint $table) {
            $table->increments('id_abonne');
            $table->string('nom', 250);
            $table->string('prenom', 250);
            $table->integer('age');
            $table->char('sexe', 1)->default('M');
            $table->string('profession', 250);
            $table->string('rue', 250);
            $table->string('code_postal', 250);
            $table->string('ville', 250);
            $table->string('pays', 250);
            $table->string('telephone', 250);
            $table->string('email', 250);
            $table->unsignedInteger('id_table_rubrique')->default(2);
            $table->unsignedInteger('id_motivation')->default(2);
            $table->foreign(('id_table_rubrique'))->references('id_rubrique')->on('rubrique')->onDelete('cascade');
            $table->foreign(('id_motivation'))->references('id')->on('motivation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonne');
    }
};

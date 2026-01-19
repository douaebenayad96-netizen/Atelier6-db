<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('editorials', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->text('contenu');
            $table->string('image');
            $table->string('categorie');
            $table->string('auteur');
            $table->integer('temps_lecture')->default(5);
            $table->date('date_publication');
            $table->boolean('publie')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('editorials');
    }
};
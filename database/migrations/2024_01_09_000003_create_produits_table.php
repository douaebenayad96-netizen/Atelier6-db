<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('slug')->unique();
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
            $table->foreignId('marque_id')->constrained()->onDelete('cascade');
            $table->text('description');
            $table->decimal('prix', 10, 2);
            $table->string('image_main');
            $table->string('image_thumb');
            $table->json('images')->nullable();
            $table->text('details_techniques')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('en_vedette')->default(false);
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produits');
    }
};
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
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('cle', 32);
            $table->string('nom', 100)->index();
            $table->text('adresse');
            $table->string('code_postal', 255);
            $table->string('ville', 255);
            $table->string('statut', 20);

            // Adding unique key for 'id'
            $table->unique('id');
            $table->timestamps();
            $table->softDeletes();
        });
        // DB::statement('ALTER TABLE organisation AUTO_INCREMENT = 33;');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisations');
    }
};

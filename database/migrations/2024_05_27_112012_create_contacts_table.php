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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('cle', 32)->unique();
            $table->unsignedInteger('organisation_id')->index();
            $table->string('e_mail', 200)->index();
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('telephone_fixe', 255);
            $table->string('service', 255);
            $table->string('fonction', 255);

            // Adding indexes
            $table->index('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

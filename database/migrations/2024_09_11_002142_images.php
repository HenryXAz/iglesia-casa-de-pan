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
        Schema::create('model_has_image', function (Blueprint $table) {
            $table->string('immageable_type', 255);
            $table->bigInteger('immageable_id')->unsigned();
            $table->string('url');
            $table->timestamps();


            $table->primary(['immageable_type', 'immageable_id']);
        });

        Schema::create('model_has_images', function (Blueprint $table) {
            $table->id();
            $table->string('immageable_type', 255);
            $table->bigInteger('immageable_id')->unsigned();
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 60);
            $table->string('description', 200);
            $table->longText('content');
            $table->boolean('is_published');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('model_has_category');
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

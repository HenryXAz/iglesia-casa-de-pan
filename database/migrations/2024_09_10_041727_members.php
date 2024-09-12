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
        Schema::create('members', function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users');
            $table->string('name');
            $table->string('last_name');
            $table->boolean('is_active');
            $table->timestamps();

        });

        Schema::create('members_optional_information', function(Blueprint $table){
            $table->id();
            $table->foreignId('member_id')->unique()->constrained('members');
            $table->string('phone_number', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('birthday')->nullable();
            $table->string('dpi', 16)->nullable();
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

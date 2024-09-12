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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name', 255);
            $table->string('account_number', 255);
            $table->decimal('amount', 12, 2);
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('personal_accounts', function(Blueprint $table){
            $table->id();
            $table->decimal('amount', 12, 2);
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
        });

        Schema::create('transaction_reasons', function(Blueprint $table){
            $table->id();
            $table->longText('reason');
            $table->timestamps();
        });

        Schema::create('model_has_transactions', function(Blueprint $table){
            $table->id();
            $table->decimal('fee', 8, 2);
            $table->enum('type_of_transaction', ['efectivo', 'deposito']);
            $table->string('deposit_number')->nullable();
            $table->enum('movement_type', ['ENTRADA', 'SALIDA']);
            $table->timestamps();

            $table->string('account_type', 255);
            $table->unsignedBigInteger('account_id');

            $table->foreignId('reason_id')->constrained('transaction_reasons');
            $table->foreignId('user_id')->constrained('users');
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

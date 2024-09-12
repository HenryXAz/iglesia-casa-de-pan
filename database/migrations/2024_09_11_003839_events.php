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
        Schema::create('special_events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 255);
            $table->decimal('cost', 8, 2);
            $table->decimal('fixed_fee', 8, 2);
            $table->boolean('has_fixed_fee');
            $table->boolean('is_published');
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('transportation_options', function (Blueprint $table) {
            $table->id();
            $table->string('description', 255);
            $table->integer('total_tickets');
            $table->decimal('cost', 11, 2);
            $table->timestamps();

            $table->foreignId('special_event_id')->constrained('special_events');
        });

        Schema::create('special_events_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('tickets');
            $table->decimal('tickets_total_price', 8, 2);
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('special_event_id')->constrained('special_events');
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

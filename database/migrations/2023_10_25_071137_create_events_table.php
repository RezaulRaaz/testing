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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('slug')->unique();
            $table->string('location');
            $table->text('location_map')->nullable();
            $table->unsignedInteger('age_limit')->nullable();
            $table->date('event_date');
            $table->text('terms_and_conditions');
            $table->boolean('nid')->default(false);
            $table->boolean('upcoming_event')->default(true);
            $table->boolean('event_on_hold')->default(false);
            $table->text('banner')->nullable();
            $table->json('performers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_team_id')->constrained('teams');
            $table->string('home_team_name')->constrained('teams');
            $table->foreignId('away_team_id')->constrained('teams');
            $table->string('away_team_name')->constrained('teams');
            $table->foreignId('field_id')->constrained('fields');
            $table->string('time_slot'); // e.g., "10h00", "11h40", etc.
            $table->integer('round'); // Store which round this fixture is part of
            $table->date('match_date'); // Date for the match
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};

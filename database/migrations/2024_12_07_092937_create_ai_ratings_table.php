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
        Schema::create('ai_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('tool_id');
            $table->string('g_2');
            $table->string('capterra');
            $table->string('trust_radius');
            $table->string('gartner_peer_insights');
            $table->string('software_advice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_ratings');
    }
};

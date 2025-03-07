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
        Schema::create('investment_details', function (Blueprint $table) {
            $table->id();
            $table->string('tool_id');
            $table->string('min_cash');
            $table->string('net_worth');
            $table->string('from_startup');
            $table->string('to_startup');
            $table->string('franchise_since');
            $table->string('franchise_init');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_details');
    }
};

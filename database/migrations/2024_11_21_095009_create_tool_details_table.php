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
        Schema::create('tool_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('overview');
            $table->text('product_details')->nullable();
            $table->string('overall_rating')->nullable();
            $table->string('slug')->nullable();
            $table->string('cat_id');
            $table->string('image')->nullable();
            $table->string('type')->comment('1. Review, 2. AI');
            $table->string('created_by');
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_details');
    }
};

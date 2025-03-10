<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->unsignedBigInteger('industry_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('asset_type_id');
            $table->unsignedBigInteger('utilization_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('country_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('asset_type_id')->references('id')->on('asset_types')->onDelete('cascade');
            $table->foreign('utilization_id')->references('id')->on('asset_utilizations')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assets');
    }
};

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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('comic_code')->unique();
            $table->string('comic_name')->nullable();
            $table->string('link_bg_color')->nullable();
            $table->string('link_avatar')->nullable();
            $table->string('link_comic_name')->nullable();
            $table->string('tranfer_color')->nullable();

            $table->integer('total_view')->nullable();
            $table->integer('total_like')->nullable();

            $table->bigInteger('genre_id')->nullable();
            $table->bigInteger('artist_id')->nullable();
            $table->bigInteger('author_id')->nullable();
            $table->bigInteger('publisher_id')->nullable();

            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};

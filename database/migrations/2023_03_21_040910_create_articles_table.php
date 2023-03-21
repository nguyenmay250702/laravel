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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ma_tloai");
            $table->string("tieude");
            $table->string("ten_bhat");
            $table->text("tomtat");
            $table->text("noidung")->nullable()->create();
            $table->string("hinhanh")->nullable()->create();
            $table->timestamps();
            $table->foreign('ma_tloai')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

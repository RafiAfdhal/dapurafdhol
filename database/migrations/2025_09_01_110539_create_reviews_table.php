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
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // siapa yang review
        $table->foreignId('menu_id')->constrained()->onDelete('cascade'); // makanan yang di-review
        $table->tinyInteger('rating'); // rating bintang (1-5)
        $table->text('review_text')->nullable(); // isi ulasan
        $table->timestamps();
    });
}

};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->integer('jumlah')->default(1);
            $table->decimal('harga', 12, 2); // harga saat ditambahkan
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('cart_items');
    }
};


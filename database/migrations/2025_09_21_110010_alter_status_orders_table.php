<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
  public function up(): void
{
    // Pastikan semua status lama diubah ke value yang ada di ENUM baru
    DB::statement("UPDATE orders SET status = 'pending' WHERE status = 'konfirmasi'");

    // Baru ubah struktur kolom ENUM
    DB::statement("ALTER TABLE orders 
        MODIFY status ENUM('pending','proses','pengiriman','selesai','cancel') 
        NOT NULL DEFAULT 'pending'");
}

public function down(): void
{
    // Kalau rollback, kembalikan ke versi lama
    DB::statement("ALTER TABLE orders 
        MODIFY status ENUM('konfirmasi','proses','pengiriman','selesai','cancel') 
        NOT NULL DEFAULT 'konfirmasi'");
}

};

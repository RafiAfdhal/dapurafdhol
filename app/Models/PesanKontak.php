<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanKontak extends Model
{
    protected $table = 'pesan_kontaks';
    protected $fillable = ['nama', 'email', 'subjek', 'pesan'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'nama',
        'kategori_id',
        'deskripsi',
        'stok',
        'harga',
        'gambar',
        'status',
        
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    

    
}
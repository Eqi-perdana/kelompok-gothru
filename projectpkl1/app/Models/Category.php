<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Kolom yang bisa diisi mass assignment
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi ke tabel products
     *
     * 1 kategori bisa punya banyak produk
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'price',
        'subtotal',
    ];

    // Relasi ke sale
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    // Relasi ke product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Tambahan: supaya gampang ambil nama produk langsung
    public function getProductNameAttribute()
    {
        return $this->product ? $this->product->title : '-';
    }

    // Tambahan: supaya gampang ambil kode sale langsung
    public function getSaleCodeAttribute()
    {
        return $this->sale ? 'SALE-' . $this->sale->id : '-';
    }
}

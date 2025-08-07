<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'sale_date',
        'total_amount',
        'payment_method',
    ];

    /**
     * Tipe data casting
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sale_date' => 'date',
        'total_amount' => 'decimal:2',
    ];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

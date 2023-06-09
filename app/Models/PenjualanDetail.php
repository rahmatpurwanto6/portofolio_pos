<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'penjualan_id',
        'produk_id',
        'harga_jual',
        'jumlah',
        'diskon',
        'subtotal'
    ];

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'member_id');
    }
}

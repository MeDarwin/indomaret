<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = ['id_pembayaran'];
    public $timestamps = false;

    //RELATION
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
}
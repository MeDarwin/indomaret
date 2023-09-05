<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $table = 'stok';
    protected $primaryKey = 'id_stok';
    protected $guarded = ['id_stok'];
    public $timestamps = false;
    //Relation
    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class,'id_barang','id_barang');
    }
}
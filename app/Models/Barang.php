<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $guarded = ['id_barang'];

    // RELATION
    public function stok()
    {
        return $this->hasMany(Stok::class,'id_barang','id_barang');
    }
}
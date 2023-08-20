<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    const GENDER_MALE = 'L';
    const GENDER_FEMALE = 'P';
    use HasFactory;
    protected $table = 'kasir';
    protected $primaryKey = 'id_kasir';
    protected $guarded = ['id_kasir'];
    public $timestamps = false;

    //RELATION
    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }
    public function akun()
    {
        return $this->belongsTo(Auth::class, 'id_akun', 'id_akun');
    }
    public function jadwal()
    {
        return $this->hasOne(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }
}
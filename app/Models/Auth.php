<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends  Authenticatable
{
    use HasFactory;
    protected $table = "tbl_akun";
    protected $primaryKey = "id_akun";
    protected $guarded = ['id_perusahaan'];
    public $timestamps = false;

    //RELATION
    public function kasir():HasOne
    {
        return $this->hasOne(Kasir::class,'id_akun','id_akun');
    }
}

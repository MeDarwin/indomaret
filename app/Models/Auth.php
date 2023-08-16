<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends  Authenticatable
{
    use HasFactory;
    protected $table = "tbl_akun";
    protected $primaryKey = "id_akun";
    protected $guarded = ['id_perusahaan'];
    public $timestamps = false;
}

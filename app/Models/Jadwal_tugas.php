<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_tugas extends Model
{
    use HasFactory;
    protected $table = 'jadwal_tugas';
    protected $primaryKey = 'id_jadwal_tugas';
    protected $guarded = ['id_jadwal_tugas'];
    public $timestamps = false;
}

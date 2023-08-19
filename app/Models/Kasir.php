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
}
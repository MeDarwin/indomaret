<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    protected $guarded = ['id_perusahaan'];
    public $timestamps = false;

    // RELATION
    public function cabang(): HasMany
    {
        return $this->hasMany(Cabang::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_activity extends Model
{
    use HasFactory;
    protected $guarded = ['id_log'];
    protected $primaryKey = 'id_log';
    public function affected_by()
    {
        return $this->belongsTo(Auth::class, 'affected_by', 'id_akun');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'idDokter');
    }

    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'jadwals';
}

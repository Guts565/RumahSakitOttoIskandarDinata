<?php

namespace App\Models;

// use Illuminate\Console\Scheduling\Schedule;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $primaryKey = 'id';

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'idPoli');
    }
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'idDokter');
    }

}

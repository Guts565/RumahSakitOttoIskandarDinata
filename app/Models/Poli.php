<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    public function doktors()
    {
        return $this->hasMany(Dokter::class, 'idPoli');
    }

    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'polis';
}

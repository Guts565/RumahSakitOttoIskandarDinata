<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $fillable = [
        'dokter_id',
        'gambarDokter',
        'gambarSlide2',
        'gambarSlide3'
    ];
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}

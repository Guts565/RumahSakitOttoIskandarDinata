<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'alamat', 'no_telp', 'profesi'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    use HasFactory;
}
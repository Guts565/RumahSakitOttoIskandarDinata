<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'alamat', 'no_telp'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    use HasFactory;
}

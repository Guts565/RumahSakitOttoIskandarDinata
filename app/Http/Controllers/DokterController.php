<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Poli;
use Illuminate\View\View;

class DokterController extends Controller
{

    public function index()
    {
        $semuaDokter = Dokter::all();
        $semuaDokter = Dokter::with('jadwals', 'poli')->get();
        $carousels = Carousel::first();
        $polis = Poli::all();
        return view('dokter.index', compact('semuaDokter', 'carousels','polis'));
    }

    public function show($id_dokter)
    {
        // Membuat instance dari model Dokter
        $dokterModel = new Dokter;
        // Menggunakan instance untuk mencari dokter berdasarkan id_dokter
        // $dokters = $dokterModel->find($id_dokter);
        $jadwal = Jadwal::where('idDokter', $id_dokter)->get();
        $dokter = Dokter::with('jadwals', 'poli')->find($id_dokter);
        // Memindahkan data ke view yang dapat diakses melalui variabel dokter
        return view('dokter.show', compact('dokter', 'jadwal'));
    }
}

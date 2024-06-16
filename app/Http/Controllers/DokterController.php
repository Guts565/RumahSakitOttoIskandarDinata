<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Dokter;
use Illuminate\View\View;

class DokterController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Membuat instance baru dari model Dokter dan menyimpan data
        $dokter = new Dokter;
        $dokter->nama = $request->input('nama');
        $dokter->poliklinik = $request->input('poliklinik');
        $dokter->save();
        // Arahkan user ke halaman dokter dengan pesan sukses
        return redirect('/dokter')->with('flash_message', 'Dokter berhasil ditambahkan!');
    }

    public function index()
    {
        // Membuat instance dari model Student
        $dokterModel = new Dokter;
        // Menggunakan instance untuk memanggil metode all()
        $semuaDokter = $dokterModel->all();
        // Mengembalikan view dengan data students
        return view('dokter.index', compact('semuaDokter'));
    }

    public function show($id_dokter)
    {
        // Membuat instance dari model Dokter
        $dokterModel = new Dokter;
        // Menggunakan instance untuk mencari dokter berdasarkan id_dokter
        $dokter = $dokterModel->find($id_dokter);
        // Memindahkan data ke view yang dapat diakses melalui variabel dokter
        return view('dokter.show', compact('dokter'));
    }

    public function edit($id_dokter)
    {
        // Membuat instance dari model Dokter
        $dokterModel = new Dokter;
        // Menggunakan instance untuk mencari dokter berdasarkan ID
        $dokter = $dokterModel->find($id_dokter);
        // Mengirim data dokter ke view edit
        return view('admin.edit', compact('dokter'));
    }

    public function update(Request $request, $id_dokter)
    {
        // Membuat instance dari model Dokter
        $dokterModel = new Dokter;
        // Menggunakan instance untuk mencari dokter berdasarkan ID
        $dokter = $dokterModel->find($id_dokter);
        // Mengupdate data dokter
        $dokter->nama = $request->input('nama');
        $dokter->poliklinik = $request->input('poliklinik');
        $dokter->senin = $request->input('senin');
        $dokter->selasa = $request->input('selasa');
        $dokter->rabu = $request->input('rabu');
        $dokter->kamis = $request->input('kamis');
        $dokter->jumat = $request->input('jumat');
        $dokter->sabtu = $request->input('sabtu');
        $dokter->save();
        // Redirect ke halaman daftar dokter dengan pesan sukses
        return redirect('/dokter')->with('success', 'Dokter berhasil diperbarui.');
    }

    public function destroy($id_dokter)
    {
        // Membuat instance dari model Dokter
        $dokterModel = new Dokter;
        // Menggunakan instance untuk mencari dokter berdasarkan ID
        $dokter = $dokterModel->find($id_dokter);
        // Menghapus dokter yang ditemukan
        $dokter->delete();
        // Redirect ke halaman daftar dokter dengan pesan sukses
        return redirect('/dokter')->with('success', 'Dokter berhasil dihapus.');
    }

    public function deleteSelected(Request $request)
    {
        $dokter_ids = $request->input('dokter_ids');

        // Hapus dokter yang dipilih
        Dokter::whereIn('id', $dokter_ids)->delete();

        return response()->json(['success' => true]);
    }
    // public function deleteSelected(Request $request)
    // {
    //     $ids = $request->input('dokter_ids');
    //     if (!empty($ids)) {
    //         Dokter::whereIn('id', $ids)->delete();
    //     }
    //     return response()->json(['success' => "Dokters deleted successfully."]);
    // }
}

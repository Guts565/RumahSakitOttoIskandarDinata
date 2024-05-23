<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Siswa;
use Illuminate\View\View;

class SiswaController extends Controller
{
    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Membuat instance baru dari model Siswa dan menyimpan data
        $siswa = new Siswa;
        $siswa->nama = $request->input('nama');
        $siswa->alamat = $request->input('alamat');
        $siswa->no_telp = $request->input('no_telp');
        $siswa->save();
        // Arahkan user ke halaman siswa dengan pesan sukses
        return redirect('/siswa')->with('flash_message', 'Siswa berhasil ditambahkan!');
    }

    public function index()
    {
        // Membuat instance dari model Student
        $siswaModel = new Siswa;
        // Menggunakan instance untuk memanggil metode all()
        $semuaSiswa = $siswaModel->all();
        // Mengembalikan view dengan data students
        return view('siswa.index', compact('semuaSiswa'));
    }

    public function show($id_siswa)
    {
        // Membuat instance dari model Siswa
        $siswaModel = new Siswa;
        // Menggunakan instance untuk mencari siswa berdasarkan id_siswa
        $siswa = $siswaModel->find($id_siswa);
        // Memindahkan data ke view yang dapat diakses melalui variabel siswa
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id_siswa)
    {
        // Membuat instance dari model Siswa
        $siswaModel = new Siswa;
        // Menggunakan instance untuk mencari siswa berdasarkan ID
        $siswa = $siswaModel->find($id_siswa);
        // Mengirim data siswa ke view edit
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id_siswa)
    {
        // Membuat instance dari model Siswa
        $siswaModel = new Siswa;
        // Menggunakan instance untuk mencari siswa berdasarkan ID
        $siswa = $siswaModel->find($id_siswa);
        // Mengupdate data siswa
        $siswa->nama = $request->input('nama');
        $siswa->alamat = $request->input('alamat');
        $siswa->no_telp = $request->input('no_telp');
        $siswa->save();
        // Redirect ke halaman daftar siswa dengan pesan sukses
        return redirect('/siswa')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy($id_siswa)
    {
        // Membuat instance dari model Siswa
        $siswaModel = new Siswa;
        // Menggunakan instance untuk mencari siswa berdasarkan ID
        $siswa = $siswaModel->find($id_siswa);
        // Menghapus siswa yang ditemukan
        $siswa->delete();
        // Redirect ke halaman daftar siswa dengan pesan sukses
        return redirect('/siswa')->with('success', 'Siswa berhasil dihapus.');
    }

    public function deleteSelected(Request $request)
    {
        $siswa_ids = $request->input('siswa_ids');

        // Hapus siswa yang dipilih
        Siswa::whereIn('id', $siswa_ids)->delete();

        return response()->json(['success' => true]);
    }
}

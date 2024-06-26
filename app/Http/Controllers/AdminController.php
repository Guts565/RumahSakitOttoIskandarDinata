<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function create()
    {
        $polis = Poli::all();

        return view('admin.create', compact('polis'));
    }
    public function index()
    {
        // Membuat instance dari model Student
        $dokterModel = new Dokter;
        // Menggunakan instance untuk memanggil metode all()
        $semuaDokter = $dokterModel->all();
        $semuaDokter = Dokter::with('jadwals', 'poli')->get();
        // Mengembalikan view dengan data students
        return view('admin.index', compact('semuaDokter'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama' => 'required|string|max:255',
            'poliklinik' => 'required|integer|exists:polis,id',
            'hari' => 'required|string',
            'waktu' => 'required|string',
            'hari_baru' => 'nullable|string',
            'waktu_baru' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
        ]);

        // Membuat instance baru dari model Dokter dan menyimpan data
        $dokter = new Dokter;
        $dokter->idPoli = $request->input('poliklinik');
        $dokter->nama = $request->input('nama');
        $dokter->alamat = $request->input('alamat');
        $dokter->telp = $request->input('telp');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('images', $imageName, 'public');
            $dokter->image = $imageName;
        }

        $dokter->save();

        // Menyimpan jadwal lama
        if (!empty($request->input('hari')) && !empty($request->input('waktu'))) {
            $jadwal = new Jadwal;
            $jadwal->idDokter = $dokter->id;
            $jadwal->hari = $request->input('hari');
            $jadwal->waktu = $request->input('waktu');
            $jadwal->save();
        }

        // Menyimpan jadwal baru jika ada
        if (!empty($request->input('hari_baru')) && !empty($request->input('waktu_baru'))) {
            $jadwalBaru = new Jadwal;
            $jadwalBaru->idDokter = $dokter->id;
            $jadwalBaru->hari = $request->input('hari_baru');
            $jadwalBaru->waktu = $request->input('waktu_baru');
            $jadwalBaru->save();
        }
        // Arahkan user ke halaman dokter dengan pesan sukses
        return redirect('/admin')->with('flash_message', 'Dokter berhasil ditambahkan!');
    }

    public function edit($id_dokter)
    {
        // Mengambil data dokter berdasarkan ID
        $dokter = Dokter::find($id_dokter);
        // Mengambil data semua poliklinik
        $poliList = Poli::all();
        // Mengambil jadwal dokter yang sedang diedit
        $jadwal = Jadwal::where('idDokter', $id_dokter)->get();
        // Mengirim data dokter dan poliklinik ke view
        return view('admin.edit', compact('dokter', 'poliList', 'jadwal'));
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        // var_dump($request->all());
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'poliklinik' => 'required|integer|exists:polis,id',
            'hari.*' => 'required|string', // validasi array hari
            'waktu.*' => 'required|string', // validasi array waktu
            'hari_baru' => 'nullable|string',
            'waktu_baru' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|file|max:2048',
        ]);
        // Fetch dokter data
        $dokter = Dokter::findOrFail($id);

        // Update dokter data
        $dokter->nama = $request->input('nama') ?: $dokter->nama;
        $dokter->idPoli = $request->input('poliklinik');
        $dokter->alamat = $request->input('alamat');
        $dokter->telp = $request->input('telp');
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($dokter->image) {
                Storage::disk('public')->delete('images/' . $dokter->image);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('images', $imageName, 'public');
            $dokter->image = $imageName;
        }
        $dokter->save();

        // Update jadwal yang sudah ada
        if ($request->has('hari') && $request->has('waktu')) {
            $hari = $request->input('hari');
            $waktu = $request->input('waktu');
            foreach ($hari as $index => $hariItem) {
                $jadwal = Jadwal::where('idDokter', $dokter->id)->skip($index)->first();
                if ($jadwal) {
                    $jadwal->hari = $hariItem;
                    $jadwal->waktu = $waktu[$index];
                    $jadwal->save();
                }
            }
        }

        // Tambah jadwal baru jika ada
        if ($request->filled('hari_baru') && $request->filled('waktu_baru')) {
            $jadwalBaru = new Jadwal();
            $jadwalBaru->idDokter = $dokter->id;
            $jadwalBaru->hari = $request->input('hari_baru');
            $jadwalBaru->waktu = $request->input('waktu_baru');
            $jadwalBaru->save();
        }

        // Redirect dengan pesan sukses
        return redirect('/admin')->with('flash_message', 'Dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Menggunakan instance untuk mencari dokter berdasarkan ID
        $dokter = Dokter::find($id);
        // Menghapus dokter yang ditemukan
        $dokter->delete();
        // dd($dokter->all());
        // Redirect ke halaman daftar dokter dengan pesan sukses
        return redirect('/admin')->with('flash_message', 'Dokter berhasil dihapus.');
    }

    // public function deleteSelected(Request $request)
    // {
    //     $dokter_ids = $request->input('dokter_ids');

    //     // Hapus dokter yang dipilih
    //     Dokter::whereIn('id', $dokter_ids)->delete();

    //     return response()->json(['success' => true]);
    // }


    public function destroyJadwal($id)
    {
        $jadwal = Jadwal::find($id);

        if ($jadwal) {
            $jadwal->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    // public function update(Request $request, $id_dokter)
    // {
    //     // Membuat instance dari model Dokter
    //     $dokterModel = new Dokter;
    //     // Menggunakan instance untuk mencari dokter berdasarkan ID
    //     $dokter = $dokterModel->find($id_dokter);
    //     // Mengupdate data dokter
    //     $dokter->poliklinik_id = $request->input('poliklinik') ?: $dokter->poliklinik_id;
    //     $dokter->nama = $request->input('nama') ?: $dokter->nama;
    //     $dokter->hari = $request->input('hari') ?: $dokter->hari;
    //     $dokter->waktu = $request->input('waktu') ?: $dokter->waktu;
    //     $dokter->save();
    //     // Redirect ke halaman daftar dokter dengan pesan sukses
    //     return redirect('/dokter')->with('success', 'Dokter berhasil diperbarui.');
    // }

    // public function deleteSelected(Request $request)
    // {
    //     $ids = $request->input('dokter_ids');
    //     if (!empty($ids)) {
    //         Dokter::whereIn('id', $ids)->delete();
    //     }
    //     return response()->json(['success' => "Dokters deleted successfully."]);
    // }

}

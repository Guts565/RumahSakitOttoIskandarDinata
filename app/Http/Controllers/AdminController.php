<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\Jadwal;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{

    public function test()
    {
        return view('admin.test');
    }
    public function create()
    {
        $polis = Poli::all();

        $polis = Poli::orderBy('poli', 'asc')->get();

        return view('admin.create', compact('polis'));
    }
    public function index()
    {
        // Membuat instance dari model Student
        // $dokterModel = new Dokter;
        // Menggunakan instance untuk memanggil metode all()
        $semuaDokter = Dokter::all();
        $semuaDokter = Dokter::with('jadwals', 'poli')->get();
        $carousels = Carousel::first();
        // Mengembalikan view dengan data students
        return view('admin.index', compact('semuaDokter','carousels'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|file|max:4096',
            'nama' => 'required|string|max:255',
            'poliklinik' => 'required|integer|exists:polis,id',
            'alamat' => 'nullable|string',
            'telp' => 'nullable|string',
            'hari' => 'nullable|string',
            'waktu' => 'nullable|string',
            'hari_baru' => 'nullable|array',
            'waktu_baru' => 'nullable|array',
            'hari_baru.*' => 'nullable|string',
            'waktu_baru.*' => 'nullable|string',
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
            foreach ($request->input('hari_baru') as $index => $hari_baru) {
                if (!empty($hari_baru) && !empty($request->input('waktu_baru')[$index])) {
                    $jadwalBaru = new Jadwal;
                    $jadwalBaru->idDokter = $dokter->id;
                    $jadwalBaru->hari = $hari_baru;
                    $jadwalBaru->waktu = $request->input('waktu_baru')[$index];
                    $jadwalBaru->save();
                }
            }
        }

        // Arahkan user ke halaman dokter dengan pesan sukses
        return redirect('/admin')->with('success', 'Dokter berhasil ditambahkan!');
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
        // Validasi data
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|file|max:4096',
            'nama' => 'required|string|max:255',
            'poliklinik' => 'required|integer|exists:polis,id',
            'hari.*' => 'nullable|string', // validasi array hari
            'waktu.*' => 'nullable|string', // validasi array waktu
            'hari_baru.*' => 'nullable|string',
            'waktu_baru.*' => 'nullable|string',
        ]);
        // Fetch dokter data
        $dokter = Dokter::findOrFail($id);

        // Update data dokter
        $dokter->nama = $request->input('nama');
        $dokter->idPoli = $request->input('poliklinik');
        $dokter->alamat = $request->input('alamat');
        $dokter->telp = $request->input('telp');

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($dokter->image) {
                Storage::disk('public')->delete('images/' . $dokter->image);
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('images', $imageName, 'public');
            $dokter->image = $imageName;
        }

        // Simpan perubahan
        $dokter->save();

        // Update jadwal yang sudah ada
        if ($request->filled('hari') && $request->filled('waktu')) {
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
        if (
            $request->filled('hari_baru') && $request->filled('waktu_baru')
        ) {
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

    // public function deleteSelected(Request $request)
    // {
    //     $dokter_ids = $request->input('dokter_ids');

    //     // Hapus dokter yang dipilih
    //     Dokter::whereIn('id', $dokter_ids)->delete();

    //     return response()->json(['success' => true]);
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

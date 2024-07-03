<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Http\Requests\StoreCarouselRequest;
use App\Http\Requests\UpdateCarouselRequest;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */

    public function index()
    {
        $carousels = Carousel::all();

        return view('carousel.index', compact('carousels'));
    }

    public function create()
    {
        $carousels = Carousel::all();

        return view('carousel.create', compact('carousels'));
    }

    public function store(Request $request)
    {
        $customMessages = [
            'slide2.required' => 'Alur harus diisi.',
            'slide2.image' => 'Alur harus berupa gambar.',
            'slide2.mimes' => 'Alur harus berupa file dengan tipe: jpeg, png, jpg, gif.',
            'slide2.max' => 'Ukuran file Alur tidak boleh lebih besar dari 4MB.',
            'slide3.required' => 'FAQ harus diisi.',
            'slide3.image' => 'FAQ harus berupa gambar.',
            'slide3.mimes' => 'FAQ harus berupa file dengan tipe: jpeg, png, jpg, gif.',
            'slide3.max' => 'Ukuran file FAQ tidak boleh lebih besar dari 4MB.',
        ];

        $request->validate([
            'slide2' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'slide3' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ], $customMessages);

        $carousel = new Carousel();

        // $carousel->dokter_id = $request->dokter_id;


        if ($request->hasFile('slide2')) {
            $imageName = time() . '_slide2.' . $request->file('slide2')->extension();
            $request->file('slide2')->storeAs('carousel', $imageName, 'public');
            $carousel->slide2 = $imageName;
        }

        if ($request->hasFile('slide3')) {
            $imageName = time() . '_slide3.' . $request->file('slide3')->extension();
            $request->file('slide3')->storeAs('carousel', $imageName, 'public');
            $carousel->slide3 = $imageName;
        }

        $carousel->save();

        return redirect('/carousel')->with('success', 'Carousel berhasil dibuat');
    }

    public function edit($id)
    {
        $carousel = Carousel::find($id);

        // $dokters = Dokter::all();

        return view('carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $customMessages = [
            'slide2.required' => 'Alur harus diisi.',
            'slide2.image' => 'Alur harus berupa gambar.',
            'slide2.mimes' => 'Alur harus berupa file dengan tipe: jpeg, png, jpg, gif.',
            'slide2.max' => 'Ukuran file Alur tidak boleh lebih besar dari 4MB.',
            'slide3.required' => 'FAQ harus diisi.',
            'slide3.image' => 'FAQ harus berupa gambar.',
            'slide3.mimes' => 'FAQ harus berupa file dengan tipe: jpeg, png, jpg, gif.',
            'slide3.max' => 'Ukuran file FAQ tidak boleh lebih besar dari 4MB.',
        ];

        $request->validate([
            'slide2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'slide3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ], $customMessages);

        $carousel = Carousel::findOrFail($id);

        // $carousel->update($request->all());

        if ($request->hasFile('slide2')) {
            if ($carousel->slide2) {
                Storage::disk('public')->delete('carousel/' . $carousel->slide2);
            }
            $imageName = time() . '_slide2.' . $request->file('slide2')->extension();
            $request->file('slide2')->storeAs('carousel', $imageName, 'public');
            $carousel->slide2 = $imageName;
        }

        if ($request->hasFile('slide3')) {
            if ($carousel->slide3) {
                Storage::disk('public')->delete('carousel/' . $carousel->slide3);
            }
            $imageName = time() . '_slide3.' . $request->file('slide3')->extension();
            $request->file('slide3')->storeAs('carousel', $imageName, 'public');
            $carousel->slide3 = $imageName;
        }


        // $carousel->dokter_id = $request->dokter_id;

        $carousel->save();

        // $carousels = Carousel::all(); // Fetch all carousels again
        return redirect()->route('carousel.index')->with('success', 'Carousel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $carousel = Carousel::find($id);
        if ($carousel->slide2) {
            Storage::disk('public')->delete('carousel/' . $carousel->slide2);
        }
        if ($carousel->slide3) {
            Storage::disk('public')->delete('carousel/' . $carousel->slide3);
        }
        // Menghapus carousel yang ditemukan
        $carousel->delete();
        // Redirect ke halaman daftar carousel dengan pesan sukses
        return redirect('/carousel')->with('flash_message', 'Dokter berhasil dihapus.');
    }
}

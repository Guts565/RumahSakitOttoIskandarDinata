<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PolisController extends Controller
{
    public function index()
    {
        $polis = Poli::all();
        $polis = poli::orderBy('poli')->get();

        return view('poli.index', compact('polis'));
    }

    public function create()
    {
        return view('poli.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli' => 'required|string|max:255',
        ]);

        $polis = new Poli;
        $polis->poli = $request->input('poli');
        $polis->save();

        return redirect('/poli')->with('success', 'Poliklinik berhasil dibuat.');
    }

    public function edit($id)
    {
        $polis = Poli::find($id);

        return view('poli.edit', compact('polis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'poli' => 'required|string|max:255',
        ]);

        $polis = Poli::find($id);

        $polis->poli = $request->input('poli') ?? $request->input('poli');
        $polis->save();
        
        return redirect('/poli')->with('success', 'Poliklinik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $polis = Poli::find($id);
        $polis->delete();

        return redirect('/poli')->with('success', 'Poliklinik berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return Inertia::render('Mahasiswa', [
            'mahasiswas' => Mahasiswa::all(),
            'user' => auth()->user(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Mahasiswa/TambahMahasiswa', [
            'user' => auth()->user(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswas,nim',
            'jurusan' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Mahasiswa::create($validated);
        return Redirect::route('mahasiswa.index');
    }

    public function edit($id)
    {
        return Inertia::render('Mahasiswa/EditMahasiswa', [
            'mahasiswa' => Mahasiswa::findOrFail($id),
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswas,nim,' . $mahasiswa->id,
            'jurusan' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $mahasiswa->update($validated);
        return Redirect::route('mahasiswa.index');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return Redirect::route('mahasiswa.index');
    }
}
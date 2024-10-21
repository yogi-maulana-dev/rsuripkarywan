<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $karyawan = Karyawan::all();

        return view('Karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:70',
            'tgl_lahir' => 'required|date',
            'gaji' => 'required|numeric|min:0',
        ]);

        $karyawan = new Karyawan;
        $karyawan->nama = $request->input('nama');
        $karyawan->tgl_lahir = $request->input('tgl_lahir');
        $karyawan->gaji = $request->input('gaji');
        $karyawan->save();

        return redirect('/karyawan')->with('success', 'Karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $karyawan = Karyawan::findOrFail($id);

        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'gaji' => 'required|numeric|min:0',
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->nama = $request->input('nama');
        $karyawan->tgl_lahir = $request->input('tgl_lahir');
        $karyawan->gaji = $request->input('gaji');

        $karyawan->save();

        return redirect('/karyawan')->with('success', 'Karyawan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //.
        $karyawan = Karyawan::findOrFail($id);

        // Hapus karyawan
        $karyawan->delete();

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil dihapus.');
    }
}

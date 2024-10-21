<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return response()->json(['data' => Karyawan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'gaji' => 'required|numeric',
        ]);
        $karyawan = Karyawan::create($data);

        return response()->json(['data' => $karyawan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Karyawan $datakaryawan)
    {
        //
        return response()->json(['data' => $datakaryawan->find($id)]);
    }

    public function edit(string $id, Karyawan $datakaryawan)
    {
        return response()->json(['data' => $datakaryawan->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Cari karyawan berdasarkan ID
            $karyawan = Karyawan::find($id);

            // Jika karyawan tidak ditemukan, kembalikan error
            if (! $karyawan) {
                return response()->json(['error' => 'Record not found'], 404);
            }

            // Validasi input dari request
            $data = $request->validate([
                'nama' => 'string|max:100',
                'tgl_lahir' => 'date',
                'gaji' => 'numeric',
            ]);

            // Update data karyawan
            $karyawan->update($data);

            // Kembalikan respons sukses
            return response()->json(['message' => 'Data karyawan berhasil diupdate', 'data' => $karyawan], 200);

        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembalikan respons error
            return response()->json(['error' => 'Terjadi kesalahan saat mengupdate data: '.$e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        $karyawan = Karyawan::find($id);

        if (! $karyawan) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $karyawan->delete();

        return response()->json(['message' => 'Record deleted successfully'], 200);

    }
}

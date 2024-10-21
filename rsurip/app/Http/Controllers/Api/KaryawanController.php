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
        $karyawan = Karyawan::find($id);

        if (! $karyawan) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'gaji' => 'required|numeric',
        ]);
        $karyawan->update($data);

        return response()->json(['data' => $karyawan], 200);
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

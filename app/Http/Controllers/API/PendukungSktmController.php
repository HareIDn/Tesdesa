<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PendukungSktm;
use Illuminate\Http\Request;

class PendukungSktmController extends Controller


{
    /**
     * Menampilkan daftar semua PendukungSktm.
     */
    public function index()
    {
        $pendukungSktms = PendukungSktm::all(); // Mengambil semua data PendukungSktm
        return response()->json($pendukungSktms, 200); // Mengembalikan data dalam format JSON
    }

    /**
     * Menyimpan data PendukungSktm baru.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'sktm_id' => 'required|exists:sktms,id',
            'ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|integer',
            'penghasilan_perbulan' => 'required|numeric',
        ]);

        // Menyimpan data PendukungSktm
        $pendukungSktm = PendukungSktm::create([
            'sktm_id' => $request->sktm_id,
            'ayah' => $request->ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'ibu' => $request->ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'jumlah_tanggungan' => $request->jumlah_tanggungan,
            'penghasilan_perbulan' => $request->penghasilan_perbulan,
        ]);

        // Mengembalikan response sukses
        return response()->json([
            'message' => 'Pendukung SKTM created successfully',
            'pendukung_sktm' => $pendukungSktm
        ], 201);
    }

    /**
     * Menampilkan data PendukungSktm berdasarkan ID.
     */
    public function show($id)
    {
        $pendukungSktm = PendukungSktm::find($id);

        if (!$pendukungSktm) {
            return response()->json(['message' => 'Pendukung SKTM not found'], 404);
        }

        return response()->json($pendukungSktm, 200);
    }

    /**
     * Memperbarui data PendukungSktm.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|integer',
            'penghasilan_perbulan' => 'required|numeric',
        ]);

        // Menemukan PendukungSktm berdasarkan ID
        $pendukungSktm = PendukungSktm::find($id);

        if (!$pendukungSktm) {
            return response()->json(['message' => 'Pendukung SKTM not found'], 404);
        }

        // Memperbarui data PendukungSktm
        $pendukungSktm->update([
            'ayah' => $request->ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'ibu' => $request->ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'jumlah_tanggungan' => $request->jumlah_tanggungan,
            'penghasilan_perbulan' => $request->penghasilan_perbulan,
        ]);

        return response()->json([
            'message' => 'Pendukung SKTM updated successfully',
            'pendukung_sktm' => $pendukungSktm
        ], 200);
    }

    /**
     * Menghapus data PendukungSktm.
     */
    public function destroy($id)
    {
        // Menemukan PendukungSktm berdasarkan ID
        $pendukungSktm = PendukungSktm::find($id);

        if (!$pendukungSktm) {
            return response()->json(['message' => 'Pendukung SKTM not found'], 404);
        }

        // Menghapus data PendukungSktm
        $pendukungSktm->delete();

        return response()->json([
            'message' => 'Pendukung SKTM deleted successfully'
        ], 200);
    }
}



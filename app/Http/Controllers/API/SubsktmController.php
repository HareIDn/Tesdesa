<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\subsktm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubsktmController extends Controller
{
    // Tampilkan semua data subsktm
    public function index()
    {
        $data = subsktm::with('pengajuan')->get();
        return response()->json($data, 200);
    }

    // Simpan data baru subsktm
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pengajuan_id' => 'required|exists:pengajuans,id',
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'tempat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'agama' => 'required|string|max:20',
            'pekerjaan' => 'required|string|max:100',
            'telepon' => 'required|string|max:15',
            'alamat_lengkap' => 'required|string',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:100',
            'ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:100',
            'jumlah_tanggungan' => 'nullable|integer',
            'penghasilan_perbulan' => 'nullable|numeric',
            'pilih_tujuan' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('dokumen_pendukung')) {
            $validated['dokumen_pendukung'] = $request->file('dokumen_pendukung')->store('dokumen_sktm');
        }

        $subsktm = subsktm::create($validated);
        return response()->json(['message' => 'Data berhasil disimpan', 'data' => $subsktm], 201);
    }

    // Tampilkan satu data subsktm
    public function show($id)
    {
        $subsktm = subsktm::with('pengajuan')->find($id);
        if (!$subsktm) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($subsktm, 200);
    }

    // Update data subsktm
    public function update(Request $request, $id)
    {
        $subsktm = subsktm::find($id);
        if (!$subsktm) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama_lengkap' => 'sometimes|string|max:255',
            'nik' => 'sometimes|numeric|unique:subsktms,nik,' . $id,
            'tempat' => 'sometimes|string|max:255',
            'tanggal_lahir' => 'sometimes|date',
            'jenis_kelamin' => 'sometimes|string|max:10',
            'agama' => 'sometimes|string|max:20',
            'pekerjaan' => 'sometimes|string|max:100',
            'telepon' => 'sometimes|string|max:15',
            'alamat_lengkap' => 'sometimes|string|max:255',
            'rt' => 'sometimes|string|max:5',
            'rw' => 'sometimes|string|max:5',
            'kelurahan' => 'sometimes|string|max:100',
            'kecamatan' => 'sometimes|string|max:100',
            'kabupaten' => 'sometimes|string|max:100',
            'ayah' => 'sometimes|string|max:255',
            'pekerjaan_ayah' => 'sometimes|string|max:100',
            'ibu' => 'sometimes|string|max:255',
            'pekerjaan_ibu' => 'sometimes|string|max:100',
            'jumlah_tanggungan' => 'sometimes|integer',
            'penghasilan_perbulan' => 'sometimes|numeric',
            'pilih_tujuan' => 'sometimes|string|max:255',
            'keterangan' => 'sometimes|string',
            'dokumen_pendukung' => 'sometimes|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('dokumen_pendukung')) {
            if ($subsktm->dokumen_pendukung) {
                Storage::delete($subsktm->dokumen_pendukung);
            }
            $validated['dokumen_pendukung'] = $request->file('dokumen_pendukung')->store('dokumen_sktm');
        }

        $subsktm->update($validated);
        return response()->json(['message' => 'Data berhasil diperbarui', 'data' => $subsktm], 200);
    }

    // Hapus data subsktm
    public function destroy($id)
    {
        $subsktm = subsktm::find($id);
        if (!$subsktm) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        if ($subsktm->dokumen_pendukung) {
            Storage::delete($subsktm->dokumen_pendukung);
        }

        $subsktm->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}

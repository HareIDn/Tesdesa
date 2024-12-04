<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'file_pdf' => 'required|file|mimes:pdf|max:10240', // Only allow PDF files up to 10 MB
            'data_pendukung1' => 'nullable|string',
            'data_pendukung2' => 'nullable|string',
            'data_pendukung3' => 'nullable|string',
            'data_pendukung4' => 'nullable|string',
            'data_pendukung5' => 'nullable|string',
        ]);

        // Store the PDF file in the storage/app/public/dokumens directory
        $path = $request->file('file_pdf')->store('dokumens', 'public');

        // Save to the database
        Dokumen::create([
            'file_pdf' => $path,
            'data_pendukung1' => $request->data_pendukung1,
            'data_pendukung2' => $request->data_pendukung2,
            'data_pendukung3' => $request->data_pendukung3,
            'data_pendukung4' => $request->data_pendukung4,
            'data_pendukung5' => $request->data_pendukung5,
        ]);

        return response()->json(['message' => 'Dokumen uploaded successfully!', 'path' => $path], 201);
    }
}

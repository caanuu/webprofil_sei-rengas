<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'isi_pengaduan' => 'required|string|min:20',
        ]);

        $pengaduan = Pengaduan::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Pengaduan berhasil dikirim.',
            'data' => [
                'id' => $pengaduan->id,
                'created_at' => $pengaduan->created_at,
            ],
        ], 201);
    }

    public function show(Pengaduan $pengaduan)
    {
        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $pengaduan->id,
                'nama_pelapor' => $pengaduan->nama_pelapor,
                'kontak' => $pengaduan->kontak,
                'isi_pengaduan' => $pengaduan->isi_pengaduan,
                'status' => $pengaduan->status,
                'status_label' => $pengaduan->status_label,
                'tanggapan' => $pengaduan->tanggapan,
                'created_at' => $pengaduan->created_at,
                'updated_at' => $pengaduan->updated_at,
            ],
        ]);
    }
}

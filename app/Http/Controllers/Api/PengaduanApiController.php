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
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'subjek' => 'required|string|max:255',
            'isi_pengaduan' => 'required|string|min:20',
        ]);

        $pengaduan = Pengaduan::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Pengaduan berhasil dikirim.',
            'data' => [
                'nomor_tiket' => $pengaduan->nomor_tiket,
                'created_at' => $pengaduan->created_at,
            ],
        ], 201);
    }

    public function show(string $nomorTiket)
    {
        $pengaduan = Pengaduan::where('nomor_tiket', $nomorTiket)->firstOrFail();

        return response()->json([
            'status' => 'success',
            'data' => [
                'nomor_tiket' => $pengaduan->nomor_tiket,
                'subjek' => $pengaduan->subjek,
                'status' => $pengaduan->status,
                'status_label' => $pengaduan->status_label,
                'tanggapan' => $pengaduan->tanggapan,
                'created_at' => $pengaduan->created_at,
                'updated_at' => $pengaduan->updated_at,
            ],
        ]);
    }
}

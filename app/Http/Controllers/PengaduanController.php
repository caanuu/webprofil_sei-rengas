<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'subjek' => 'required|string|max:255',
            'isi_pengaduan' => 'required|string|min:20',
        ], [
            'nama_pelapor.required' => 'Nama pelapor wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'subjek.required' => 'Subjek pengaduan wajib diisi.',
            'isi_pengaduan.required' => 'Isi pengaduan wajib diisi.',
            'isi_pengaduan.min' => 'Isi pengaduan minimal 20 karakter.',
        ]);

        $pengaduan = Pengaduan::create($validated);

        return redirect()->route('pengaduan.tracking', ['tiket' => $pengaduan->nomor_tiket])
            ->with('success', 'Pengaduan berhasil dikirim! Nomor tiket Anda: ' . $pengaduan->nomor_tiket);
    }

    public function tracking(Request $request)
    {
        $pengaduan = null;
        $tiket = $request->get('tiket');

        if ($tiket) {
            $pengaduan = Pengaduan::where('nomor_tiket', $tiket)->first();
        }

        return view('pengaduan.tracking', compact('pengaduan', 'tiket'));
    }
}

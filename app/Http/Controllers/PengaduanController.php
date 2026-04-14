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
            'kontak' => 'required|string|max:255',
            'isi_pengaduan' => 'required|string|min:20',
        ], [
            'nama_pelapor.required' => 'Nama wajib diisi.',
            'kontak.required' => 'Email atau nomor telepon wajib diisi.',
            'isi_pengaduan.required' => 'Isi pengaduan wajib diisi.',
            'isi_pengaduan.min' => 'Isi pengaduan minimal 20 karakter.',
        ]);

        Pengaduan::create($validated);

        return redirect()->route('pengaduan.create')
            ->with('success', 'Pengaduan Anda berhasil dikirim! Terima kasih atas masukan Anda. Kami akan segera menindaklanjuti pengaduan Anda.');
    }
}

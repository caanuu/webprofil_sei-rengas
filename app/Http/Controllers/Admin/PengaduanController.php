<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::orderBy('created_at', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('cari')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_pelapor', 'like', '%' . $request->cari . '%')
                  ->orWhere('kontak', 'like', '%' . $request->cari . '%')
                  ->orWhere('isi_pengaduan', 'like', '%' . $request->cari . '%');
            });
        }

        $pengaduan = $query->paginate(10);
        $countBaru = Pengaduan::baru()->count();
        $countDiproses = Pengaduan::diproses()->count();

        return view('admin.pengaduan.index', compact('pengaduan', 'countBaru', 'countDiproses'));
    }

    public function show(Pengaduan $pengaduan)
    {
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $validated = $request->validate([
            'status' => 'required|in:baru,diproses,selesai,ditolak',
            'tanggapan' => 'nullable|string',
        ]);

        $pengaduan->update($validated);

        return redirect()->route('admin.pengaduan.show', $pengaduan)
            ->with('success', 'Status pengaduan berhasil diperbarui!');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('admin.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus!');
    }
}

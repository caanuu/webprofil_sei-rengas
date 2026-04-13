<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiPublik;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index(Request $request)
    {
        $query = InformasiPublik::with('user')->orderBy('urutan');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $informasi = $query->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|in:layanan,pengumuman',
            'is_active' => 'boolean',
            'urutan' => 'nullable|integer|min:0',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'konten.required' => 'Konten wajib diisi.',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['is_active'] = $request->boolean('is_active');
        $validated['slug'] = Str::slug($validated['judul']) . '-' . Str::random(5);
        $validated['urutan'] = $validated['urutan'] ?? 0;

        InformasiPublik::create($validated);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi publik berhasil ditambahkan!');
    }

    public function edit(InformasiPublik $informasi)
    {
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, InformasiPublik $informasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|in:layanan,pengumuman',
            'is_active' => 'boolean',
            'urutan' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['urutan'] = $validated['urutan'] ?? 0;

        $informasi->update($validated);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi publik berhasil diperbarui!');
    }

    public function destroy(InformasiPublik $informasi)
    {
        $informasi->delete();

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi publik berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('user')->orderBy('created_at', 'desc');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('cari')) {
            $query->where('judul', 'like', '%' . $request->cari . '%');
        }

        $berita = $query->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|in:berita,kegiatan',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'boolean',
            'tanggal_publikasi' => 'nullable|date',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'konten.required' => 'Konten wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_published'] = $request->boolean('is_published');
        $validated['slug'] = Str::slug($validated['judul']) . '-' . Str::random(5);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        if ($validated['is_published'] && empty($validated['tanggal_publikasi'])) {
            $validated['tanggal_publikasi'] = now();
        }

        Berita::create($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $beritum)
    {
        return view('admin.berita.edit', ['berita' => $beritum]);
    }

    public function update(Request $request, Berita $beritum)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|in:berita,kegiatan',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'boolean',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($beritum->gambar) {
                Storage::disk('public')->delete($beritum->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        if ($validated['is_published'] && !$beritum->tanggal_publikasi) {
            $validated['tanggal_publikasi'] = now();
        }

        $beritum->update($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $beritum)
    {
        if ($beritum->gambar) {
            Storage::disk('public')->delete($beritum->gambar);
        }

        $beritum->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}

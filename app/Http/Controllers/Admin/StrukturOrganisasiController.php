<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display the struktur organisasi management page
     */
    public function index(Request $request)
    {
        $tipe = $request->get('tipe', 'pemerintahan');

        if ($tipe === 'pemerintahan') {
            $lurah = StrukturOrganisasi::getOne('pemerintahan', 'lurah');
            $sekretaris = StrukturOrganisasi::getOne('pemerintahan', 'sekretaris');
            $staff = StrukturOrganisasi::getByKategori('pemerintahan', 'staff');
            $kasi = StrukturOrganisasi::getByKategori('pemerintahan', 'kasi');
            $kepling = StrukturOrganisasi::getByKategori('pemerintahan', 'kepling');

            return view('admin.struktur.index', compact('tipe', 'lurah', 'sekretaris', 'staff', 'kasi', 'kepling'));
        }

        // PKK
        $pembina = StrukturOrganisasi::getByKategori('pkk', 'pembina');
        $pengurus = StrukturOrganisasi::getByKategori('pkk', 'pengurus');
        $pokja1 = StrukturOrganisasi::getByKategori('pkk', 'pokja_1');
        $pokja2 = StrukturOrganisasi::getByKategori('pkk', 'pokja_2');
        $pokja3 = StrukturOrganisasi::getByKategori('pkk', 'pokja_3');
        $pokja4 = StrukturOrganisasi::getByKategori('pkk', 'pokja_4');

        return view('admin.struktur.index', compact('tipe', 'pembina', 'pengurus', 'pokja1', 'pokja2', 'pokja3', 'pokja4'));
    }

    /**
     * Show form to create a new member
     */
    public function create(Request $request)
    {
        $tipe = $request->get('tipe', 'pemerintahan');
        $kategori = $request->get('kategori', '');

        return view('admin.struktur.create', compact('tipe', 'kategori'));
    }

    /**
     * Store a new member
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipe' => 'required|in:pemerintahan,pkk',
            'kategori' => 'required|string|max:50',
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'no_hp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'nullable|integer|min:0',
        ]);

        // Auto-set urutan if not provided
        if (empty($validated['urutan'])) {
            $maxUrutan = StrukturOrganisasi::where('tipe', $validated['tipe'])
                ->where('kategori', $validated['kategori'])
                ->max('urutan') ?? 0;
            $validated['urutan'] = $maxUrutan + 1;
        }

        // Handle foto upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'struktur_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/struktur'), $filename);
            $validated['foto'] = $filename;
        }
        unset($validated['foto_input']);

        StrukturOrganisasi::create($validated);

        return redirect()->route('admin.struktur.index', ['tipe' => $validated['tipe']])
            ->with('success', 'Anggota berhasil ditambahkan!');
    }

    /**
     * Show form to edit a member
     */
    public function edit(StrukturOrganisasi $struktur)
    {
        return view('admin.struktur.edit', compact('struktur'));
    }

    /**
     * Update a member
     */
    public function update(Request $request, StrukturOrganisasi $struktur)
    {
        $validated = $request->validate([
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'no_hp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'nullable|integer|min:0',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Delete old foto if exists and is in struktur folder
            if ($struktur->foto && file_exists(public_path('storage/struktur/' . $struktur->foto))) {
                unlink(public_path('storage/struktur/' . $struktur->foto));
            }
            $file = $request->file('foto');
            $filename = 'struktur_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/struktur'), $filename);
            $validated['foto'] = $filename;
        }

        // Handle remove foto
        if ($request->has('hapus_foto') && $request->hapus_foto) {
            if ($struktur->foto && file_exists(public_path('storage/struktur/' . $struktur->foto))) {
                unlink(public_path('storage/struktur/' . $struktur->foto));
            }
            $validated['foto'] = null;
        }

        $struktur->update($validated);

        return redirect()->route('admin.struktur.index', ['tipe' => $struktur->tipe])
            ->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Delete a member
     */
    public function destroy(StrukturOrganisasi $struktur)
    {
        $tipe = $struktur->tipe;

        // Delete foto file
        if ($struktur->foto) {
            $path = public_path('storage/struktur/' . $struktur->foto);
            if (file_exists($path)) unlink($path);
            // Also check root storage
            $path2 = public_path('storage/' . $struktur->foto);
            if (file_exists($path2)) unlink($path2);
        }

        $struktur->delete();

        return redirect()->route('admin.struktur.index', ['tipe' => $tipe])
            ->with('success', 'Data berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilKelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function edit()
    {
        $profil = [];
        $keys = [
            'nama_kelurahan', 'kecamatan', 'kota', 'provinsi',
            'alamat', 'telepon', 'email', 'kode_pos',
            'sejarah', 'visi', 'misi', 'sambutan_lurah', 'nama_lurah',
            'jam_operasional', 'logo', 'foto_lurah',
        ];
        foreach ($keys as $key) {
            $profil[$key] = ProfilKelurahan::getValue($key);
        }

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'kode_pos' => 'required|string|max:10',
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'sambutan_lurah' => 'required|string',
            'nama_lurah' => 'required|string|max:255',
            'jam_operasional' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto_lurah' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $oldLogo = ProfilKelurahan::getValue('logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }
            $path = $request->file('logo')->store('profil', 'public');
            ProfilKelurahan::setValue('logo', $path);
        }

        // Handle foto lurah upload
        if ($request->hasFile('foto_lurah')) {
            $oldFoto = ProfilKelurahan::getValue('foto_lurah');
            if ($oldFoto && Storage::disk('public')->exists($oldFoto)) {
                Storage::disk('public')->delete($oldFoto);
            }
            $path = $request->file('foto_lurah')->store('profil', 'public');
            ProfilKelurahan::setValue('foto_lurah', $path);
        }

        // Save other fields (exclude logo from loop since it's handled above)
        $fields = collect($validated)->except(['logo', 'foto_lurah']);
        foreach ($fields as $key => $value) {
            ProfilKelurahan::setValue($key, $value);
        }

        return redirect()->route('admin.profil.edit')
            ->with('success', 'Profil kelurahan berhasil diperbarui!');
    }

    public function deleteFotoLurah()
    {
        $foto = ProfilKelurahan::getValue('foto_lurah');
        if ($foto && Storage::disk('public')->exists($foto)) {
            Storage::disk('public')->delete($foto);
        }
        ProfilKelurahan::setValue('foto_lurah', null);

        return redirect()->route('admin.profil.edit')
            ->with('success', 'Foto Lurah berhasil dihapus!');
    }
}

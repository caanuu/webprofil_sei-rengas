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
            'jam_operasional', 'logo',
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
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            $oldLogo = ProfilKelurahan::getValue('logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }

            $path = $request->file('logo')->store('profil', 'public');
            ProfilKelurahan::setValue('logo', $path);
        }

        // Save other fields (exclude logo from loop since it's handled above)
        $fields = collect($validated)->except('logo');
        foreach ($fields as $key => $value) {
            ProfilKelurahan::setValue($key, $value);
        }

        return redirect()->route('admin.profil.edit')
            ->with('success', 'Profil kelurahan berhasil diperbarui!');
    }
}

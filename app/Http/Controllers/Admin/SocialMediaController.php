<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedia = SocialMedia::ordered()->get();
        return view('admin.social-media.index', compact('socialMedia'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'social' => 'required|array',
            'social.*.url' => 'nullable|url|max:500',
            'social.*.is_active' => 'nullable',
        ]);

        foreach ($request->input('social', []) as $id => $data) {
            $social = SocialMedia::find($id);
            if ($social) {
                $social->update([
                    'url' => $data['url'] ?? null,
                    'is_active' => ($data['is_active'] ?? '0') === '1',
                ]);
            }
        }

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Pengaturan sosial media berhasil diperbarui!');
    }
}

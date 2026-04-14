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
        $kategoriList = InformasiPublik::select('kategori')->distinct()->pluck('kategori')->toArray();
        return view('admin.informasi.create', compact('kategoriList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:50',
            'is_active' => 'boolean',
            'urutan' => 'nullable|integer|min:0',
            'deskripsi' => 'nullable|string',
            'bagian_judul' => 'nullable|array',
            'bagian_isi' => 'nullable|array',
            'catatan' => 'nullable|string',
        ]);

        $konten = $this->buildKonten($request);

        InformasiPublik::create([
            'judul' => $validated['judul'],
            'konten' => $konten,
            'kategori' => $validated['kategori'],
            'is_active' => $request->boolean('is_active'),
            'urutan' => $validated['urutan'] ?? 0,
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'slug' => Str::slug($validated['judul']) . '-' . Str::random(5),
        ]);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi publik berhasil ditambahkan!');
    }

    public function edit(InformasiPublik $informasi)
    {
        $parsed = $this->parseKonten($informasi->konten);
        $kategoriList = InformasiPublik::select('kategori')->distinct()->pluck('kategori')->toArray();
        return view('admin.informasi.edit', compact('informasi', 'parsed', 'kategoriList'));
    }

    public function update(Request $request, InformasiPublik $informasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:50',
            'is_active' => 'boolean',
            'urutan' => 'nullable|integer|min:0',
            'deskripsi' => 'nullable|string',
            'bagian_judul' => 'nullable|array',
            'bagian_isi' => 'nullable|array',
            'catatan' => 'nullable|string',
        ]);

        $konten = $this->buildKonten($request);

        $informasi->update([
            'judul' => $validated['judul'],
            'konten' => $konten,
            'kategori' => $validated['kategori'],
            'is_active' => $request->boolean('is_active'),
            'urutan' => $validated['urutan'] ?? 0,
        ]);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi publik berhasil diperbarui!');
    }

    public function destroy(InformasiPublik $informasi)
    {
        $informasi->delete();
        return redirect()->route('admin.informasi.index')
            ->with('success', 'Informasi publik berhasil dihapus!');
    }

    /**
     * Build HTML konten from structured fields
     */
    private function buildKonten(Request $request): string
    {
        $html = '';

        // Deskripsi (paragraf pembuka)
        if ($request->filled('deskripsi')) {
            foreach (array_filter(explode("\n", trim($request->deskripsi))) as $line) {
                $html .= "<p>" . e(trim($line)) . "</p>\n";
            }
        }

        // Bagian-bagian (sections) - dynamic
        $judulBagian = $request->input('bagian_judul', []);
        $isiBagian = $request->input('bagian_isi', []);

        foreach ($judulBagian as $i => $judul) {
            $judul = trim($judul);
            $isi = trim($isiBagian[$i] ?? '');
            if (empty($judul) && empty($isi)) continue;

            if (!empty($judul)) {
                $html .= "<h3>" . e($judul) . ":</h3>\n";
            }

            if (!empty($isi)) {
                $items = array_filter(array_map('trim', explode("\n", $isi)));
                if (!empty($items)) {
                    // Use <ol> for sections with prosedur/langkah/tahap in title, <ul> for others
                    $isOrdered = preg_match('/prosedur|langkah|tahap|cara/i', $judul);
                    $tag = $isOrdered ? 'ol' : 'ul';
                    $html .= "<{$tag}>\n";
                    foreach ($items as $item) {
                        $html .= "<li>" . e($item) . "</li>\n";
                    }
                    $html .= "</{$tag}>\n";
                }
            }
        }

        // Catatan tambahan
        if ($request->filled('catatan')) {
            foreach (array_filter(explode("\n", trim($request->catatan))) as $line) {
                $html .= "<p>" . e(trim($line)) . "</p>\n";
            }
        }

        return $html;
    }

    /**
     * Parse existing HTML konten back into structured fields
     */
    private function parseKonten(string $konten): array
    {
        $parsed = [
            'deskripsi' => '',
            'bagian' => [],
            'catatan' => '',
        ];

        // Remove leading/trailing whitespace
        $konten = trim($konten);
        if (empty($konten)) return $parsed;

        // Extract leading paragraphs (before first <h3>)
        if (preg_match('/^((?:<p>.*?<\/p>\s*)+)/si', $konten, $m)) {
            $firstH3Pos = stripos($konten, '<h3>');
            if ($firstH3Pos === false || strpos($konten, '<p>') < $firstH3Pos) {
                // Get paragraphs before first h3
                $beforeH3 = $firstH3Pos !== false ? substr($konten, 0, $firstH3Pos) : '';
                if (!empty($beforeH3)) {
                    preg_match_all('/<p>(.*?)<\/p>/si', $beforeH3, $pMatches);
                    $parsed['deskripsi'] = implode("\n", array_map('strip_tags', $pMatches[1] ?? []));
                }
            }
        }

        // Extract sections: <h3>Title</h3> followed by <ul>/<ol>
        preg_match_all('/<h3>\s*(.*?):?\s*<\/h3>\s*(?:<[ou]l>(.*?)<\/[ou]l>)?/si', $konten, $sections, PREG_SET_ORDER);

        foreach ($sections as $section) {
            $title = strip_tags(trim($section[1]));
            $listHtml = $section[2] ?? '';

            $items = [];
            if (!empty($listHtml)) {
                preg_match_all('/<li>(.*?)<\/li>/si', $listHtml, $liMatches);
                $items = array_map('strip_tags', $liMatches[1] ?? []);
            }

            $parsed['bagian'][] = [
                'judul' => rtrim($title, ':'),
                'isi' => implode("\n", $items),
            ];
        }

        // Extract trailing paragraphs (after last </ul> or </ol>)
        $lastListEnd = max(
            (int) strrpos($konten, '</ul>'),
            (int) strrpos($konten, '</ol>')
        );
        if ($lastListEnd > 0) {
            $afterList = substr($konten, $lastListEnd + 5);
            // Check if there's a <h3> with <p> (like Waktu Penyelesaian)
            if (preg_match('/<h3>\s*(.*?):?\s*<\/h3>\s*<p>(.*?)<\/p>/si', $afterList, $trailingSection)) {
                $parsed['bagian'][] = [
                    'judul' => strip_tags(rtrim($trailingSection[1], ':')),
                    'isi' => strip_tags($trailingSection[2]),
                ];
            } else {
                preg_match_all('/<p>(.*?)<\/p>/si', $afterList, $pMatches);
                if (!empty($pMatches[1])) {
                    $parsed['catatan'] = implode("\n", array_map('strip_tags', $pMatches[1]));
                }
            }
        }

        // If no sections found, put everything as deskripsi
        if (empty($parsed['bagian']) && empty($parsed['deskripsi'])) {
            $parsed['deskripsi'] = strip_tags($konten);
        }

        return $parsed;
    }
}

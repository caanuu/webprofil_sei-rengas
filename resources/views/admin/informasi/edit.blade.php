@extends('layouts.admin')
@section('title', 'Edit Informasi')
@section('page-title', 'Edit Informasi Publik')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.informasi.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600 mb-6 transition">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <h2 class="text-xl font-bold text-slate-800 mb-6">Edit Informasi Publik</h2>

        {{-- Peringatan --}}
        <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 flex items-start gap-3 mb-6">
            <div class="w-8 h-8 bg-amber-400 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fas fa-exclamation-triangle text-white text-sm"></i>
            </div>
            <div>
                <p class="font-bold text-amber-800 text-sm">Perhatian!</p>
                <p class="text-amber-700 text-xs mt-1">Jangan mencantumkan informasi terkait <strong>biaya / tarif</strong>. Informasi biaya merupakan kebijakan internal kantor.</p>
            </div>
        </div>

        <form action="{{ route('admin.informasi.update', $informasi) }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            <div>
                <label class="form-label">Judul <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul', $informasi->judul) }}" class="form-input" required>
                @error('judul')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" id="kategoriSelect" class="form-input" onchange="toggleKategoriBaru()">
                        @foreach($kategoriList as $kat)
                            <option value="{{ $kat }}" {{ old('kategori', $informasi->kategori) == $kat ? 'selected' : '' }}>{{ ucfirst($kat) }}</option>
                        @endforeach
                        <option value="__baru__">+ Tambah Kategori Baru</option>
                    </select>
                    <input type="text" id="kategoriBaru" class="form-input mt-2 hidden" placeholder="Ketik nama kategori baru (huruf kecil)" oninput="this.value = this.value.toLowerCase()">
                </div>
                <div>
                    <label class="form-label">Urutan</label>
                    <input type="number" name="urutan" value="{{ old('urutan', $informasi->urutan) }}" class="form-input" min="0">
                </div>
            </div>

            {{-- Petunjuk --}}
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                <p class="text-blue-800 text-xs"><i class="fas fa-info-circle mr-1"></i> Isi setiap baris dengan <strong>satu item</strong>. Tekan Enter untuk menambah item baru. Tidak perlu menulis kode HTML.</p>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="form-label"><i class="fas fa-align-left text-slate-400 mr-1"></i>Deskripsi / Paragraf Pembuka <span class="text-slate-400 text-xs">(opsional)</span></label>
                <textarea name="deskripsi" rows="3" class="form-input" placeholder="Tulis paragraf pengantar (opsional)...">{{ old('deskripsi', $parsed['deskripsi'] ?? '') }}</textarea>
            </div>

            {{-- Dynamic Sections --}}
            <div id="sectionsContainer">
                @php $bagian = old('bagian_judul') ? collect(old('bagian_judul'))->map(fn($j, $i) => ['judul' => $j, 'isi' => old("bagian_isi.{$i}", '')]) : collect($parsed['bagian'] ?? []) @endphp

                @forelse($bagian as $i => $section)
                <div class="section-block bg-slate-50 rounded-xl p-5 mb-4 border border-slate-200" data-index="{{ $i }}">
                    <div class="flex items-center justify-between mb-3">
                        <label class="form-label mb-0"><i class="fas fa-tag text-blue-500 mr-1"></i>Judul Bagian</label>
                        @if($i > 0)
                        <button type="button" onclick="removeSection(this)" class="text-xs text-red-400 hover:text-red-600 transition"><i class="fas fa-times mr-1"></i>Hapus</button>
                        @endif
                    </div>
                    <input type="text" name="bagian_judul[]" value="{{ $section['judul'] }}" class="form-input mb-3" placeholder="Contoh: Persyaratan, Program, Jadwal, dll">
                    <label class="form-label"><i class="fas fa-list text-emerald-500 mr-1"></i>Isi Bagian</label>
                    <textarea name="bagian_isi[]" rows="{{ min(max(substr_count($section['isi'], "\n") + 2, 3), 8) }}" class="form-input" placeholder="Satu item per baris">{{ $section['isi'] }}</textarea>
                    <p class="text-xs text-slate-400 mt-1">Satu item per baris. Judul mengandung kata "Prosedur/Langkah/Cara" → otomatis diberi nomor urut.</p>
                </div>
                @empty
                <div class="section-block bg-slate-50 rounded-xl p-5 mb-4 border border-slate-200" data-index="0">
                    <div class="flex items-center justify-between mb-3">
                        <label class="form-label mb-0"><i class="fas fa-tag text-blue-500 mr-1"></i>Judul Bagian</label>
                    </div>
                    <input type="text" name="bagian_judul[]" value="Persyaratan" class="form-input mb-3" placeholder="Contoh: Persyaratan">
                    <label class="form-label"><i class="fas fa-list text-emerald-500 mr-1"></i>Isi Bagian</label>
                    <textarea name="bagian_isi[]" rows="4" class="form-input" placeholder="Satu item per baris"></textarea>
                </div>
                @endforelse
            </div>

            {{-- Tombol Tambah Section --}}
            <button type="button" onclick="addSection()" class="w-full border-2 border-dashed border-slate-300 rounded-xl py-3 text-sm text-slate-500 hover:border-blue-400 hover:text-blue-600 transition">
                <i class="fas fa-plus mr-1"></i> Tambah Bagian Baru
            </button>

            {{-- Catatan --}}
            <div>
                <label class="form-label"><i class="fas fa-sticky-note text-amber-400 mr-1"></i>Catatan Tambahan <span class="text-slate-400 text-xs">(opsional)</span></label>
                <textarea name="catatan" rows="2" class="form-input" placeholder="Paragraf penutup / catatan tambahan (opsional)...">{{ old('catatan', $parsed['catatan'] ?? '') }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $informasi->is_active) ? 'checked' : '' }}
                       class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                <label for="is_active" class="text-sm font-medium text-slate-700">Aktif</label>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Perbarui</button>
                <a href="{{ route('admin.informasi.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
let sectionIndex = {{ count($bagian) }};

function addSection() {
    const container = document.getElementById('sectionsContainer');
    const html = `
        <div class="section-block bg-slate-50 rounded-xl p-5 mb-4 border border-slate-200" data-index="${sectionIndex}">
            <div class="flex items-center justify-between mb-3">
                <label class="form-label mb-0"><i class="fas fa-tag text-blue-500 mr-1"></i>Judul Bagian</label>
                <button type="button" onclick="removeSection(this)" class="text-xs text-red-400 hover:text-red-600 transition"><i class="fas fa-times mr-1"></i>Hapus</button>
            </div>
            <input type="text" name="bagian_judul[]" class="form-input mb-3" placeholder="Contoh: Persyaratan Tambahan, Catatan, dll">
            <label class="form-label"><i class="fas fa-list text-emerald-500 mr-1"></i>Isi Bagian</label>
            <textarea name="bagian_isi[]" rows="4" class="form-input" placeholder="Satu item per baris"></textarea>
        </div>`;
    container.insertAdjacentHTML('beforeend', html);
    sectionIndex++;
}

function removeSection(btn) {
    btn.closest('.section-block').remove();
}

function toggleKategoriBaru() {
    const select = document.getElementById('kategoriSelect');
    const input = document.getElementById('kategoriBaru');
    if (select.value === '__baru__') {
        input.classList.remove('hidden');
        input.focus();
    } else {
        input.classList.add('hidden');
        input.value = '';
    }
}

document.querySelector('form').addEventListener('submit', function() {
    const select = document.getElementById('kategoriSelect');
    const input = document.getElementById('kategoriBaru');
    if (select.value === '__baru__' && input.value.trim()) {
        const opt = document.createElement('option');
        opt.value = input.value.trim();
        opt.selected = true;
        select.appendChild(opt);
    }
});
</script>
@endpush

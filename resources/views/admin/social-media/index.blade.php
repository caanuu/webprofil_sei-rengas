@extends('layouts.admin')
@section('title', 'Sosial Media')
@section('page-title', 'Sosial Media')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-slate-800">
                <i class="fas fa-share-alt text-blue-600 mr-2"></i>Pengaturan Sosial Media
            </h2>
        </div>
        <p class="text-sm text-slate-400 mb-6">Aktifkan dan isi link sosial media yang ingin ditampilkan di footer</p>

        <form action="{{ route('admin.social-media.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-3">
                @foreach($socialMedia as $social)
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 p-4 rounded-xl border border-slate-200 bg-white">

                    {{-- Left: Icon + Name + Toggle --}}
                    <div class="flex items-center gap-3 sm:w-56 shrink-0">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-white shrink-0" style="background-color: {{ $social->hover_color }}">
                            <i class="{{ $social->icon }} text-lg"></i>
                        </div>
                        <span class="font-semibold text-slate-700 text-sm">{{ $social->platform }}</span>

                        {{-- Simple select dropdown for status --}}
                        <select name="social[{{ $social->id }}][is_active]"
                            class="ml-auto sm:ml-2 px-2 py-1 text-xs font-semibold rounded-lg border cursor-pointer
                            {{ $social->is_active ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-slate-50 text-slate-500 border-slate-200' }}"
                            onchange="this.className = this.value == '1'
                                ? 'ml-auto sm:ml-2 px-2 py-1 text-xs font-semibold rounded-lg border cursor-pointer bg-emerald-50 text-emerald-700 border-emerald-200'
                                : 'ml-auto sm:ml-2 px-2 py-1 text-xs font-semibold rounded-lg border cursor-pointer bg-slate-50 text-slate-500 border-slate-200'">
                            <option value="0" {{ !$social->is_active ? 'selected' : '' }}>Nonaktif</option>
                            <option value="1" {{ $social->is_active ? 'selected' : '' }}>Aktif</option>
                        </select>
                    </div>

                    {{-- Right: URL Input --}}
                    <div class="flex-1">
                        <input type="url" name="social[{{ $social->id }}][url]"
                            value="{{ old('social.'.$social->id.'.url', $social->url) }}"
                            placeholder="https://..."
                            class="w-full px-4 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                    </div>
                </div>
                @endforeach
            </div>

            @if($errors->any())
            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-600">
                <p class="font-semibold mb-1"><i class="fas fa-exclamation-triangle mr-1"></i> Terjadi kesalahan:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mt-6 pt-4 border-t border-slate-100">
                <button type="submit" class="btn btn-success px-8">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

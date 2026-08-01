@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <a href="{{ route('public.lowongan.index') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">← Kembali</a>

    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold mb-2">{{ $lowongan->judul }}</h1>
        
        @if($lowongan->badge)
            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold mb-6 inline-block">
                {{ $lowongan->badge }}
            </span>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <p class="mb-4"><strong class="text-gray-700">Perusahaan:</strong> {{ $lowongan->perusahaan }}</p>
                <p class="mb-4"><strong class="text-gray-700">Posisi:</strong> {{ $lowongan->posisi }}</p>
                <p class="mb-4"><strong class="text-gray-700">Lokasi:</strong> {{ $lowongan->lokasi }}</p>
                <p class="mb-4"><strong class="text-gray-700">Tipe:</strong> {{ $lowongan->tipe }}</p>
            </div>
        </div>

        <div class="mb-8 pb-8 border-b">
            <h2 class="text-2xl font-semibold mb-4">Deskripsi</h2>
            <div class="prose max-w-none">
                {!! nl2br($lowongan->deskripsi) !!}
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-semibold mb-4">Kualifikasi</h2>
            <div class="prose max-w-none">
                {!! nl2br($lowongan->kualifikasi) !!}
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <a href="{{ route('public.struktur.index') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">← Kembali</a>

    <div class="bg-white rounded-lg shadow-md p-8">
        @if($struktur->icon)
            <div class="text-6xl mb-6">{{ $struktur->icon }}</div>
        @endif
        
        <h1 class="text-3xl font-bold mb-6">{{ $struktur->nama }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="mb-4"><strong class="text-gray-700">Jabatan:</strong> {{ $struktur->jabatan }}</p>
                <p class="mb-4"><strong class="text-gray-700">Divisi:</strong> {{ $struktur->divisi }}</p>
                <p class="mb-4"><strong class="text-gray-700">Level:</strong> {{ $struktur->level }}</p>
                <p class="mb-4"><strong class="text-gray-700">Periode:</strong> {{ $struktur->periode }}</p>
                <p class="mb-4"><strong class="text-gray-700">Urutan:</strong> {{ $struktur->urutan }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

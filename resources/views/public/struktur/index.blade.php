@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Struktur Organisasi</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($strukturs as $struktur)
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                @if($struktur->icon)
                    <div class="text-4xl mb-4">{{ $struktur->icon }}</div>
                @endif
                <h2 class="text-xl font-semibold mb-2">{{ $struktur->nama }}</h2>
                <p class="text-gray-600 mb-1"><strong>Jabatan:</strong> {{ $struktur->jabatan }}</p>
                <p class="text-gray-600 mb-1"><strong>Divisi:</strong> {{ $struktur->divisi }}</p>
                <p class="text-gray-600 mb-1"><strong>Level:</strong> {{ $struktur->level }}</p>
                <p class="text-gray-600 mb-4"><strong>Periode:</strong> {{ $struktur->periode }}</p>
                <a href="{{ route('public.struktur.show', $struktur->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                    Lihat Detail →
                </a>
            </div>
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500 text-lg">Belum ada data struktur.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $strukturs->links() }}
    </div>
</div>
@endsection

@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Lowongan Pekerjaan</h1>

    <div class="space-y-6">
        @forelse($lowongans as $lowongan)
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-2xl font-semibold mb-2">{{ $lowongan->judul }}</h2>
                        <p class="text-gray-600 mb-1"><strong>Perusahaan:</strong> {{ $lowongan->perusahaan }}</p>
                        <p class="text-gray-600 mb-1"><strong>Posisi:</strong> {{ $lowongan->posisi }}</p>
                        <p class="text-gray-600 mb-1"><strong>Lokasi:</strong> {{ $lowongan->lokasi }}</p>
                        <p class="text-gray-600 mb-1"><strong>Tipe:</strong> {{ $lowongan->tipe }}</p>
                    </div>
                    @if($lowongan->badge)
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $lowongan->badge }}
                        </span>
                    @endif
                </div>
                <a href="{{ route('public.lowongan.show', $lowongan->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold mt-4 inline-block">
                    Lihat Detail →
                </a>
            </div>
        @empty
            <div class="text-center py-8">
                <p class="text-gray-500 text-lg">Belum ada lowongan pekerjaan.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $lowongans->links() }}
    </div>
</div>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Berkas</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-2">
                <p><strong>Judul:</strong> {{ $upload->judul }}</p>
                <p><strong>Keterangan:</strong> {{ $upload->keterangan ?? '-' }}</p>
                <p><strong>Nama File:</strong> {{ $upload->filename }}</p>
                <p><strong>Diunggah oleh:</strong> {{ $upload->user->name }}</p>
                <p><strong>Tanggal Unggah:</strong> {{ $upload->created_at->format('d-m-Y H:i') }}</p>

                @php
                    $ext = strtolower(pathinfo($upload->filepath, PATHINFO_EXTENSION));
                @endphp

                {{-- Jika file berupa gambar, tampilkan pratinjau --}}
                @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                    <img src="{{ asset('storage/' . $upload->filepath) }}" alt="{{ $upload->judul }}"
                         class="max-w-sm rounded border">
                @else
                    <a href="{{ asset('storage/' . $upload->filepath) }}" target="_blank"
                       class="inline-block px-4 py-2 bg-gray-800 text-white rounded">Buka / Unduh Berkas</a>
                @endif

                <div class="pt-4">
                    <a href="{{ route('uploads.edit', $upload) }}" class="text-yellow-600">Edit</a> |
                    <a href="{{ route('uploads.index') }}" class="text-gray-600">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
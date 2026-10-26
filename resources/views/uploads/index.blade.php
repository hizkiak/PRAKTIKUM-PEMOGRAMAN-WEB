<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Berkas</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                {{-- Pesan berhasil dari controller --}}
                @if (session('success'))
                    <div class="mb-4 p-3 rounded bg-green-100 text-green-700">{{ session('success') }}</div>
                @endif

                <a href="{{ route('uploads.create') }}" class="inline-block mb-4 px-4 py-2 bg-red-600 text-white rounded">+ Unggah Berkas</a>

                <table class="w-full border text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Judul</th>
                            <th class="border p-2">Nama File</th>
                            <th class="border p-2">Tanggal Unggah</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($uploads as $upload)
                            <tr>
                                <td class="border p-2">{{ $uploads->firstItem() + $loop->index }}</td>
                                <td class="border p-2">{{ $upload->judul }}</td>
                                <td class="border p-2">
                                    {{-- Link untuk membuka file di tab baru --}}
                                    <a href="{{ asset('storage/' . $upload->filepath) }}" target="_blank" class="text-blue-600 underline">{{ $upload->filename }}</a>
                                </td>
                                <td class="border p-2">{{ $upload->created_at->format('d-m-Y H:i') }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('uploads.show', $upload) }}" class="text-sky-600">Lihat</a> |
                                    <a href="{{ route('uploads.edit', $upload) }}" class="text-yellow-600">Edit</a> |
                                    <form action="{{ route('uploads.destroy', $upload) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600" onclick="return confirm('Yakin ingin menghapus berkas ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border p-2 text-center">Belum ada berkas yang diunggah.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">{{ $uploads->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
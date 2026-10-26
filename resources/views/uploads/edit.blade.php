<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Berkas</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('uploads.update', $upload) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Mengubah request menjadi PUT agar menuju method update() --}}

                    <div class="mb-4">
                        <x-input-label for="judul" value="Judul" />
                        <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full"
                                      :value="old('judul', $upload->judul)" required />
                        <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="keterangan" value="Keterangan (opsional)" />
                        <textarea id="keterangan" name="keterangan" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('keterangan', $upload->keterangan) }}</textarea>
                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <p class="text-sm text-gray-600">File saat ini:
                            <a href="{{ asset('storage/' . $upload->filepath) }}" target="_blank"
                               class="text-blue-600 underline">{{ $upload->filename }}</a>
                        </p>
                        <x-input-label for="file" value="Ganti Berkas (kosongkan jika tidak ingin mengganti)" class="mt-2" />
                        <input id="file" name="file" type="file" class="mt-1 block w-full">
                        <x-input-error :messages="$errors->get('file')" class="mt-2" />
                    </div>

                    <x-primary-button>Update</x-primary-button>
                    <a href="{{ route('uploads.index') }}" class="ms-3 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto p-4">

        <h1 class="text-2xl font-bold mb-6">✏️ Edit Kategori</h1>

        <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Kategori</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $category->name) }}"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('categories.index') }}" class="text-gray-600 hover:underline">
                    &larr; Kembali
                </a>
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700"
                >
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</x-app-layout>

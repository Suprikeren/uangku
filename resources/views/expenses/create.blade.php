<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            {{ __('Tambah Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="max-w-full mx-auto p-4">
        <h1 class="text-xl font-bold mb-6">+ Tambah Pengeluaran</h1>

        <form action="{{ route('expenses.store') }}" method="POST" class="space-y-5 bg-white p-5 rounded shadow">
            @csrf

            {{-- Kategori --}}
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="category_id" id="category_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jumlah --}}
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Jumlah (Rp)</label>
                <input type="number" name="amount" id="amount" min="1"
                    value="{{ old('amount') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('amount')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal --}}
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="date" id="date"
                    value="{{ old('date', now()->toDateString()) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Catatan --}}
            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                <textarea name="notes" id="notes" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-between items-center">
                <a href="{{ route('expenses.index') }}" class="text-gray-600 hover:underline">
                    &larr; Batal
                </a>
                <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

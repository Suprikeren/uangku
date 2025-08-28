<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto p-4 space-y-6 bg-white rounded shadow">

        <form action="{{ route('expenses.update', $expense) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="category_id" class="block font-semibold mb-1">Kategori</label>
                <select name="category_id" id="category_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('category_id') border-red-500 @enderror"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $expense->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="amount" class="block font-semibold mb-1">Jumlah (Rp)</label>
                <input type="number" name="amount" id="amount" min="0" required
                    value="{{ old('amount', $expense->amount) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('amount') border-red-500 @enderror" />
                @error('amount')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date" class="block font-semibold mb-1">Tanggal</label>
                <input type="date" name="date" id="date" required
                    value="{{ old('date', $expense->date->format('Y-m-d')) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('date') border-red-500 @enderror" />
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="notes" class="block font-semibold mb-1">Catatan</label>
                <textarea name="notes" id="notes" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('notes') border-red-500 @enderror">{{ old('notes', $expense->notes) }}</textarea>
                @error('notes')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between space-x-3 mt-6">
                <a href="{{ route('expenses.show', $expense) }}"
                    class="flex-1 text-center px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Batal
                </a>
                <button type="submit" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

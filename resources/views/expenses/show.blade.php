<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto p-4 space-y-6">

        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Kategori</h3>
            <p class="text-gray-700 text-base">{{ $expense->category->name }}</p>
        </div>

        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Jumlah</h3>
            <p class="text-red-600 font-bold text-2xl">Rp{{ number_format($expense->amount, 0, ',', '.') }}</p>
        </div>

        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Tanggal</h3>
            <p class="text-gray-700">{{ \Carbon\Carbon::parse($expense->date)->translatedFormat('d M Y') }}</p>
        </div>

        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Catatan</h3>
            @if ($expense->notes)
                <p class="text-gray-600 italic">{{ $expense->notes }}</p>
            @else
                <p class="text-gray-400 italic">Tidak ada catatan.</p>
            @endif
        </div>

        <div class="flex justify-between mt-8 space-x-2">
            <a href="{{ route('expenses.index') }}"
               class="flex-1 px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 text-center">
                Kembali
            </a>

            <a href="{{ route('expenses.edit', $expense) }}"
               class="flex-1 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-center">
                Edit
            </a>

            <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus pengeluaran ini?')"
                        class="w-full px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Hapus
                </button>
            </form>
        </div>

    </div>
</x-app-layout>

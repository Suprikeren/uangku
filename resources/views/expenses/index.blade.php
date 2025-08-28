<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            {{ __('Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="max-w-full mx-auto p-4 space-y-6">

        {{-- Judul + Tombol --}}
        <div class="flex flex-col gap-2">
            <h1 class="text-xl font-bold">📒 Daftar Pengeluaran</h1>
            <a href="{{ route('expenses.create') }}"
                class="w-full bg-blue-600 text-white text-center py-3 rounded hover:bg-blue-700 transition">
                + Tambah Pengeluaran
            </a>
        </div>

        {{-- Filter Kategori --}}
        <div>
            <label for="categoryFilter" class="block text-sm font-medium mb-2">Filter Kategori</label>
            <select id="categoryFilter" class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="all">Semua</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Ringkasan Bulanan --}}
        <div class="bg-white rounded shadow p-4">
            <h2 class="text-sm text-gray-600 mb-1">Total Bulan {{ now()->translatedFormat('F Y') }}</h2>
            <p class="text-2xl font-bold text-red-500">Rp{{ number_format($totalAmount ?? 0, 0, ',', '.') }}</p>
        </div>

        {{-- List Pengeluaran --}}
        <div class="space-y-4">
            @if ($expenses->isEmpty())
                <p class="text-gray-500 text-center">Belum ada pengeluaran.</p>
            @else
                <ul id="expenseList" class="space-y-3">
                    @foreach ($expenses as $item)
                        <li data-category="{{ $item->category_id }}"
                            class="bg-white p-4 rounded shadow flex justify-between items-start">

                            <div class="w-full">
                                <div class="flex justify-between items-center">
                                    <p class="font-semibold text-gray-800">{{ $item->category->name }}</p>
                                    <p class="text-red-500 font-bold text-sm whitespace-nowrap">
                                        - Rp{{ number_format($item->amount, 0, ',', '.') }}
                                    </p>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d M Y') }}
                                </p>
                                @if ($item->notes)
                                    <p class="text-xs text-gray-400 mt-1 italic truncate">{{ $item->notes }}</p>
                                @endif
                            </div>

                            <div class="ml-4 flex items-center">
                                <a href="{{ route('expenses.show', $item) }}"
                                    class="text-blue-600 hover:underline text-sm whitespace-nowrap">
                                    Detail
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>

            @endif
        </div>
    </div>

    {{-- Script Filter --}}
    <script>
        const filter = document.getElementById('categoryFilter');
        const expenseList = document.getElementById('expenseList');

        filter.addEventListener('change', () => {
            const selected = filter.value;
            const items = expenseList.querySelectorAll('li');
            items.forEach(item => {
                item.style.display = (selected === 'all' || item.dataset.category === selected) ? 'block' :
                    'none';
            });
        });
    </script>
</x-app-layout>

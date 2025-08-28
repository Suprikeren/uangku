<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-4 space-y-6">

        {{-- Judul + Tombol tambah --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <h1 class="text-2xl font-bold">📂 Daftar Kategori</h1>
            <a href="{{ route('categories.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 whitespace-nowrap">
                + Tambah Kategori
            </a>
        </div>

        {{-- Tabel kategori --}}
        <div class="bg-white p-4 rounded shadow overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Nama Kategori</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Dummy Data --}}
                    @foreach ($categories as $key => $category)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $key + 1 }}</td>
                            <td class="px-4 py-2">{{ $category->name }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Yakin hapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>

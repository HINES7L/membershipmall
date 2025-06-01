<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-white">🎁 Daftar Reward</h2>
    </x-slot>

    <div class="py-8 px-4 text-white bg-[#0f172a] min-h-screen">
        @if (session('success'))
            <div class="bg-green-600 text-white p-4 rounded mb-4 text-center">{{ session('success') }}</div>
        @endif

        <div class="mb-4 text-right">
            <a href="{{ route('rewards.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded text-white font-semibold">
                ➕ Tambah Reward
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 rounded-xl overflow-hidden">
                <thead class="bg-gray-700 text-sm text-white uppercase">
                    <tr>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Deskripsi</th>
                        <th class="px-4 py-3 text-left">Biaya Poin</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 text-sm">
                    @foreach ($rewards as $reward)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $reward->title }}</td>
                            <td class="px-4 py-3">{{ $reward->description }}</td>
                            <td class="px-4 py-3">{{ $reward->point_cost }}</td>
                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('rewards.edit', $reward->id) }}"
                                   class="text-indigo-400 hover:underline">Edit</a>

                                <form action="{{ route('rewards.destroy', $reward->id) }}"
                                      method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin ingin hapus reward ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-400 hover:text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

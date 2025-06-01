<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 text-white">
        <div class="flex items-center justify-between mb-12">
            <h2 class="text-3xl font-bold">👤 Daftar Pengguna</h2>
            <a href="{{ route('users.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md shadow transition duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Pengguna
            </a>
        </div>

        <div class="overflow-x-auto bg-gray-900 rounded-xl shadow-lg ring-1 ring-gray-800">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase">Nama</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase">Terverifikasi</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase">Dibuat</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-300 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-900 divide-y divide-gray-800">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-800 transition duration-200">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($user->email_verified_at)
                                    <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium bg-green-600 text-white rounded-md">
                                        ✔ Terverifikasi
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium bg-red-600 text-white rounded-md">
                                        ✖ Belum
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-semibold rounded transition">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded transition">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-6 text-center text-gray-400 text-sm">Tidak ada pengguna ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

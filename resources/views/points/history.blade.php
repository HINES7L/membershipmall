<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-white tracking-wide">📄 Riwayat Penukaran Poin</h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-[#1e293b] to-[#0f172a] min-h-screen text-white">
        @if (session('success'))
            <div class="max-w-4xl mx-auto bg-green-600/90 backdrop-blur-md shadow-lg rounded-lg p-4 mb-8 text-center font-semibold text-white transition duration-300">
                {{ session('success') }}
            </div>
        @endif

        @if ($histories->isEmpty())
            <p class="max-w-4xl mx-auto text-center text-gray-400 italic text-lg mt-20">Belum ada riwayat penukaran poin.</p>
        @else
            <div class="max-w-6xl mx-auto overflow-x-auto rounded-xl shadow-lg">
                <table class="min-w-full bg-gray-900 rounded-xl border border-gray-700">
                    <thead class="bg-gradient-to-r from-indigo-700 to-purple-700 text-white text-sm uppercase tracking-wide select-none">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold">Reward</th>
                            <th class="px-6 py-4 text-left font-semibold">Amount (Rp)</th>
                            <th class="px-6 py-4 text-left font-semibold">Points</th>
                            <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800 text-sm">
                        @foreach ($histories as $item)
                            <tr class="hover:bg-gray-800 transition-colors duration-200">
                                <td class="px-6 py-4 capitalize font-medium text-indigo-300">{{ str_replace('-', ' ', $item->reward) }}</td>
                                <td class="px-6 py-4 text-gray-300">Rp{{ number_format($item->amount, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-semibold text-indigo-400">{{ $item->points }}</td>
                                <td class="px-6 py-4 text-gray-400">{{ $item->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>

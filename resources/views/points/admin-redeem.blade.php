<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-white">Riwayat Penukaran</h2>
    </x-slot>

    <div class="p-6 bg-[#0f172a] min-h-screen space-y-8 text-white">

        {{-- Menu Tukar Hadiah --}}
        <div class="mb-6">
            <a href="{{ route('points.redeem.digital') }}" 
               class="inline-block bg-indigo-600 hover:bg-indigo-700 px-5 py-4 rounded-lg shadow font-semibold transition">
               🚗 Digital Coupon
            </a>
        </div>

        @auth
            @if(auth()->user()->id == 1)

                {{-- Kotak 1: Tabel Penukaran Poin --}}
                <div class="bg-gray-900 rounded-xl shadow-lg border border-gray-700 p-6">
                    <h3 class="text-lg font-semibold mb-4 text-indigo-400">Penukaran Poin</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-white">
                            <thead class="bg-gray-800 uppercase tracking-wide text-gray-300">
                                <tr>
                                    <th class="px-5 py-3">User</th>
                                    <th class="px-5 py-3">Reward</th>
                                    <th class="px-5 py-3">Points</th>
                                    <th class="px-5 py-3">Tanggal</th>
                                    <th class="px-5 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach ($exchanges as $exchange)
                                    <tr class="hover:bg-gray-700 transition-colors">
                                        <td class="px-5 py-3">{{ $exchange->user->name }}</td>
                                        <td class="px-5 py-3">{{ ucfirst(str_replace('-', ' ', $exchange->reward)) }}</td>
                                        <td class="px-5 py-3">{{ $exchange->points }}</td>
                                        <td class="px-5 py-3">{{ $exchange->created_at->format('d M Y H:i') }}</td>
                                        <td class="px-5 py-3">
                                            <form action="{{ route('points.redeem.destroy', $exchange->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Kotak 2: Tabel Detail Redeem --}}
                <div class="bg-gray-900 rounded-xl shadow-lg border border-gray-700 p-6">
                    <h3 class="text-lg font-semibold mb-4 text-indigo-400">Detail Redeem</h3>
                    <div class="overflow-x-auto max-h-[400px] overflow-y-auto">
                        <table class="min-w-full text-sm text-left text-white">
                            <thead class="bg-gray-800 uppercase tracking-wide text-gray-300 sticky top-0">
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Point Exchange ID</th>
                                    <th class="px-4 py-2">User ID</th>
                                    <th class="px-4 py-2">Reward</th>
                                    <th class="px-4 py-2">Point Cost</th>
                                    <th class="px-4 py-2">Coupon Code</th>
                                    <th class="px-4 py-2">Full Name</th>
                                    <th class="px-4 py-2">Address</th>
                                    <th class="px-4 py-2">Phone</th>
                                    <th class="px-4 py-2">Created At</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @forelse ($redeemDetails as $detail)
                                    <tr class="hover:bg-gray-700 transition-colors">
                                        <td class="px-4 py-2">{{ $detail->id }}</td>
                                        <td class="px-4 py-2">{{ $detail->point_exchange_id }}</td>
                                        <td class="px-4 py-2">{{ $detail->user_id }}</td>
                                        <td class="px-4 py-2">{{ $detail->reward }}</td>
                                        <td class="px-4 py-2">{{ $detail->point_cost }}</td>
                                        <td class="px-4 py-2">{{ $detail->coupon_code ?? '-' }}</td>
                                        <td class="px-4 py-2">{{ $detail->full_name }}</td>
                                        <td class="px-4 py-2">{{ $detail->address }}</td>
                                        <td class="px-4 py-2">{{ $detail->phone }}</td>
                                        <td class="px-4 py-2">{{ $detail->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center py-6 text-gray-400">Tidak ada data redeem.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            @else
                <p class="text-center text-red-500 font-semibold mt-12">Anda tidak memiliki akses untuk melihat data ini.</p>
            @endif
        @endauth

    </div>
</x-app-layout>

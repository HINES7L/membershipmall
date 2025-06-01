<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">
             Exchange Points
        </h2>
    </x-slot>

    <div class="py-10 bg-[#0f172a] min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="bg-green-600 text-white text-sm p-4 rounded-lg mb-6 shadow text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Card Container --}}
            <div class="bg-gray-800 text-white p-8 rounded-2xl shadow-xl space-y-6">

                <h3 class="text-2xl font-bold"> Exchange Cash for Points</h3>

                <form action="{{ route('points.exchange') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Pilih User --}}
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-300 mb-1">👤 Pilih User</label>
                        <select name="user_id" id="user_id" required
                                class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" style="color: black">
                            <option value="" style="color: black">-- Pilih User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" style="color: black">
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Reward Type --}}
                    <div>
                        <label for="reward" class="block text-sm font-medium text-gray-300 mb-1">🎁 Reward Type</label>
                        <select name="reward" id="reward" required
                                class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" style="color: black">
                            <option value="" style="color: black">-- Pilih Reward --</option>
                            <option value="digital-coupon" style="color: black">🚗 Digital Coupon</option>
                            <option value="merchandise" style="color: black">☕ Merchandise</option>
                            <option value="exclusive-voucher" style="color: black">🎫 Exclusive Voucher</option>
                        </select>
                    </div>

                    {{-- Amount in Rupiah --}}
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-300 mb-1">💰 Amount (Rp)</label>
                        <input type="number" name="amount" id="amount" min="100000" step="100000" required
                               placeholder="Contoh: 200000"
                               class="w-full bg-gray-700 text-white border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 placeholder:text-gray-400" style="color: black">
                        <p class="text-xs text-gray-400 mt-1">* Setiap Rp100.000 = 1 Point</p>
                    </div>

                    {{-- Submit Button --}}
                    <div class="text-right">
                        <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 transition-all duration-200 text-white font-semibold px-6 py-2 rounded-lg shadow hover:shadow-md">
                            🚀 Convert to Points →
                        </button>
                    </div>
                </form>

                {{-- Tombol Riwayat Penukaran --}}
                <div class="pt-6 border-t border-gray-700 text-right">
                    <a href="{{ route('points.history') }}"
                       class="inline-block bg-gray-700 hover:bg-gray-600 text-sm text-white px-4 py-2 rounded-lg transition font-semibold shadow">
                        📄 Lihat Riwayat Penukaran
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-white">🎁 Tukarkan Poin dengan Hadiah</h2>
    </x-slot>

    <div class="p-6 text-white bg-[#0f172a] min-h-screen space-y-6">
        <div class="text-center">
            <h3 class="text-2xl">Total Poin Kamu</h3>
            <p class="text-4xl font-bold mt-1">{{ $points }}</p>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="bg-green-600 text-white p-4 rounded text-center">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="bg-red-600 text-white p-4 rounded text-center">{{ session('error') }}</div>
        @endif

        {{-- Contoh Hadiah --}}
        <div class="grid gap-6 md:grid-cols-2">
            <form action="{{ route('points.redeem-process') }}" method="POST" class="bg-gray-800 rounded-xl p-4 shadow space-y-3">
                @csrf
                <input type="hidden" name="reward" value="digital-coupon">
                <input type="hidden" name="point_cost" value="1">
                <h4 class="font-semibold text-lg">🚗 Kupon Reguler</h4>
                <p>1 poin = 1 kupon digital</p>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Tukar Sekarang</button>
            </form>

            <form action="{{ route('points.redeem-process') }}" method="POST" class="bg-gray-800 rounded-xl p-4 shadow space-y-3">
                @csrf
                <input type="hidden" name="reward" value="gold-coupon">
                <input type="hidden" name="point_cost" value="10">
                <h4 class="font-semibold text-lg">🏆 Kupon Grand Prize</h4>
                <p>10 poin = 1 kupon grand prize</p>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Tukar Sekarang</button>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-white">Redeem Exclusive Voucher</h2>
    </x-slot>

    <div class="p-6 bg-[#0f172a] min-h-screen text-white">

        <form action="{{ route('points.processRedeem') }}" method="POST" class="max-w-md mx-auto space-y-6">
            @csrf
            <input type="hidden" name="reward" value="exclusive-voucher" />
            <input type="hidden" name="point_cost" value="10" />

            <p>Biaya redeem: <strong>10 points</strong></p>

            <button type="submit"
                class="bg-yellow-600 hover:bg-yellow-700 px-6 py-2 rounded shadow font-semibold w-full transition">
                Redeem Exclusive Voucher 🎫
            </button>
        </form>

    </div>
</x-app-layout>

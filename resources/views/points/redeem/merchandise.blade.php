<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-white">Redeem Merchandise</h2>
    </x-slot>

    <div class="p-6 bg-[#0f172a] min-h-screen text-white">

        <form action="{{ route('points.processRedeem') }}" method="POST" class="max-w-md mx-auto space-y-6">
            @csrf
            <input type="hidden" name="reward" value="merchandise" />
            <input type="hidden" name="point_cost" value="5" />

            <p>Biaya redeem: <strong>5 points</strong></p>

            <button type="submit"
                class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded shadow font-semibold w-full transition">
                Redeem Merchandise ☕
            </button>
        </form>

    </div>
</x-app-layout>

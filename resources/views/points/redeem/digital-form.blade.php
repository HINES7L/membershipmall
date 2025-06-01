<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Form Redeem Digital Coupon</h2>
    </x-slot>

    <div class="p-6 bg-gray-800 rounded-lg max-w-md mx-auto mt-6">
        <form action="{{ route('points.redeem.digital-coupon.confirm') }}" method="POST">
            @csrf
            <input type="hidden" name="reward" value="digital-coupon" />
            <input type="hidden" name="point_cost" value="1" />

            <label class="block text-white mb-2" for="full_name">Nama Lengkap</label>
            <input type="text" name="full_name" id="full_name" required class="w-full mb-4 p-2 rounded" />

            <label class="block text-white mb-2" for="address">Alamat</label>
            <textarea name="address" id="address" required class="w-full mb-4 p-2 rounded"></textarea>

            <label class="block text-white mb-2" for="phone">No HP</label>
            <input type="text" name="phone" id="phone" required class="w-full mb-4 p-2 rounded" />

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Kirim Redeem
            </button>
        </form>
    </div>
</x-app-layout>

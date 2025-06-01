<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-white mb-8 text-center md:text-left">
            🎁 Pilih Hadiah untuk Ditukar dengan Poin
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-900 to-black p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        {{-- Hadiah 1: Digital Coupon --}}
        <div class="bg-gray-900 rounded-2xl shadow-md border border-gray-700 p-4 flex flex-col items-center text-center transition-transform transform hover:scale-105 duration-300 max-w-[280px] mx-auto">
            <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=400&q=80" alt="Digital Coupon" class="rounded-lg mb-4 shadow-md w-full h-40 object-cover" />
            <h3 class="text-white text-xl font-semibold mb-2">Digital Coupon</h3>
            <p class="text-gray-300 mb-4">Tebus hadiah ini hanya dengan <span class="font-bold text-gray-400">1 Point</span></p>
            <p class="text-gray-400 mb-4">Gunakan digital coupon ini untuk berbagai diskon dan promo menarik.</p>

            <form action="{{ route('points.processRedeem') }}" method="POST" class="w-full space-y-2">
                @csrf
                <input type="hidden" name="reward" value="digital-coupon" />
                <input type="hidden" name="point_cost" value="1" />
                <!-- <button type="submit"
                    class="w-full bg-gradient-to-r from-indigo-500 to-indigo-700 hover:from-indigo-600 hover:to-indigo-800 text-white font-bold rounded-2xl py-2 shadow transition">
                    Redeem Sekarang 🚗
                </button> -->
            </form>

            <a href="{{ route('points.redeem.digital-coupon.form') }}" 
   class="btn btn-primary">
   Redeem Sekarang 🚗
</a>



        </div>

        {{-- Hadiah 2: Merchandise --}}
        <div class="bg-gray-900 rounded-2xl shadow-md border border-yellow-600 p-4 flex flex-col items-center text-center transition-transform transform hover:scale-105 duration-300 max-w-[280px] mx-auto">
            <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=400&q=80" alt="Merchandise" class="rounded-lg mb-4 shadow-md w-full h-40 object-cover" />
            <h3 class="text-white text-xl font-semibold mb-2">Merchandise</h3>
            <p class="text-yellow-400 mb-3">Tebus hadiah ini hanya dengan <span class="font-bold text-yellow-300">5 Points</span></p>
            <p class="text-gray-400 mb-4">Dapatkan merchandise eksklusif seperti kaos, mug, dan lainnya.</p>

            <form action="{{ route('points.processRedeem') }}" method="POST" class="w-full space-y-2">
                @csrf
                <input type="hidden" name="reward" value="merchandise" />
                <input type="hidden" name="point_cost" value="5" />
                <!-- <button type="submit"
                    class="w-full bg-gradient-to-r from-yellow-500 to-yellow-700 hover:from-yellow-600 hover:to-yellow-800 text-white font-bold rounded-2xl py-2 shadow transition">
                    Redeem Sekarang ☕
                </button> -->
            </form>

            <a href="{{ route('points.redeem.digital-coupon.form') }}" 
   class="btn btn-primary">
   Redeem Sekarang ☕
</a>


        </div>

        {{-- Hadiah 3: Exclusive Voucher --}}
        <div class="bg-gray-900 rounded-2xl shadow-md border border-green-600 p-4 flex flex-col items-center text-center transition-transform transform hover:scale-105 duration-300 max-w-[280px] mx-auto">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Exclusive Voucher" class="rounded-lg mb-4 shadow-md w-full h-40 object-cover" />
            <h3 class="text-white text-xl font-semibold mb-2">Exclusive Voucher</h3>
            <p class="text-green-400 mb-3">Tebus hadiah ini hanya dengan <span class="font-bold text-green-300">10 Points</span></p>
            <p class="text-gray-400 mb-4">Voucher eksklusif untuk berbagai layanan dan produk premium.</p>

            <form action="{{ route('points.processRedeem') }}" method="POST" class="w-full space-y-2">
                @csrf
                <input type="hidden" name="reward" value="exclusive-voucher" />
                <input type="hidden" name="point_cost" value="10" />
                <!-- <button type="submit"
                    class="w-full bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 text-white font-bold rounded-2xl py-2 shadow transition">
                    Redeem Sekarang 🎫
                </button> -->
            </form>

            <a href="{{ route('points.redeem.digital-coupon.form') }}" 
   class="btn btn-primary">
   Redeem Sekarang 🎫
</a>


        </div>

        <!-- {{-- Hadiah 4: Gift Card --}}
        <div class="bg-gray-900 rounded-2xl shadow-md border border-pink-600 p-4 flex flex-col items-center text-center transition-transform transform hover:scale-105 duration-300 max-w-[280px] mx-auto">
            <img src="https://images.unsplash.com/photo-1606813908660-cc468d3ec273?auto=format&fit=crop&w=400&q=80" alt="Gift Card" class="rounded-lg mb-4 shadow-md w-full h-40 object-cover" />
            <h3 class="text-white text-xl font-semibold mb-2">Gift Card</h3>
            <p class="text-pink-400 mb-3">Tebus hadiah ini hanya dengan <span class="font-bold text-pink-300">7 Points</span></p>
            <p class="text-gray-400 mb-4">Dapatkan kartu hadiah yang bisa digunakan di berbagai toko favoritmu.</p>

            <form action="{{ route('points.processRedeem') }}" method="POST" class="w-full space-y-2">
                @csrf
                <input type="hidden" name="reward" value="gift-card" />
                <input type="hidden" name="point_cost" value="7" />
                <!-- <button type="submit"
                    class="w-full bg-gradient-to-r from-pink-500 to-pink-700 hover:from-pink-600 hover:to-pink-800 text-white font-bold rounded-2xl py-2 shadow transition">
                    Redeem Sekarang 🎁
                </button> -->
            </form>

            <!-- <a href="{{ route('points.redeem.digital-coupon.form') }}" 
   class="btn btn-primary">
   Redeem Sekarang 🎁
</a>  -->


        </div>

    </div>
</x-app-layout>

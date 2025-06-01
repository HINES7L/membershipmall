<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block mb-1 font-semibold">Nama</label>
                            <input type="text" name="name"
                                   class="w-full rounded border border-gray-400 bg-white text-black px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required style="color: black">
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold">Email</label>
                            <input type="email" name="email"
                                   class="w-full rounded border border-gray-400 bg-white text-black px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required style="color: black" >
                        </div>

                        <div>
                            <label class="block mb-1 font-semibold">Password</label>
                            <input type="password" name="password"
                                   class="w-full rounded border border-gray-400 bg-white text-black px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required style="color: black">
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded shadow font-semibold">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

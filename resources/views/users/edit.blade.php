<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-900 shadow-xl rounded-xl overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h2 class="text-xl font-semibold text-white">✏️ Edit Pengguna</h2>
            </div>

            <div class="px-6 py-6">
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-medium text-white mb-1">Nama</label>
                        <div class="relative">
                            <input type="text" name="name" id="name"
                                   value="{{ $user->name }}"
                                   class="block w-full rounded-lg bg-gray-800 border border-gray-700 text-white focus:border-blue-500 focus:ring-blue-500 text-sm px-4 py-2.5 transition"
                                   required>
                            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-1">Email</label>
                        <div class="relative">
                            <input type="email" name="email" id="email"
                                   value="{{ $user->email }}"
                                   class="block w-full rounded-lg bg-gray-800 border border-gray-700 text-white focus:border-blue-500 focus:ring-blue-500 text-sm px-4 py-2.5 transition"
                                   required>
                            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m8 0l-4-4m4 4l-4 4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('users.index') }}"
                           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md bg-gray-600 hover:bg-gray-700 text-white transition">
                            🔙 Batal
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700 text-white transition">
                            💾 Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

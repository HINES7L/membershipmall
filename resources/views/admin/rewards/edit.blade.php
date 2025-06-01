<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-white">✏️ Edit Reward</h2>
    </x-slot>

    <div class="py-8 px-4 bg-[#0f172a] min-h-screen text-white max-w-2xl mx-auto">
        <form action="{{ route('rewards.update', $reward->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-300">Nama Reward</label>
                <input type="text" name="title" value="{{ $reward->title }}" required
                       class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-2 mt-1">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300">Deskripsi</label>
                <textarea name="description" rows="3"
                          class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-2 mt-1">{{ $reward->description }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300">Biaya Poin</label>
                <input type="number" name="point_cost" value="{{ $reward->point_cost }}" min="1" required
                       class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-2 mt-1">
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded font-semibold">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
    <div class="flex justify-center gap-4">
        <img src="{{ asset('images/ds2.jpg') }}" alt="Gambar 1"
             class="w-[77px] rounded-lg shadow-md">
        <img src="{{ asset('images/ds1.jpg') }}" alt="Gambar 2"
             class="w-[77px] rounded-lg shadow-md">
    </div>
</div>


</x-app-layout>

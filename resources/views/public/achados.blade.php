<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Achados') }}
        </h2>
    </x-slot>
    @section('title','Achados')
    @include('partials.bannertop')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-2">
                    <p class="mb-4">Achou, miseravi!</p>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-3 gap-4">
                <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900">
                    <p class="mb-4">Achou, miseravi!</p>
                </div>
                <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900">
                    <p class="mb-4">Achou, miseravi!</p>
                </div>
                <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900">
                    <p class="mb-4">Achou, miseravi!</p>
                </div>
                <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900">
                    <p class="mb-4">Achou, miseravi!</p>
                </div>
                <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900">
                    <p class="mb-4">Achou, miseravi!</p>
                </div>
                <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900">
                    <p class="mb-4">Achou, miseravi!</p>
                </div>
            </div>

        </div>
        {{-- <div class="mt-4 grid grid-cols-3 gap-4"> --}}
            {{-- @foreach ($animais as $animal) --}}
                {{-- <div class="overflow-hidden border border-gray-200 shadow-lg sm:rounded-lg bg-white p-6 text-gray-900">
                    <p class="mb-4"></strong>!</p>
                </div> --}}
            {{-- @endforeach --}}
        {{-- </div> --}}
    </div>
</x-guest-layout>

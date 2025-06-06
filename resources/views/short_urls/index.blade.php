<!-- resources/views/short_urls/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Short URLs') }}
        </h2>
    </x-slot>

    <div class="py-6">
       @include('layouts.short-url')
    </div>
</x-app-layout>

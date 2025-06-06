<!-- resources/views/companies/invite-list.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invited Users for ') . ($company->name ?? 'N/A') }}
        </h2>
    </x-slot>

    <div class="py-6">
       @include('layouts.invite-list')
    </div>
</x-app-layout>

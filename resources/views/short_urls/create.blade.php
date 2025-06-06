<!-- resources/views/short_urls/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Short URL') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('short_urls.store') }}">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="original_url" :value="__('Original URL')" />
                        <x-text-input id="original_url" class="block mt-1 w-full" type="url" name="original_url" required autofocus />
                        <x-input-error :messages="$errors->get('original_url')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end">
                        <a href="{{ url()->previous() }}" class="mr-4 underline text-sm text-gray-600 hover:text-gray-900">Back</a>
                        <x-primary-button>
                            {{ __('Create Short URL') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

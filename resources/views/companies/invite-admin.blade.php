<!-- resources/views/companies/invite-admin.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invite Admin to ') . $company }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('companies.invite-admin.store', $company) }}">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    {{-- <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div> --}}
                    {{-- add condition role is not superamin --}}


                   @if (auth()->user()->hasRole('Admin'))
                    <div class="mb-4">
                        <x-input-label for="role" :value="__('Role')" />
                        <select id="role" name="role" class="block mt-1 w-full" required>
                            <option value="">Select Role</option>
                            @foreach($roles as $roleValue => $roleLabel)
                                <option value="{{ $roleValue }}" @selected(old('role') == $roleValue)>{{ $roleLabel }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>
                    @endif
                    <div class="flex items-center justify-end">
                        <a href="{{ route('companies.invite-list') }}" class="mr-4 underline text-sm text-gray-600 hover:text-gray-900">Back</a>
                        <x-primary-button>
                            {{ __('Invite User') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

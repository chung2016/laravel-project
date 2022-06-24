<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New Client') }}
            </h2>
            @can('view clients')
                <a href="{{ route('clients.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">
                    {{ __('Back to list') }}
                </a>
            @endcan
        </div>
    </x-slot>
    <div class="p-2">
        <div class="flex flex-col">
            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mb-1">
                    <x-label for="name" :value="__('Name')" />
                    <x-input name="name" :value="old('name')" id="name" />
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-1">
                    <x-label for="avatar" :value="__('Avatar')" />
                    <input type="file" name="avatar">
                    @error('avatar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-1">
                    <x-label for="email" :value="__('Email')" />
                    <x-input name="email" :value="old('email')" id="email" />
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-1">
                    <x-label for="phone" :value="__('Phone')" />
                    <x-input name="phone" :value="old('phone')" id="phone" />
                    @error('phone')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-1">
                    <x-label for="address" :value="__('Address')" />
                    <x-textarea name="address" id="address" :value="old('address')" />
                    @error('address')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-1">
                    <x-label for="company_name" :value="__('Company Name')" />
                    <x-input name="company_name" :value="old('company_name')" id="company_name" />
                    @error('company_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-1">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

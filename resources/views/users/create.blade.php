<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add New User') }}
            </h2>
            <a href="{{ route('users.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">
                {{ __('Back to list') }}
            </a>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="flex flex-col">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="flex flex-col mb-1">
                    <x-label for="name" :value="__('Name')" />
                    <x-input name="name" :value="old('name')" id="name" />
                    @error('name')
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
                    <x-label for="role" :value="__('Role')" />
                    <select name="role" id="role"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('role') border-red-500 @enderror">
                        <option value="">Select Role</option>
                        @foreach ($roles as $id => $name)
                            <option value="{{ $id }}" {{ old('role') == $id ? 'selected' : '' }}>
                                {{ $name }}</option>
                        @endforeach
                    </select>
                    @error('role')
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

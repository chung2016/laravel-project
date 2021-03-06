<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-success-message />
                    <form action="{{ route('profile.update') }}" method="POST" class="w-full">
                        @csrf
                        <div class="flex gap-5">
                            <div class="flex-1">
                                <div class="flex flex-col mb-1">
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input name="name" :value="auth()->user()->name" id="name" />
                                    @error('name')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-1">
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input name="email" :value="auth()->user()->email" id="email" disabled />
                                    @error('email')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col mb-1">
                                    <x-label for="password" :value="__('Password')" />
                                    <x-input name="password" type="password" id="password" />
                                    @error('password')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex flex-col mb-1">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-input name="password_confirmation" type="password" id="password_confirmation" />
                                    @error('password_confirmation')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-1">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

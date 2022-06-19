<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Client') . ' Name: ' . $client->name . ' | ' . __('Edit Project') }}
            </h2>
            <a href="{{ route('clients.projects.index', $client) }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">
                {{ __('Back to list') }}
            </a>
        </div>
    </x-slot>
    <div class="p-2">
        <div class="flex flex-col">
            <form action="{{ route('clients.projects.update', [$client, $project]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col mb-1">
                    <x-label for="name" :value="__('Name')" />
                    <x-input name="name" :value="$project->name" id="name" />
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-1">
                    <x-label for="description" :value="__('Description')" />
                    <x-textarea name="description" :value="$project->description" id="description" />
                    @error('description')
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

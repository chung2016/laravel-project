<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Clients') }}
            </h2>
            @if (request()->get('archive'))
                <a href="{{ route('clients.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">
                    {{ __('View Active Clients') }}
                </a>
            @else
                <a href="{{ route('clients.index', ['archive' => 1]) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">
                    {{ __('View Archive Clients') }}
                </a>
            @endif
            @can('create clients')
                <a href="{{ route('clients.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">Add New Client</a>
            @endcan
        </div>
    </x-slot>
    <div class="flex flex-col">
        <div class="overflow-hidden">
            <x-success-message />
            <table class="w-full text-center">
                <thead class="border-b bg-gray-800">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            #
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            {{ __('Name') }}
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            avatar
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Email
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Phone
                        </th>
                        {{-- <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Address
                        </th> --}}
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Company Name
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Projects
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Actions
                        </th>
                    </tr>
                </thead class="border-b">
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $client->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $client->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <img src="{{ $client->getFirstMediaUrl('avatar') }}" width="120px">
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $client->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $client->phone }}
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $client->address }}
                            </td> --}}
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $client->company_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $client->projects_count }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                @if (request()->get('archive'))
                                    <form action="{{ route('clients.restore', $client->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-1">
                                            {{ __('Restore') }}
                                        </button>
                                    </form>
                                    <form action="{{ route('clients.forceDelete', $client->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-1">
                                            {{ __('Force Delete') }}
                                        </button>
                                    </form>
                                @else
                                    @can('view projects')
                                        <a href="{{ route('clients.projects.index', $client) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">
                                            View Projects
                                        </a>
                                    @endcan
                                    @can('edit clients')
                                        <a href="{{ route('clients.edit', $client) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">
                                            Edit
                                        </a>
                                    @endcan
                                    @can('delete clients')
                                        <form action="{{ route('clients.destroy', $client) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-1">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

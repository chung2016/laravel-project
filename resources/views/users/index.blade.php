<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Users') }}
            </h2>
            @can('create users')
                <a href="{{ route('users.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">Add New User</a>
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
                            Email
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            {{ __('Role') }}
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Clients
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            {{ __('Created At') }}
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Actions
                        </th>
                    </tr>
                </thead class="border-b">
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $user->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $user->getRoleNames()->implode(', ') }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $user->clients_count }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $user->created_at->format('m/d/Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                @can('edit users')
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">Edit</a>
                                @endcan
                                @can('delete users')
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded m-1">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

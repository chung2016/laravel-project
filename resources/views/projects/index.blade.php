<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Client') . ' Name: ' . $client->name . ' | ' . __('All Projects') }}
            </h2>
            @can('create projects')
                <a href="{{ route('projects.create', ['client' => $client->id]) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-1">Add New Project</a>
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
                            {{ __('Description') }}
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            {{ __('Tasks') }}
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Actions
                        </th>
                    </tr>
                </thead class="border-b">
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $project->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $project->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $project->description }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                {{ $project->tasks_count }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                @can('edit projects')
                                    <a href="{{ route('clients.projects.edit', [$client, $project]) }}"
                                        class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">
                                        {{ __('Edit') }}
                                    </a>
                                @endcan
                                @can('delete projects')
                                    <form action="{{ route('clients.projects.destroy', [$client, $project]) }}"
                                        method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-1">
                                            {{ __('Delete') }}
                                        </button>
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

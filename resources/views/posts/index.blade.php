@extends('layouts.app')

@section('title', 'Posts')

@section('header', 'Manage Posts (Laravel 9 Livewire CRUD with Jetstream & Tailwind CSS - ItSolutionStuff.com)')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 inline-block">Create New Post</a>
                @if(Session::has('success'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                        </div>
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                        <div>
                            <p class="text-sm">{{ Session::get('error') }}</p>
                        </div>
                        </div>
                    </div>
                @endif
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Body</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="border px-4 py-2">{{ $post->id }}</td>
                                <td class="border px-4 py-2">{{ $post->title }}</td>
                                <td class="border px-4 py-2">{{ $post->body }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('posts.show', $post->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Show</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
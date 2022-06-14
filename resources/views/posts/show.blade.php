@extends('layouts.app')

@section('title', 'Posts - Show - ' . $post->id)

@section('content')
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="">
            <div class="mb-4">
                <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <div>{{ $post->title }}</div>
            </div>
            <div class="mb-4">
                <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                <div>{{ $post->body }}</div>
            </div>
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        </span>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
    </div>
@endsection
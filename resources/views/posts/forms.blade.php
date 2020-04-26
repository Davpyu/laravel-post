@extends('layouts.app')
@section('section')
@isset ($response)
<div class="w-full max-w-screen-lg mx-auto">
    <form action="{{ route('post.update', $response->id) }}" method="POST"
        class="bg-white shadow-lg rounded-md px-8 pt-6 pb-8 mb-4">
        @method('put')
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                Judul
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border border-red-300 border-solid @enderror"
                id="title" type="text" placeholder="title" name="title" value="{{ $response->title }}">
            @error('title')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                Content
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border border-red-300 border-solid @enderror"
                id="content" type="text" placeholder="content" name="content"
                rows="10">{{ $response->content }}</textarea>
            @error('content')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-center">
            <button
                class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Ubah Post
            </button>
        </div>
    </form>
</div>
@else
<div class="w-full max-w-screen-lg mx-auto">
    <form action="{{ route('post.store') }}" method="POST" class="bg-white shadow-lg rounded-md px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                Judul
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border border-red-300 border-solid @enderror"
                id="title" type="text" placeholder="title" name="title" value="{{ old('title') }}">
            @error('title')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                Content
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border border-red-300 border-solid @enderror"
                id="content" type="content" placeholder="content" name="content"
                rows="10">{{ old('content') }}</textarea>
            @error('content')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-center">
            <button
                class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Tambah Post
            </button>
        </div>
    </form>
</div>
@endisset
@endsection
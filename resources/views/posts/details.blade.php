@extends('layouts.app')
@section('section')
<div class="w-full flex flex-col">
    <h1 class="text-4xl text-gray-800 font-bold p-4">{{ $response->title }}</h1>
    <div class="w-full p-4">
        <span class="text-xs text-gray-800 font-semibold">Diposting pada {{ $response->created_at->toDateTimeString() }}
            oleh</span>
        <a href="{{ route('post.by.user', $response->user->id) }}" class="no-underline">
            <span class="text-xs text-gray-800 hover:text-teal-500 font-semibold">{{ $response->user->name }}</span>
        </a>
    </div>
    <div class="w-full p-4">
        <p class="text-base text-gray-800">
            {{ $response->content }}
        </p>
    </div>
    <div class="w-full h-1 bg-gray-300 mt-8"></div>
    <h4 class="text-2xl text-gray-800 p-4">Comments</h4>
    <form method="POST" action="{{ route('comment.store') }}" class="w-full max-w-3xl mx-auto">
        @csrf
        <div class="sm:flex sm:items-center mb-4">
            <label for="name" class="text-gray-800 text-sm font-semibold pl-4 sm:pr-4">Name</label>
            <input
                class="transition-colors duration-100 ease-in-out border border-transparent shadow-md text-teal-500 placeholder-gray-800 rounded-lg bg-white p-4 block w-full appearance-none leading-normal focus:outline-none focus:border-teal-400 focus:text-gray-900 focus:placeholder-gray-800 focus:shadow-none @error('name') border border-red-300 border-solid @enderror"
                id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}">
        </div>
        @error('name')
        <p class="text-red-500 text-xs italic p-4">{{ $message }}</p>
        @enderror
        <div class="sm:flex sm:items-center mb-4">
            <label for="email" class="text-gray-800 text-sm font-semibold pl-4 sm:pr-4">Email</label>
            <input
                class="transition-colors duration-100 ease-in-out border border-transparent shadow-md text-teal-500 placeholder-gray-800 rounded-lg bg-white p-4 block w-full appearance-none leading-normal focus:outline-none focus:border-teal-400 focus:text-gray-900 focus:placeholder-gray-800 focus:shadow-none @error('email') border border-red-300 border-solid @enderror"
                id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
        </div>
        @error('email')
        <p class="text-red-500 text-xs italic p-4">{{ $message }}</p>
        @enderror
        <div class="sm:flex sm:items-center mb-4">
            <label for="website" class="text-gray-800 text-sm font-semibold pl-4 sm:pr-4">Website</label>
            <input
                class="transition-colors duration-100 ease-in-out border border-transparent shadow-md text-teal-500 placeholder-gray-800 rounded-lg bg-white p-4 block w-full appearance-none leading-normal focus:outline-none focus:border-teal-400 focus:text-gray-900 focus:placeholder-gray-800 focus:shadow-none @error('website') border border-red-300 border-solid @enderror"
                id="website" type="text" placeholder="Website" name="website"
                value="{{ old('website') ?? 'http://'  }}">
        </div>
        @error('website')
        <p class="text-red-500 text-xs italic p-4">{{ $message }}</p>
        @enderror
        <div class="sm:flex sm:items-center mb-4">
            <label for="comment" class="text-gray-800 text-sm font-semibold pl-4 sm:pr-4">Comment</label>
            <textarea
                class="transition-colors duration-100 ease-in-out border border-transparent shadow-md text-teal-500 placeholder-gray-800 rounded-lg bg-white p-4 block w-full appearance-none leading-normal focus:outline-none focus:border-teal-400 focus:text-gray-900 focus:placeholder-gray-800 focus:shadow-none @error('name') border border-red-300 border-solid @enderror"
                id="comment" type="text" placeholder="Comment" name="comment" rows="4"
                required>{{ old('comment') }}</textarea>
        </div>
        @error('comment')
        <p class="text-red-500 text-xs italic p-4">{{ $message }}</p>
        @enderror
        <input type="hidden" name="post_id" value="{{ $response->id }}">
        <div class="flex justify-end">
            <button type="submit" class="p-3 bg-teal-500 hover:bg-teal-600 text-white rounded-lg">
                Submit
            </button>
        </div>
    </form>
    <div class="w-full max-w-3xl mx-auto">
        <h2 class="text-lg text-gray-800 p-4">Comment ({{ count($response->comment) }})</h2>
        @include('layouts._flash')
        @if (!empty($response->comment))
        @foreach ($response->comment as $res)
        <div class="shadow-md mt-4 bg-white p-5 rounded-md">
            <div class="flex flex-col justify-center">
                <span class="text-base text-teal-500 hover:text-teal-700">{{ $res->name }}
                    {!! (!empty($res->website)) ? "| <a href='{$res->website}'>{$res->website}</a>" : '' !!}</span>
                <span class="text-xs">{{ $res->created_at->diffForHumans() }}</span>
                <p class="text-sm">{{ $res->comment }}</p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
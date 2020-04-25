@extends('layouts.app')

@section('section')
<div class="w-full">
    @if (Session::has('success'))
    <p class="text-white text-sm italic w-full bg-green-500">{{ Session::get('success') }}</p>
    @endif
    <h2 class="text-3xl text-gray-700">All post by {{ $response->name }}</h2>
    @forelse ($response->post as $res)
    <article class="shadow-md mt-4 bg-white p-5 rounded-md">
        @if ($response->name === Auth::user()->name)
        <a href="{{ route('post.edit', $res->id) }}" class="no-underline">
            <span class="max-w-sm bg-yellow-400 rounded p-2 text-xs text-white hover:bg-yellow-500">Ubah Post</span>
        </a>
        <form action="{{ route('post.destroy', $res->id) }}" method="POST" class="inline-flex">
            @method('delete')
            @csrf
            <button class="flex justify-end max-w-sm bg-red-400 rounded p-2 text-xs text-white hover:bg-red-500"
                type="submit">
                Hapus Post
            </button>
        </form>
        @endif
        <div class="flex flex-col justify-center">
            <h1 class="text-3xl"><a href="{{ route('post.show', $res->slug) }}"
                    class="no-underline text-teal-500 hover:text-teal-700">{{ $res->title }}</a></h1>
            <br>
            <span class="text-xs inline">Diposting pada {{ $res->created_at->diffForHumans() }} oleh <a
                    href="{{ route('post.by.user', $res->user->id) }}" class="no-underline hover:text-teal-200 text-xs">
                    {{ $res->user->name }}</a></span>
            <p class="text-sm">{!! $res->overview !!}</p>
        </div>
    </article>
    @empty
    <h2 class="text-base">Not Found</h2>
    @endforelse
</div>
@endsection
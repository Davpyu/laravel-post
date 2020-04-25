@extends('layouts.app')
@section('section')
<div class="w-full">
    @forelse ($response as $res)
    <article class="shadow-md mt-4 bg-white p-5 rounded-md">
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
    {{ $response->links('layouts._pagination') }}
</div>
@endsection
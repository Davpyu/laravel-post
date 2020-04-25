@extends('layouts.app')

@section('section')
<h2 class="text-xl">Berhasil menemukan {{ count($search) }} pencarian</h2>
@forelse ($search as $s)
<article class="shadow-md mt-4 bg-white p-5 rounded-md">
    <div class="flex flex-col justify-center">
        <h1 class="text-3xl"><a href="{{ route('post.show', $s->slug) }}"
                class="no-underline text-teal-500 hover:text-teal-700">{{ $s->title }}</a></h1>

        <br>
        <span class="text-xs inline">Diposting pada {{ $s->created_at->diffForHumans() }} oleh <a
                href="{{ route('post.by.user', $s->user->id) }}" class="no-underline hover:text-teal-200 text-xs">
                {{ $s->user->name }}</a></span>
        <p class="text-sm">{!! $s->overview !!}</p>
    </div>
</article>
@empty
<h2 class="text-base">Not Found</h2>
@endforelse
@endsection
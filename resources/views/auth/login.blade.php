@extends('layouts.app')

@section('section')
<div class="w-full max-w-xs mx-auto">
    <form action="{{ route('auth.login') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @if (Session::has('errorsLogin'))
        <p class="text-red-500 text-sm italic">{{ Session::get('errorsLogin') }}</p>
        @endif
        @if (Session::has('success'))
        <p class="text-green-500 text-sm italic">{{ Session::get('success') }}</p>
        @endif
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border border-red-300 border-solid @enderror"
                id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password') border border-red-300 border-solid @enderror"
                id="password" type="password" placeholder="********" name="password" value="{{ old('password') }}"
                required>
            @error('password')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Sign In
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-teal-500 hover:text-teal-800" href="#">
                Forgot Password?
            </a>
        </div>
    </form>
</div>
@endsection

@section('script')
<script src="/js/login.js"></script>
@endsection
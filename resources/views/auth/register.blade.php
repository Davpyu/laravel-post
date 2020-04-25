@extends('layouts.app')

@section('section')
<div class="w-full max-w-sm mx-auto">
    <form action="{{ route('auth.register') }}" method="POST" class="bg-white shadow-lg rounded-md px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Nama
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border border-red-300 border-solid @enderror"
                id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}">
            @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border border-red-300 border-solid @enderror"
                id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
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
                id="password" type="password" placeholder="********" name="password">
            @error('password')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password-confirmation">
                Password Confirmation
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password-confirmation') border border-red-300 border-solid @enderror"
                id="password-confirmation" type="password" placeholder="********" name="password_confirmation">
            @error('password-confirmation')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-center">
            <button
                class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Register
            </button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script src="/js/register.js"></script>
@endsection
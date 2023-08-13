@extends('layouts.header_footer')

@section('theme')

<x-guest-layout >
    <x-authentication-card>
    <center style="background-color: #70c725; color: #ffff; padding: 10px;">
    <div class="text-xl font-semibold">Login</div>
</center>
<br><br>
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
    </div>

    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
    </div>

    <div class="mb-4 flex items-center">

    <input id="remember_me" name="remember" type="checkbox" class="ml-2 text-indigo-600 rounded focus:ring focus:ring-indigo-300" style="color:#70c745;" />
        <label for="remember_me" style="padding-top:10px;" class="ml-1 text-sm text-gray-600">{{ __('Remember me') }} </label>
    
        <a class="text-sm text-gray-600 hover:text-gray-900" style="margin-left:auto;" href="{{ route('password.request') }}">
            {{ __('Lost?') }}
        </a>
</div>

    <div class="flex items-center justify-between">
        <button type="submit"  style="margin-left: 326px; background-color:#70c745;" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded focus:outline-none focus:ring focus:ring-indigo-300" style="margin-left:auto;">
            {{ __('Login') }}
        </button>

        <a class="text-sm text-gray-600 hover:text-gray-900"  style="position:absolute;" href="{{ route('register') }}">
            {{ __('Dont have account?') }} <strong>Signup</strong>
        </a>
    </div>
</form>

    </x-authentication-card>
</x-guest-layout>
@endsection
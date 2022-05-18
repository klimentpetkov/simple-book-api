@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">

        <h1 class="text-white text-3xl mb-1">{{ __('messages.app_name') }}</h1>

        <h1 class="text-white text-3xl pt-8">{{ __('messages.login.welcomeBack') }}</h1>
        <h2 class="text-blue-300">{{ __('messages.login.enterCredentials') }}</h2>

        <form method="POST" action="{{ route('login') }}" class="pt-8">
            @csrf

            <div class="relative">
                <label
                    for="email"
                    class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2"
                >{{ __('messages.login.email') }}</label>

                <div>
                    <input
                        id="email"
                        type="email"
                        class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        autofocus
                        placeholder="your@email.com">

                    @error('email')
                    <span class="text-red-600 text-sm pt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label
                    for="password"
                    class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2"
                >{{ __('messages.login.password') }}</label>

                <div class="col-md-6">
                    <input
                        id="password"
                        type="password"
                        class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                        name="password"
                        autocomplete="current-password"
                        placeholder="{{ __('messages.login.password') }}">

                    @error('password')
                    <span class="text-red-600 text-sm pt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="pt-2">
                <input
                    class=""
                    type="checkbox"
                    name="remember"
                    id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="text-white" for="remember">{{ __('messages.login.rememberMe') }}</label>
            </div>

            <div class="pt-8">
                <button
                    type="submit"
                    class="w-full bg-gray-400 py-2 px-3 text-left uppercase rounded text-blue-800 font-bold"
                >{{ __('messages.login.login') }}</button>
            </div>

            <div class="flex justify-between pt-8 text-white text-sm font-bold">
                <a class="hover:text-blue-200" href="{{ route('password.request') }}">
                    {{ __('messages.login.forgotYourPassword') }}
                </a>
                <a class="hover:text-blue-200" href="{{ route('register') }}">
                    {{ __('messages.register.register') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

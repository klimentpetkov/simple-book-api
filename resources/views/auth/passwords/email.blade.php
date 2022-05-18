@extends('layouts.app')

@section('content')
    <div class="bg-gray-300 mx-auto h-full flex justify-center items-center">
        <div class="w-96 p-6 rounded-lg bg-blue-900 shadow-xl">

            <h1 class="text-white text-3xl mb-1">{{ __('messages.app_name') }}</h1>

            <h1 class="text-white text-3xl pt-8">{{ __('messages.email.ohNo') }}</h1>
            <h2 class="text-base text-blue-300">{{ __('messages.email.enterEmailToResetPassword') }}</h2>

            <form method="POST" action="{{ route('password.email') }}" class="pt-8">
                @csrf

                <div class="relative">
                    <label
                        for="email"
                        class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase"
                    >{{ __('messages.email.email') }}</label>

                    <input
                        id="email"
                        type="email"
                        class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-blue-700 bg-blue-800 text-gray-100 @error('email') border border-red-600 @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                        placeholder="your@email.com">

                    @error('email')
                    <span class="text-red-600 text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="pt-6">
                    <button
                        type="submit"
                        class="w-full rounded py-2 px-3 uppercase text-left bg-gray-400 text-blue-800 text-gray-100 font-bold"
                    >{{  __('messages.email.sendResetEmail') }}</button>
                </div>

                <div class="pt-8 flex justify-between text-white text-sm font-bold">
                    <a
                        class="hover:text-blue-200"
                        href="{{ route('login') }}"
                    >{{ __('messages.login.login') }}</a>
                    <a
                        class="hover:text-blue-200"
                        href="{{ route('register') }}"
                    >{{ __('messages.register.register') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection

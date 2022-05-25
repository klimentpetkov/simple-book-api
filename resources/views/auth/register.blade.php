@extends('layouts.app')

@section('content')
    <div class="bg-gray-300 mx-auto h-full flex justify-center items-center">
        <div class="w-96 p-6 rounded-lg bg-blue-900 shadow-xl">
            <h1 class="text-white text-3xl mb-1">{{ __('messages.app_name') }}</h1>

            <h1 class="text-white text-3xl pt-8">{{ __('messages.register.signUp') }}</h1>
            <h2 class="text-base text-blue-300">{{ __('messages.register.enterInfo') }}</h2>

            <form method="POST" action="{{ route('register') }}" class="pt-8">
                @csrf

                <div class="relative">
                    <label
                        for="name"
                        class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase"
                    >{{ __('messages.register.fullName') }}</label>

                    <input
                        id="name"
                        type="text"
                        class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-blue-700 bg-blue-800 text-gray-100 @error('name') border border-red-600 @enderror"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autocomplete="name"
                        autofocus
                        placeholder="{{ __('messages.register.yourName') }}">

                    @error('name')
                    <span class="text-red-600 text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="relative pt-3">
                    <label
                        for="email"
                        class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase"
                    >{{ __('messages.register.email') }}</label>

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

                <div class="relative pt-3">
                    <label class="text-white" for="role">{{ __('messages.register.role.role') }}</label>
                    <select class="
                        form-select
                        appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700
                        focus:bg-white
                        focus:border-blue-600
                        focus:outline-none"
                        name="role"
                        aria-label="User role">
                            <option {{ old('role') == 0 ? 'selected' : '' }} value="0">{{ __('messages.register.role.reader') }}</option>
                            <option {{ old('role') == 1 ? 'selected' : '' }} value="1">{{ __('messages.register.role.author') }}</option>
                        </select>
                </div>

                <div class="relative pt-3">
                    <input
                        type="checkbox"
                        name="receive_notifications"
                        id="receive_notifications"
                        value='1'
                        {{ old('receive_notifications') ? 'checked' : '' }}>

                    <label class="text-white" for="receive_notifications">{{ __('messages.register.receiveNotifications') }}</label>
                </div>

                <div class="relative pt-3">
                    <label
                        for="password"
                        class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase"
                    >{{ __('messages.register.password') }}</label>

                    <input
                        id="password"
                        type="password"
                        class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-blue-700 bg-blue-800 text-gray-100 @error('password') border border-red-600 @enderror"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="{{ __('messages.register.password') }}">

                    @error('password')
                    <span class="text-red-600 text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="relative pt-3">
                    <label
                        for="password-confirm"
                        class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase"
                    >{{ __('messages.register.reEnterPassword') }}</label>

                    <input
                        id="password-confirm"
                        type="password"
                        class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-blue-700 bg-blue-800 text-gray-100"
                        name="password_confirmation"
                        required
                        placeholder="{{ __('messages.register.confirm') }}">
                </div>

                <div class="pt-6">
                    <button
                        type="submit"
                        class="w-full rounded py-2 px-3 uppercase text-left bg-gray-400 text-blue-800 text-gray-100 font-bold"
                    >{{ __('messages.register.register') }}</button>
                </div>

                <div class="pt-8 flex justify-between text-white text-sm font-bold">
                    <a
                        class="hover:text-blue-200"
                        href="{{ route('password.request') }}"
                        >{{ __('Forgot Your Password?') }}</a>
                    <a
                        class="hover:text-blue-200"
                        href="{{ route('login') }}"
                    >{{ __('messages.login.login') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.verify.verifyEmailAddress') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('messages.verify.verificationLink') }}
                            </div>
                        @endif

                        {{ __('messages.verify.checkForVerificationLink') }}
                        {{ __('messages.verify.ifEmailNotReceived') }}, <a href="{{ route('verification.resend') }}">{{ __('messages.verify.clickForAnother') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

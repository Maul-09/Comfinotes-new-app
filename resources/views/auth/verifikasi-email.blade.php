<x-auth-layout>
    <x-slot:title>Verif Page - Comfinote's</x-slot:title>

    <div class="container-verif">
        <div class="head-logo">
            <img src="{{ asset('assets/image/logo-2.png') }}" alt="Logo">
        </div>
        <div class="form-section">
            <div class="form-manage">
                <div class="form-image">
                    <img src="{{ asset('assets/image/icon-1.png') }}" alt="icon-verif" class="icon-1">
                </div>
                <div class="form-title">
                    <h1>Verify your Email</h1>
                    <p>Thank you, check your email for instructions to reset your password</p>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="label-button-verif">
                    <a href="{{ route('Authentikasi') }}" class="btn-continue">Back to Sign In</a>
                    <p class="verifikasi">
                        Don’t receive an email?
                        <form method="POST" action="{{ route('verification.send') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-blue-500 hover:underline">Resend</button>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>

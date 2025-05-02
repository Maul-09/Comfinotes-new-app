<x-auth-layout>
    <x-slot:title>Forgot Page - Comfinote's</x-slot:title>

    <div class="head-logo">
        <img src="{{ asset('assets/image/logo-2.png') }}" alt="Logo">
    </div>

    <div class="form-section">
        <div class="form-manage">
            <div class="form-title">
                <h1>Reset your password</h1>
                <p>Enter the email address associated with your account and we will send you a link to reset your password</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="label-form">
                    <div class="input-container-forgot">
                        <iconify-icon icon="material-symbols-light:mail-outline-rounded"></iconify-icon>
                        <input type="email" name="email" placeholder="Masukkan Email" id="email" value="{{ old('email') }}" required>
                    </div>

                    <!-- Error Message -->
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="label-button-forgot">
                    <button type="submit" class="btn-continue">Continue</button>
                    <a href="{{ route('Authentikasi') }}" class="verifikasi">Back to Sign In</a>
                </div>
            </form>
        </div>
    </div>
</x-auth-layout>

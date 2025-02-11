<x-auth-layout>
    <x-slot:title>Forgot Page - Comfinote's</x-slot:title>
        <div class="head-logo">
            <img src="assets/image/logo-2.png" alt="">
        </div>
        <div class="form-section">
            <div class="form-manage">
                <div class="form-title">
                    <h1>Reset your password</h1>
                    <p>Enter the email address associated with your account and we will send you a link to reset your password</p>
                </div>
                <form action="">
                    <div class="label-form">
                        <div class="input-container-forgot">
                            <iconify-icon icon="material-symbols-light:mail-outline-rounded"></iconify-icon>
                            <input type="email" name="email" placeholder="Masukkan Email" id="email" required>
                        </div>
                    </div>
                    <div class="label-button-forgot">
                        <button type="submit" class="btn-continue">Continue</button>
                        <a href="{{ route('Authentikasi') }}" class="verifikasi">back to Sign In</a>
                    </div>
                </form>
            </div>
        </div>
</x-auth-layout>

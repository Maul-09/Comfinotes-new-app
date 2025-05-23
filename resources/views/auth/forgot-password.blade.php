<x-auth-layout>
    <x-slot:title>Forgot Page - Comfinote's</x-slot:title>
    <div class="container-forgot">
        <div class="head-logo-forgot">
            <img src="assets/image/logo-2.png" alt="">
        </div>
        <div class="form-section-forgot">
            <div class="form-manage-forgot">
                <div class="form-title-forgot">
                    <h1>Reset your password</h1>
                    <p>Masukkan alamat email yang terkait dengan akun Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
                </div>
                <form action="">
                    <div class="label-form-forgot">
                        <div class="input-container-forgot">
                            <iconify-icon icon="material-symbols-light:mail-outline-rounded"></iconify-icon>
                            <input type="email" name="email" placeholder="Masukkan Email" id="email" required>
                        </div>
                    </div>
                    <div class="label-button-forgot">
                        <button type="submit" class="btn-continue">Submit</button>
                        <a href="{{ route('login') }}" class="verifikasi">Kembali ke Signin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>

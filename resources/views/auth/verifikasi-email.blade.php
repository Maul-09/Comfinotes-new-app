<x-auth-layout>
    <x-slot:title>Verif Page - Comfinote's</x-slot:title>

    <div class="container-verif">
        <div class="head-logo-verif">
            <img src="{{ asset('assets/image/logo-2.png') }}" alt="Logo">
        </div>
        <div class="form-section-verif">
            <div class="form-manage-verif">
                <div class="form-image-verif">
                    <img src="{{ asset('assets/image/icon-1.png') }}" alt="icon-verif" class="icon-1">
                </div>
                <div class="form-title-verif">
                    <h1>Verifikasi Email Anda</h1>
                    <p>Terima kasih, periksa email Anda untuk mendapatkan petunjuk mengatur ulang kata sandi Anda</p>
                </div>

                <div class="label-button-verif">
                    <a href="{{ route('login') }}" class="btn-continue">Back to Sign In</a>
                    <div class="verifikasi">
                        <span>Don’t receive an email?</span>
                        <form method="POST" action="#" class="inline">
                            @csrf
                            <button type="submit" class="button-resend">Resend</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>

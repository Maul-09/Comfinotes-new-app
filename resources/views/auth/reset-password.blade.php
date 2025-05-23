{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-auth-layout>
    <x-slot:title>Reset Page - Comfinote's</x-slot:title>
    <div class="container-reset">
        <div class="head-logo-reset">
            <img src="assets/image/logo-2.png" alt="">
        </div>
        <div class="form-section-reset">
            <div class="form-manage-reset">
                <div class="form-title-reset">
                    <h1>Atur ulang kata sandi</h1>
                    <p>Kata sandi harus terdiri dari minimal 8 karakter.</p>
                </div>
                <form action="">
                    <div class="label-form-reset">
                        <div class="input-container-reset">
                            <input type="password" name="password" placeholder="Masukan Kata Sandi Baru" required>
                            <iconify-icon icon="proicons:eye-off" class="toggle-password" id="toggle-password"></iconify-icon>
                        </div>
                    </div>
                    <div class="label-form-reset">
                        <div class="input-container-reset">
                            <input type="password" name="confirm-password" placeholder="Konfirmasi Kata Sandi Baru" required>
                            <iconify-icon icon="proicons:eye-off" class="toggle-password" id="toggle-password"></iconify-icon>
                        </div>
                    </div>
                    <div class="label-button-reset">
                        <button type="submit" class="btn-continue">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>


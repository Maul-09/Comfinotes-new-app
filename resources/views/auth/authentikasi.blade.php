<x-auth-layout>
    <x-slot:title>Login Page - Comfinote's</x-slot:title>
    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            showAlert("{{ session('success') }}", "success", 3000);
        });
    </script>
    @endif

    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            showAlert("{{ $errors->first() }}", "error", 3000);
        });
    </script>
    @endif

    <div class="container">
        <div class="head-content">
            <div class="head-title">
                <img src="{{ asset('assets/image/logo-3.png') }}" alt="Logo">
            </div>
            <div class="content-circle">
                <div class="cirle-1">
                    <div class="circle-2">
                        <img src="{{ asset('assets/image/submissions.png') }}" alt="image-1" class="logo-1">
                        <img src="{{ asset('assets/image/revenue.png') }}" alt="image-2" class="logo-2">
                        <img src="{{ asset('assets/image/expense.png') }}" alt="image-3" class="logo-3">
                        <img src="{{ asset('assets/image/income.png') }}" alt="image-4" class="logo-4">
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="form-login">
                <div class="form-title">
                    <h1>Masuk ke Akun Anda</h1>
                    <p>Selamat datang kembali! silakan masukkan detail Anda</p>
                </div>
                <form id="login-form" action="{{ route('auth.login') }}" method="POST" class="form-content">
                    @csrf
                    <div class="label-form">
                        <div class="input-container-login">
                            <iconify-icon icon="solar:user-linear"></iconify-icon>
                            <input type="email" name="email" placeholder="Input Username/Email" id="username" required>
                        </div>
                    </div>
                    <div class="label-form">
                        <div class="input-container-login">
                            <iconify-icon icon="tabler:lock"></iconify-icon>
                            <input type="password" name="password" placeholder="Input Password" id="password" required>
                            <iconify-icon icon="proicons:eye-off" class="toggle-password" id="toggle-password"></iconify-icon>
                        </div>
                    </div>

                    <div class="form-link">
                        <label class="label">Remember Me
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <a href="{{ route('forgot-password') }}" class="forgot">Forgot Password</a>
                    </div>
                    <button type="submit" class="btn-submit">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>

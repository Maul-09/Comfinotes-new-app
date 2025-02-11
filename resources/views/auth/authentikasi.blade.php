<x-auth-layout>
    <x-slot:title>Login Page - Comfinote's</x-slot:title>
    <div class="container">
        <div class="head-content">
            <div class="head-title">
                <img src="{{ asset('assets/image/logo-3.png') }}" alt="Logo">
            </div>
            <div class="content-circle">
                <div class="cirle-1">
                    <div class="circle-2">
                        <img src="{{ asset('assets/image/Total-Submissions.png') }}" alt="image-1" class="logo-1">
                        <img src="{{ asset('assets/image/Total-Revenue.png') }}" alt="image-2" class="logo-2">
                        <img src="{{ asset('assets/image/Expenses.png') }}" alt="image-3" class="logo-3">
                        <img src="{{ asset('assets/image/Member.png') }}" alt="image-4" class="logo-4">
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="form-login">
                <div class="form-title">
                    <h1>Sign In to your Account</h1>
                    <p>Welcome back! please enter your detail</p>
                </div>
                <form action="" method="POST" class="form-content">
                    <div class="label-form">
                        <div class="input-container-login">
                            <iconify-icon icon="solar:user-linear"></iconify-icon>
                            <input type="text" name="username" placeholder="Input Username" id="username" required>
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

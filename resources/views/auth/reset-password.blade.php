<x-auth-layout>
    <div class="container-reset">
        <div class="head-logo">
            <img src="assets/image/logo-2.png" alt="">
        </div>
        <div class="form-section">
            <div class="form-manage">
                <div class="form-title">
                    <h1>Reset your password</h1>
                    <p>Password must be at least 8 characters long.</p>
                </div>
                <form action="">
                    <div class="label-form">
                        <div class="input-container-reset">
                            <input type="password" name="password" placeholder="Input New Passowrd" required>
                            <iconify-icon icon="proicons:eye-off"></iconify-icon>
                        </div>
                    </div>
                    <div class="label-form">
                        <div class="input-container-reset">
                            <input type="password" name="confirm-password" placeholder="Comfirm Password" required>
                            <iconify-icon icon="proicons:eye-off"></iconify-icon>
                        </div>
                    </div>
                    <div class="label-button-reset">
                        <button type="submit" class="btn-continue">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>

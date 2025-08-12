<x-bendahara-layout>
<x-slot:title>Profile Bendahara - Comfinotes</x-slot:title>
<x-slot:PageTitle>Detail Catatan</x-slot:PageTitle>
<x-slot:PageSubtitle>Grup catatan informasi detail</x-slot:SubTitle>

<x-slot:title>Halaman Profile - Comfinotes</x-slot:title>
<x-slot:PageTitle>Profile Admin</x-slot:PageTitle>
<x-slot:PageSubtitle>Informasi terperinci tentang keuangan komunitas Anda</x-slot:PageSubtitle>

@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        showAlert(@json(session('success')), "success", 4000);
    });
</script>
@endif

@if (session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        showAlert(@json(session('error')), "error", 4000);
    });
</script>
@endif

<div class="main-content">
<div class="profile-header">
    <div class="profile-left">
        <div class="profile-content-1">
            <div class="header-1">
                <h2>Gambar Profile</h2>
            </div>
            <hr>
            <div class="content-1">
                @if ($profileBendahara->image)
                <img src="{{ asset('uploads/' . $profileBendahara->image) }}" alt="" class="profile-image">
                @else
                <img src="{{ asset('assets/image/profile-1.jpg') }}" alt="" class="profile-image">
                @endif
                <div class="profile-nickname">
                    <h2>{{ $profileBendahara->username }}</h2>
                    <span>{{ $profileBendahara->role }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-right">
        <div class="profile-content-2">
            <div class="header-2">
                <h2>Edit Profile</h2>
            </div>
            <div class="content-2">
                <form action="{{ route('bendahara.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="profile-input">
                        <h2 class="profile-text">Upload Gambar<span>*</span></h2>
                        <div class="profile-image-wrapper">
                            <input type="file" id="profile-image" name="image_profile" hidden>
                            <label class="profile-image" for="profile-image">
                                <img src="#" alt="" id="profile-preview">
                                <iconify-icon icon="icon-park-outline:upload-one" class="icon-upload"></iconify-icon>
                            </label>
                        </div>
                        <div class="profile-actions">
                            <label for="profile-image" class="action-button upload">
                                <iconify-icon icon="tabler:upload"></iconify-icon>
                            </label>
                            <button type="button" class="action-button delete" id="delete-image">
                                <iconify-icon icon="tabler:trash-filled"></iconify-icon>
                            </button>
                        </div>
                        @error('image_profile')
                            <p class="pesan-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-profile-add">
                        <label for="email-user">Username<strong>*</strong></label>
                        <input type="text" name="username" id="username" value="{{ $profileBendahara->username }}">
                        @error('username')
                            <p class="pesan-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-profile-add">
                        <label for="password-user">Password<strong>*</strong></label>
                        <input type="password" name="password" id="password-user" placeholder="Masukan Password baru">
                        @error('password')
                            <p class="pesan-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="button-upload">
                        <button type="submit" class="button-save">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</x-bendahara-layout>

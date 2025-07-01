<x-admin-layout>
    <x-slot:title>Admin Dashboard - Comfinote's</x-slot:title>
    <x-slot:PageTitle>Dashboard</x-slot:PageTitle>
    <x-slot:PageSubtitle>Informasi terperinci tentang keuangan komunitas Anda</x-slot:PageSubtitle>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            showAlert("{{ session('success') }}", "success", 4000);
            });
        </script>
    @endif

    @php
        $addAcountErrors = $errors->hasAny(['acount_username', 'acount_email', 'acount_password']);
        $addUserErrors = $errors->hasAny(['user_username', 'user_email', 'user_password', 'divisi_id']);
    @endphp

    @if ($addAcountErrors)
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("addAcount")?.classList.add("active");
            });
        </script>
    @endif

    @if ($addUserErrors)
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("addUser")?.classList.add("active");
            });
        </script>
    @endif


    <div class="main-content">
        <div class="card-content">
            <div class="card-acount">
                <div class="head-card">
                    <div class="head-title">
                        <h2>Semua Grup</h2>
                        <p>Lihat daftar semua grup</p>
                    </div>
                    <div class="head-button">
                        <button class="add-acount" id="addUserButton">
                            grup baru <iconify-icon icon="ic:outline-plus" class="icon-card-5"></span>
                        </button>
                    </div>
                </div>
                <div class="main-card">
                    @foreach ($departemens as $index => $divisi )
                        <div class="card">
                            <div class="card-image-head">
                                @if ($divisi->image_divisi)
                                    <img src="{{ asset('uploads/' . $divisi->image_divisi) }}" alt="" class="card-image">
                                @else
                                    <img src="{{ asset('assets/image/Profile _ Group_3.png') }}" alt="Default Image" class="card-image">
                                @endif
                            </div>
                            <div class="card-text">
                                <p class="label-card">Dibuat: {{ \Carbon\Carbon::parse($divisi->created_at)->translatedFormat('d F Y') }}</p>
                                <h3>{{ $divisi->name_divisi }}</h3>
                                <h4>IDR 4.500.000</h4>
                            </div>
                            <div class="card-button">
                                <a href="{{ route('detail-user', $divisi->key_id) }} " class="btn-detail">Lihat Group</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="table-acount">
            <div class="header-acount">
                <div class="head-acount">
                    <div class="head-title">
                        <h2>Daftar Akun Admin</h2>
                        <p>Lihat daftar semua akun admin</p>
                    </div>
                    <div class="head-button">
                        <button class="add-acount" id="addAcountButton" onclick="toggleAcount()">
                            akun baru <iconify-icon icon="ic:outline-plus" class="icon-card-5"></span>
                        </button>
                    </div>
                </div>
                <div class="data-table">
                    <table class="style-table">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">No</th>
                                <th onclick="sortTable(1)">Foto</th>
                                <th onclick="sortTable(2)">Username</th>
                                <th onclick="sortTable(3)">Email</th>
                                <th onclick="sortTable(4)">Jenis Pengguna</th>
                                <th onclick="sortTable(5)">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acountSetting as $key => $acount)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if($acount->image)
                                    <img src="{{ asset('profile/' . $acount->image) }}" alt="Acount Image" class="img-thumnail">
                                    @else
                                    <img src="{{ asset('assets/image/profile-1.jpg') }}" alt="gambar default" class="img-thumnail">
                                    @endif
                                </td>
                                <td>{{ $acount->username }}</td>
                                <td>{{ $acount->email }}</td>
                                <td>{{ $acount->role }}</td>
                                <td>
                                    <button class="btn-delete" data-action="confirm-delete" data-target="modal-delete" data-id="{{ $acount->id }}" data-url="{{ route('admin.delete', $acount->id) }}">
                                        <iconify-icon icon="tabler:trash-filled" class="icon-card-5"></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-add" id="addAcount">
        <div class="modal-content-add">
            <h2>Tambah Akun</h2>
            <form action="{{ route('admin.acount.add') }}" method="POST" enctype="multipart/form-data" id="formAddAccount">
            @csrf
                <input type="hidden" name="source" value="addAcount">
                <div class="image-add-acount">
                    <h2 class="img-text">Upload Gambar</h2>
                    <input type="file" name="acount_image" class="supporting-file" hidden>
                    <label class="custom-file-label">
                        <iconify-icon icon="icon-park-outline:upload-one" class="icon-upload"></iconify-icon>
                    </label>

                    <div class="image-preview-container">
                        <img class="image-preview" src="" alt="Preview">
                        <button type="button" class="delete-image">
                            <iconify-icon icon="tabler:trash-filled" class="icon-sampah"></iconify-icon>
                        </button>
                    </div>
                </div>

                <div class="input-content-add">
                    <label for="name-acount">Nama<strong>*</strong></label>
                    <input type="text" name="acount_username" id="name-acount" placeholder="Masukan Nama">
                    @error('acount_username')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-content-add">
                    <label for="email-acount">Email<strong>*</strong></label>
                    <input type="text" name="acount_email" id="email-acount" placeholder="Masukan Email">
                    @error('acount_email')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-content-add">
                    <label for="password-acount">Password<strong>*</strong></label>
                    <input type="password" name="acount_password" id="password-acount" placeholder="Masukan Password">
                    @error('acount_password')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-content-add">
                    <label for="role">Jenis Pengguna<strong>*</strong></label>
                    <div class="select-wrapper">
                        <select name="role" id="role" required class="select-role">
                            <option disabled selected>Not Selected</option>
                            <option value="admin">Admin</option>
                            <option value="bendahara">Bendahara</option>
                        </select>
                        <iconify-icon icon="eva:arrow-down-fill" class="icon-select"></iconify-icon>
                    </div>
                </div>
                <div class="button-modal">
                    <button type="button" class="button-reject" data-action="close-popup" data-target="addAcount">Batal</button>
                    <button type="submit" class="button-approv">Buat Akun</button>
                </div>
            </form>
        </div>
    </div>


    <div class="modal-add" id="addUser">
        <div class="modal-content-add">
            <h2>Tambah Group</h2>
            <form action="{{ route('admin.users.add') }}" method="POST" enctype="multipart/form-data" id="formAddUser">
                @csrf
                <input type="hidden" name="source" value="addUser">
                <div class="image-add-acount">
                    <h2 class="img-text">Upload Gambar</h2>
                    <input type="file" name="user_image" class="supporting-file" hidden>
                    <label class="custom-file-label">
                        <iconify-icon icon="icon-park-outline:upload-one" class="icon-upload"></iconify-icon>
                    </label>

                    <div class="image-preview-container">
                        <img class="image-preview" src="" alt="Preview">
                        <button type="button" class="delete-image">
                            <iconify-icon icon="tabler:trash-filled" class="icon-sampah"></iconify-icon>
                        </button>
                    </div>
                </div>

                <div class="input-content-add">
                    <label for="username-user">Group Name<strong>*</strong></label>
                    <input type="text" name="user_username" id="username-user" placeholder="Masukan Nama">
                    @error('user_username')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-content-add">
                    <label for="email-user">Username<strong>*</strong></label>
                    <input type="text" name="user_email" id="email-user" placeholder="Masukan Email">
                    @error('user_email')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-content-add">
                    <label for="password-user">Password<strong>*</strong></label>
                    <input type="password" name="user_password" id="password-user" placeholder="Masukan Password">
                    @error('user_password')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="button-modal">
                    <button type="button" class="button-reject" data-action="close-popup" data-target="addUser">Batal</button>
                    <button type="submit" class="button-approv">Buat Akun</button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>

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

    <div class="main-content">
        <div class="card-content">
            <div class="card-acount">
                <div class="head-card">
                    <div class="head-title">
                        <h2>Semua Grup</h2>
                        <p>Lihat daftar semua grup</p>
                    </div>
                    <div class="head-button">
                        <button class="add-acount">
                            grup baru <iconify-icon icon="ic:outline-plus" class="icon-card-5"></span>
                        </button>
                    </div>
                </div>
                <div class="main-card">
                    <div class="card">
                        <div class="card-image-head">
                            <img src="{{ asset('assets/image/Profile _ Group.png') }}" alt="" class="card-image">
                        </div>
                        <div class="card-text">
                            <p class="label-card">Dibuat: 27 Januari 2025</p>
                            <h3>Divisi MLBB</h3>
                            <h4>IDR 4.500.000</h4>
                        </div>
                        <button class="card-button">Lihat Group</button>
                    </div>
                    <div class="card">
                        <div class="card-image-head">
                            <img src="{{ asset('assets/image/Profile _ Group_2.png') }}" alt="" class="card-image">
                        </div>
                        <div class="card-text">
                            <p class="label-card">Dibuat: 27 Januari 2025</p>
                            <h3>Divisi Logistik</h3>
                            <h4>IDR 4.500.000</h4>
                        </div>
                        <button class="card-button">Lihat Group</button>
                    </div>
                    <div class="card">
                        <div class="card-image-head">
                            <img src="{{ asset('assets/image/Profile _ Group_2.png') }}" alt="" class="card-image">
                        </div>
                        <div class="card-text">
                            <p class="label-card">Dibuat: 27 Januari 2025</p>
                            <h3>Divisi Acara</h3>
                            <h4>IDR 4.500.000</h4>
                        </div>
                        <button class="card-button">Lihat Group</button>
                    </div>
                    <div class="card">
                        <div class="card-image-head">
                            <img src="{{ asset('assets/image/Profile _ Group_3.png') }}" alt="" class="card-image">
                        </div>
                        <div class="card-text">
                            <p class="label-card">Dibuat: 27 Januari 2025</p>
                            <h3>Divisi PDD</h3>
                            <h4>IDR 4.500.000</h4>
                        </div>
                        <button class="card-button">Lihat Group</button>
                    </div>
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
                                <th onclick="sortTable(2)">Nama</th>
                                <th onclick="sortTable(3)">Email</th>
                                <th onclick="sortTable(4)">Jenis Pengguna</th>
                                <th onclick="sortTable(5)">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acountSetting as $key => $acount)
                                <tr>
                                <td>{{ $acount->id }}</td>
                                <td>
                                    @if($acount->image)
                                    <img src="{{ asset('image/' . $acount->image) }}" alt="Acount Image" class="img-thumnail">
                                    @else
                                    <p>No Image</p>
                                    @endif
                                </td>
                                <td>{{ $acount->name }}</td>
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
            <form action="{{ route('admin.acount.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="image-add-acount">
                    <h2 class="img-text">Gambar</h2><strong>
                    <input type="file" id="supporting-file" hidden>
                    <label for="supporting-file" class="custom-file-label">
                        <iconify-icon icon="mdi:upload" class="icon-upload"></iconify-icon>
                        <span id="file-label-text">Pilih file pendukung</span>
                    </label>
                </div>
                <div class="input-content-add">
                    <label for="name">Nama<strong>*</strong></label>
                    <input type="text" name="#" id="name" placeholder="Masukan Nama">
                </div>
                <div class="input-content-add">
                    <label for="email">Email<strong>*</strong></label>
                    <input type="text" name="#" id="email" placeholder="Masukan Email">
                </div>
                <div class="input-content-add">
                    <label for="amount">Password<strong>*</strong></label>
                    <input type="text" name="#" id="amount" placeholder="Masukan Password">
                </div>
                <div class="input-content-add">
                    <label for="role">Jenis Pengguna<strong>*</strong></</label>
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
                    <button type="submit" class="button-reject">Buat Akun</button>
                    <button type="button" class="button-approv">Batal</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

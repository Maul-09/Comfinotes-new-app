<x-admin-layout>
    <x-slot:title>Admin Dashboard - Comfinote's</x-slot:title>
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
                        <button class="add-acount">
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
                                <th onclick="sortTable(2)">Akun</th>
                                <th onclick="sortTable(3)">Jenis Pengguna</th>
                                <th onclick="sortTable(4)">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="#" alt=""></td>
                                <td>Ajis Maulana</td>
                                <td>Admin</td>
                                <td>
                                    <button class="btn-delete">
                                        <iconify-icon icon="tabler:trash-filled" class="icon-card-5"></span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="#" alt=""></td>
                                <td>Khoppid</td>
                                <td>Bendahara</td>
                                <td>
                                    <button class="btn-delete">
                                        <iconify-icon icon="tabler:trash-filled" class="icon-card-5"></span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="#" alt=""></td>
                                <td>Egy</td>
                                <td>Admin</td>
                                <td>
                                    <button class="btn-delete">
                                        <iconify-icon icon="tabler:trash-filled" class="icon-card-5"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

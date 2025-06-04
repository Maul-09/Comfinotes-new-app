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
        <div class="header-menu">
            <div class="header-title">
                <h1>Community</h1>
                <p>Informasi terperinci tentang keuangan komunitas Anda</p>
            </div>
            <div class="notif-content">
                <div class="notif">
                    <iconify-icon icon="pepicons-pencil:bell" id="icon-notif" class="bell"></iconify-icon>
                    <p class="notif-point"></p>
                    <div class="notif-dropdown" id="notif-dropdown">
                        <h2>Notification</h2>
                        <hr class="border">
                        <div class="notif-items" onclick="openModal('modal-notifications')">
                            <div class="bg-icon">
                                <iconify-icon icon="iconoir:send-mail" class="icon-notif"></iconify-icon>
                            </div>
                            <div class="notif-box">
                                <div class="notif-text">
                                    <h3 class="title-notif">Divisi Logistik</h3>
                                    <p class="des-notif">waiting for approved notes financial</p>
                                </div>
                                <div class="notif-date">
                                    <iconify-icon icon="tabler:clock" class="history"></iconify-icon>
                                    <p>40 Minutes Ago</p>
                                </div>
                            </div>
                        </div>
                        <hr class="border">
                    </div>
                </div>

                <div class="drop-akun">
                    <ul class="dropdown-menu">
                        <li class="dropbutton">
                            <button class="dropdown-button" id="userDropdownButton" onclick="toggleDropdown()">
                                <img src="assets/image/profile-1.jpg" alt="User Logo" class="user-logo">
                            </button>
                            <div class="drop-down" id="userDropdownMenu">
                                <div class="drop-title">
                                    <h2>Hello, Azis</h2>
                                    <p>admin</p>
                                </div>
                                <hr>
                                <div class="drop-menu">
                                    <a href="#" class="menu-items"><iconify-icon icon="solar:user-linear" class="icon-user-1"></iconify-icon>Profile</a>
                                    <hr>
                                    <button type="button" class="menu-items logout-button" onclick="confirmLogout()">
                                        <iconify-icon icon="mdi-light:logout" class="icon-user-2"></iconify-icon>Logout
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

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



    <!-- Start Modal content -->

    <div class="logout-notification" id="logout-notification">
        <div class="logout-content">
            <h2>Sign Out?</h2>
            <p>Do you want to exit the app now?</p>
            <div class="logout-actions">
                <button class="btn-cancel" onclick="cancelLogout()">Cancel</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-confirm">Sign Out</button>
                </form>
            </div>
        </div>
    </div>


    <div id="modal-notifications" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal('modal-notifications')">&times;</span>
            <h1 class="title-modal">Divisi Logistik</h1>
            <div class="image-aproof">
                <h2 class="img-text">Supporting Files</h2><strong>*</strong><span>Optional</span>
                <p class="img-text-2">Such as receipts, photos of event plans, etc.</p>
                <img src="#" alt="Proof Not Detected" class="image-1">
            </div>
            <div class="input-content">
                <label for="event">Event Name<strong>*</strong></label>
                <input type="text" name="#" id="event" placeholder="Contoh : Musyawarah">
            </div>
            <div class="input-content">
                <label for="amount">Amount<strong>*</strong></label>
                <input type="text" name="#" id="amount" placeholder="Contoh : 2.450.000">
            </div>
            <div class="button-modal">
                <button type="" class="button-reject">Cancelled</button>
                <button type="" class="button-approv">Apporped</button>
            </div>
            <a href="#" class="link-info">See Details</a>
        </div>
    </div>
</x-admin-layout>

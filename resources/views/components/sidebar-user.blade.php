<div class="main-header">
    <div class="header-menu">
        <div class="header-title">
            <h1>Dashboard</h1>
            <p>Informasi terperinci tentang keuangan komunitas Anda</p>
        </div>
        <div class="notif-content">
            <div class="notif">
                <iconify-icon icon="pepicons-pencil:bell" class="bell icon-notif" data-action="toggle-dropdown" data-target="notif-dropdown"></iconify-icon>
                <div class="notif-dropdown" id="notif-dropdown">
                    <h2>Notification</h2>
                    <hr class="border">
                    <div class="notif-items" data-action="open-modal" data-target="modal-notifications">
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
                            <img src="{{ asset('assets/image/profile-1.jpg') }}" alt="User Logo" class="user-logo">
                        </button>
                        <div class="drop-down" id="userDropdownMenu">
                            <div class="drop-title">
                                <h2>Hello, {{ $user->username }}</h2>
                                <p>{{ $user->role }}</p>
                            </div>
                            <hr>
                            <div class="drop-menu">
                                <a href="#" class="menu-items"><iconify-icon icon="solar:user-linear" class="icon-user-1"></iconify-icon>Profile</a>
                                <hr>
                                <button type="button" class="menu-items logout-button" data-action="confirm-logout" data-target="logout-notification">
                                    <iconify-icon icon="mdi-light:logout" class="icon-user-2"></iconify-icon>Logout
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="sidebar-user">
        <div class="title-side-user">
            <a href="{{ route('dashboard-user') }}"><img src="{{ asset('assets/image/logo-2.png') }}" alt="logo user" class="logo-user"></a>
        </div>
        <ul class="menu">
            <li class="{{ request()->routeIs('dashboard-user') ? 'active-btn' : '' }}"><iconify-icon icon="mage:dashboard-fill"></iconify-icon><a href="{{ route('dashboard-user') }}">Dashboard</a></li>
        </ul>
    </div>
</div>

<!-- Modal content -->

<div id="modal-notifications" class="modal-notif">
    <div class="modal-content">
        <span class="close-button" data-action="close-modal" data-target="modal-notifications">&times;</span>
        <h1 class="title-modal">Pengajuan Anda masih di proses</h1>
    </div>
</div>


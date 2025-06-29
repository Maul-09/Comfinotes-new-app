@props(['PageTitle', 'PageSubtitle'])

<div class="main-header">
    <div class="header-menu">
        <div class="header-title">
            <h1>{{ $PageTitle }}</h1>
            <p>{{ $PageSubtitle }}</p>
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
                            @if ($bendahara->image)
                            <img src="{{ asset('profile/' . $bendahara->image) }}" alt="User Logo" class="user-logo">
                            @else
                            <img src="{{ asset('assets/image/profile-2.jpg') }}" alt="" class="user-logo">
                            @endif
                        </button>
                        <div class="drop-down" id="userDropdownMenu">
                            <div class="drop-title">
                                <h2>Hello, {{ $bendahara->username }}</h2>
                                <p>{{ $bendahara->role }}</p>
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

    <div class="sidebar-bendahara">
        <div class="title-side-bendahara">
            <a href="{{ route('dashboard-bendahara') }}"><img src="{{ asset('assets/image/logo-2.png') }}" alt="logo user" class="logo-bendahara"></a>
        </div>
        <ul class="menu">
            <li class="
            {{ request()->routeIs('dashboard-bendahara')
            || request()->routeIs('simpan-uang')
            || request()->routeIs('see-detail')  ? 'active-btn' : '' }}">

            <iconify-icon icon="mage:dashboard-fill"></iconify-icon><a href="{{ route('dashboard-bendahara') }}">Dashboard</a></li>
        </ul>
    </div>
</div>

<!-- Modal content -->

<div id="modal-notifications" class="modal-notif">
    <div class="modal-content">
        <span class="close-button" data-action="close-modal" data-target="modal-notifications">&times;</span>
        <h1 class="title-modal">Divisi Logistik</h1>
        <div class="image-aproof">
            <h2 class="img-text">Supporting Files</h2><strong>*</strong><span>Optional</span>
            <p class="img-text-2">Such as receipts, photos of event plans, etc.</p>
            <input type="file" id="supporting-file" hidden>
            <label for="supporting-file" class="custom-file-label">
                <iconify-icon icon="mdi:upload" class="icon-upload"></iconify-icon>
                <span id="file-label-text">Pilih file pendukung</span>
            </label>
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
            <button type="button" class="button-reject">Cancelled</button>
            <button type="button" class="button-approv">Approved</button>
        </div>
        <a href="{{ route('see-detail') }}" class="link-info">See Details</a>
    </div>
</div>



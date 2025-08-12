@props(['PageTitle', 'PageSubtitle', 'notifications' => collect()])

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
                    @forelse ($notifications as $trx)
                        <div class="notif-items"
                            data-action="open-modal"
                            data-target="modal-notifications"
                            data-id="{{ $trx->id }}"
                            data-acara="{{ $trx->nama_acara }}"
                            data-jumlah="{{ number_format($trx->amount, 0, ',', '.') }}"
                            data-file="{{ $trx->supporting_file ? asset($trx->supporting_file) : '' }}"
                            data-divisi="{{ $trx->departemen->nama ?? 'Tanpa Divisi' }}">

                            <div class="bg-icon">
                                <iconify-icon icon="iconoir:send-mail" class="icon-notif"></iconify-icon>
                            </div>
                            <div class="notif-box">
                                <div class="notif-text">
                                    <h3 class="title-notif">{{ $trx->departemen->name_divisi ?? 'Umum' }}</h3>
                                    <p class="des-notif">Menunggu persetujuan untuk {{ $trx->nama_acara }}</p>
                                </div>
                                <div class="notif-date">
                                    <iconify-icon icon="tabler:clock" class="history"></iconify-icon>
                                    <p>{{ $trx->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        <hr class="border">
                    @empty
                        <p class="px-4 py-2 text-gray-500">Belum ada notifikasi</p>
                    @endforelse
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
                                <a href="{{ route('dashboard-bendahara.bendahara') }}" class="menu-items"><iconify-icon icon="solar:user-linear" class="icon-user-1"></iconify-icon>Profile</a>
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
</div>

<!-- Modal content -->

<div id="modal-notifications" class="modal">
    <div class="modal-content">
        <span class="close-button" data-action="close-modal" data-target="modal-notifications">&times;</span>
        <h1 class="title-modal">Divisi Logistik</h1>
        <form action="{{ route('bendahara.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="notif_id" id="notif-id">

            <div class="file-section">
                <h2 class="img-text">File Pendukung</h2>
                <p class="img-text-2">Download file pendukung seperti proposal, nota, dll.</p>
                <a id="file-download" href="#" target="_blank" class="download-btn" style="display:none;">
                    <iconify-icon icon="mdi:file-pdf-box" class="download-icon"></iconify-icon>
                    <span>Download File</span>
                </a>
                <p id="no-file" class="no-file-text">Tidak ada file pendukung</p>
            </div>

            <div class="input-content">
                <label for="event">Nama Acara<strong>*</strong></label>
                <input type="text" name="event_name" id="event" disabled>
            </div>

            <div class="input-content">
                <label for="kebutuhan">Kebutuhan<strong>*</strong></label>
                <input type="text" name="catatan_detail" id="kebutuhan" disabled>
            </div>

            <div class="input-row">
                <div class="input-content half-width">
                    <label for="amount">Jumlah<strong>*</strong></label>
                    <input type="text" name="amount" id="amount" disabled>
                </div>
                <div class="input-content half-width">
                    <label>Metode Pembayaran<strong>*</strong></label>
                    <div class="metode-options">
                        <label class="metode-option">
                            <input type="radio" name="metode" value="tunai" disabled>
                            <span class="metode-text">Tunai</span>
                        </label>
                        <label class="metode-option">
                            <input type="radio" name="metode" value="transfer" disabled>
                            <span class="metode-text">Transfer</span>
                        </label>
                    </div>

                    <div id="bank-info" style="display:none; margin-top:10px;">
                        <input type="text" id="bank_name" placeholder="Nama Bank" disabled>
                        <input type="text" id="bank_account" placeholder="Nomor Rekening" disabled>
                    </div>
                </div>
            </div>

            <div class="input-content">
                <label for="jumlah_hari">Jumlah Hari<strong>*</strong></label>
                <div class="split">
                    <input type="number" id="jumlah_hari" disabled>
                    <span class="hari-label">Hari</span>
                </div>
            </div>

            <div class="button-modal">
                <button type="submit" name="action" value="rejected" class="button-reject">Cancelled</button>
                <button type="submit" name="action" value="approved" class="button-approv">Approved</button>
            </div>
        </form>
    </div>
</div>






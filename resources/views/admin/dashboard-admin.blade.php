<x-admin-layout>
<x-slot:title>Admin Dashboard - Comfinotes</x-slot:title>

    <div class="main-content">
        <div class="header-menu">
            <div class="header-title">
                <h1>Dashboard</h1>
                <p>Detailed information about your community’s finances</p>
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
            <div class="card-box">
                <div class="card-items">
                    <div class="card-bg-icon">
                        <iconify-icon icon="iconoir:send-mail" class="icon-card-1"></iconify-icon>
                    </div>
                    <span>Total Submisions</span>
                    <h3>250</h3>
                </div>

                <div class="card-items">
                    <div class="card-icon">
                        <div class="card-bg-icon">
                            <iconify-icon icon="uit:wallet" class="icon-card-2"></iconify-icon>
                        </div>
                        <div class="button-plus">
                            <iconify-icon icon="mdi:plus" class="icon-card-3"></iconify-icon>
                        </div>
                    </div>
                    <span>Total Revenue</span>
                    <h3>IDR25.500.000</h3>
                </div>

                <div class="card-items">
                    <div class="card-bg-icon">
                        <iconify-icon icon="hugeicons:money-receive-flow-02" class="icon-card-4"></iconify-icon>
                    </div>
                    <span>Income</span>
                    <h3>IDR34.150.000</h3>
                </div>

                <div class="card-items">
                    <div class="card-bg-icon">
                        <iconify-icon icon="hugeicons:money-send-flow-02" class="icon-card-5"></iconify-icon>
                    </div>
                    <span>Expenses</span>
                    <h3>IDR8.650.000</h3>
                </div>
            </div>
        </div>

        <div class="chart-content">
            <div class="chart-items">
                <div class="chart-header">
                    <h2>Analytics</h2>
                    <div class="chart-button">
                        <button class="button-report">
                            <iconify-icon icon="material-symbols:download" class="icon-card-5"></iconify-icon>Download Report
                        </button>
                        <button class="button-dropdown">
                            Today<iconify-icon icon="ep:arrow-down" class="icon-card-5"></iconify-icon>
                        </button>
                    </div>
                </div>

                <div class="chart-main">
                    <div class="char-main-title">
                        <span>Total Revenue</span>
                        <h2>IDR25.500.000</h2>
                    </div>
                    <div class="chart-list">
                        <ul class="chart-menu">
                            <li class="list-1">Revenue</li>
                            <li class="list-2">Expenses</li>
                        </u>
                    </div>
                </div>

                <div class="graphic">

                </div>
            </div>

            <div class="calendar-container">
                <div class="calendar-header">
                    <h3 id="month-year"></h3>
                    <div class="button-previous">
                        <button onclick="changeMonth(-1)"><iconify-icon icon="fe:arrow-left" class="icon-calender"></button>
                        <button onclick="changeMonth(1)"><iconify-icon icon="fe:arrow-right" class="icon-calender"></button>
                    </div>
                </div>
                <div class="weekdays">
                    <div>Su</div> <div>Mo</div> <div>Tu</div> <div>We</div>
                    <div>Th</div> <div>Fr</div> <div>Sa</div>
                </div>
                <div class="days" id="calendar-days"></div>
            </div>
        </div>

        <div class="history-record">
            <div class="history-items">
                <div class="record-head">
                    <div class="record-title">
                        <h2>All Financial Record</h2>
                        <span>View all event financial history</span>
                    </div>
                    <button class="button-dropdown-2">
                        Today<iconify-icon icon="ep:arrow-down" class="icon-card-5">
                    </button>
                </div>
                <div class="record-table">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Group</th>
                            <th>Amount</th>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>Divisi Logistik</th>
                            <th>IDR 1.000.000</th>
                            <th>Mukbang Besar</th>
                            <th>12 Januari 2025</th>
                            <th>Succes</th>
                        </tr>
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
                <button class="btn-confirm" onclick="proceedLogout()">Sign Out</button>
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

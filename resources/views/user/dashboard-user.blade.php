<x-user-layout>
    <x-slot:title>Dashboard User - Comfinotes</x-slot:title>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            showAlert("{{ session('success') }}", "success", 4000);
            });
        </script>
    @endif

    <div class="main-content">
        <div class="main-menu">
            <div class="card-wallet">
                <div class="header-wallet">
                    <div class="wallet-image">
                        <img src="#" alt="">
                    </div>
                    <div class="wallet-head">
                        <p class="text-wallet">Divisi Mlbb</p>
                        <div class="card-bg-icon">
                            <iconify-icon icon="uit:wallet" class="icon-card-2"></iconify-icon>
                        </div>
                    </div>
                    <div class="wallet-amount">
                        <h2>IDR 4.400.000</h2>
                        <span>Pengeluaran Divisi</span>
                    </div>
                </div>
            </div>
            <div class="table-acount-user">
                <div class="header-acount-user">
                    <div class="head-acount-user">
                        <div class="head-title-user">
                            <h2>Semua catatan keuangan</h2>
                            <p>Informasi terperinci tentang keuangan komunitas Anda</p>
                        </div>
                        <div class="head-button-user">
                            <button class="add-acount">
                                pengajuan baru <iconify-icon icon="ic:outline-plus" class="icon-card-5"></span>
                            </button>
                        </div>
                    </div>
                    <div class="data-table-user">
                        <table class="style-table-user">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">No</th>
                                    <th onclick="sortTable(1)">Nama acara</th>
                                    <th onclick="sortTable(2)">Jumlah</th>
                                    <th onclick="sortTable(3)">Tanggal</th>
                                    <th onclick="sortTable(5)">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Musyawarah Besar</td>
                                    <td>- IDR 2.000.000</td>
                                    <td>12, Januari 2025</td>
                                    <td class="status"><p class="success">Success</p></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Makrab</td>
                                    <td>+ IDR 750.000</td>
                                    <td>20, Februari 2025</td>
                                    <td class="status"><p class="pending">pending</p></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sewa Barang</td>
                                    <td>- IDR 500.000</td>
                                    <td>15, Maret 2025</td>
                                    <td class="status"><p class="cancel">cancel</p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                        <div class="dropdown-table">
                        <button class="button-dropdown">
                            Today <iconify-icon icon="ep:arrow-down" class="icon-card-5"></span>
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Today</a>
                            <a href="#">This Week</a>
                            <a href="#">This Month</a>
                        </div>
                    </div>
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
                        </ul>
                    </div>
                </div>

                <div class="graphic">
                    <canvas id="myChart" width="800" height="300"></canvas>
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
    </div>
</x-user-layout>

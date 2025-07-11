<x-bendahara-layout>
    <x-slot:title>Bendahara Dashboard - Comfinotes</x-slot:title>
    <x-slot:PageTitle>Dashboard</x-slot:PageTitle>
    <x-slot:PageSubtitle>Informasi terperinci tentang keuangan komunitas Anda</x-slot:SubTitle>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            showAlert("{{ session('success') }}", "success", 4000);
            });
        </script>
    @endif

    <div class="main-content">
        <div class="card-content">
            <div class="card-box">
                <div class="card-items">
                    <div class="card-icon">
                        <div class="card-bg-icon">
                            <iconify-icon icon="uit:wallet" class="icon-card-2"></iconify-icon>
                        </div>
                        <a href="{{ route('simpan-uang') }}" class="button-plus">
                            <iconify-icon icon="mdi:plus" class="icon-card-3"></iconify-icon>
                        </a>
                    </div>
                    <span>Total Dana</span>
                    <h3>IDR {{ number_format($totalIncome, '0',',','.') }}</h3>
                </div>
                <div class="card-items">
                    <div class="card-bg-icon">
                        <iconify-icon icon="iconoir:send-mail" class="icon-card-1"></iconify-icon>
                    </div>
                    <span>Total Pengajuan</span>
                    <h3>250</h3>
                </div>

                <div class="card-items">
                    <div class="card-bg-icon">
                        <iconify-icon icon="hugeicons:money-receive-flow-02" class="icon-card-4"></iconify-icon>
                    </div>
                    <span>Pemasukan</span>
                    <h3>IDR 34.150.000</h3>
                </div>

                <div class="card-items">
                    <div class="card-bg-icon">
                        <iconify-icon icon="hugeicons:money-send-flow-02" class="icon-card-5"></iconify-icon>
                    </div>
                    <span>Pengeluaran</span>
                    <h3>IDR 8.650.000</h3>
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
                        <button onclick="changeMonth(-1)">
                            <iconify-icon icon="fe:arrow-left" class="icon-calender"></iconify-icon>
                        </button>
                        <button onclick="changeMonth(1)">
                            <iconify-icon icon="fe:arrow-right" class="icon-calender"></iconify-icon>
                        </button>
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
                <div class="record-table">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">No</th>
                                <th onclick="sortTable(1)">Group</th>
                                <th onclick="sortTable(2)">Amount</th>
                                <th onclick="sortTable(3)">Event Name</th>
                                <th onclick="sortTable(4)">Date</th>
                                <th onclick="sortTable(5)">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Divisi Logistik</td>
                                <td>- IDR 2.000.000</td>
                                <td>Mukbang Besar</td>
                                <td>12, Januari 2025</td>
                                <td class="status"><p class="success">Success</p></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tim Kreatif</td>
                                <td>+ IDR 750.000</td>
                                <td>Workshop Digital</td>
                                <td>20, Februari 2025</td>
                                <td class="status"><p class="pending">pending</p></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Finance</td>
                                <td>- IDR 500.000</td>
                                <td>Meeting Akbar</td>
                                <td>15, Maret 2025</td>
                                <td class="status"><p class="cancel">cancel</p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-bendahara-layout>

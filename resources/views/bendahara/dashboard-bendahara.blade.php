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
                    <h3>IDR {{ number_format($saldo, '0',',','.') }}</h3>
                </div>
                <div class="card-items">
                    <div class="card-bg-icon">
                        <iconify-icon icon="iconoir:send-mail" class="icon-card-1"></iconify-icon>
                    </div>
                    <span>Total Pengajuan</span>
                    <h3>{{ $aprroveCount }}</h3>
                </div>

                <div class="card-items">
                    <div class="card-bg-icon">
                        <iconify-icon icon="hugeicons:money-receive-flow-02" class="icon-card-4"></iconify-icon>
                    </div>
                    <span>Pemasukan</span>
                    <h3>IDR {{ number_format($totalIncome, '0',',','.') }}</h3>
                </div>

                <div class="card-items">
                    <div class="card-bg-icon">
                        <iconify-icon icon="hugeicons:money-send-flow-02" class="icon-card-5"></iconify-icon>
                    </div>
                    <span>Pengeluaran</span>
                    <h3>IDR {{ number_format($totalAprovalTransaction, '0', ',', '.') }}</h3>
                </div>
            </div>
        </div>

        <div class="chart-content">
            <div class="chart-items">
                <div class="chart-header">
                    <h2>Analisis</h2>
                    <div class="chart-button">
                        <button class="button-report">
                            <iconify-icon icon="material-symbols:download" class="icon-card-5"></iconify-icon>Download Report
                        </button>
                    </div>
                </div>

                <div class="chart-main">
                    <div class="char-main-title">
                        <span>Total Pemasukan</span>
                        <h2>IDR {{ number_format($totalIncome, '0', ',', '.') }}</h2>
                    </div>
                    <div class="chart-list">
                        <ul class="chart-menu">
                            <li class="list-1">Revenue</li>
                            <li class="list-2">Expenses</li>
                        </ul>
                    </div>
                </div>

                <div class="graphic">
                    <div class="y-axis">
                        <span>20 JT</span>
                        <span>15 JT</span>
                        <span>10 JT</span>
                        <span>5 JT</span>
                        <span>0</span>
                    </div>

                    <div class="chart-area">
                        @foreach($monthlyData as $month => $data)
                            <div class="month-bar">
                                <div class="bar">
                                    <div class="bar-income" style="height: {{ $data['income_percent'] }}px"></div>
                                    <div class="bar-expense" style="height: {{ $data['expense_percent'] }}px"></div>
                                </div>
                                <div class="month-label">{{ $month }}</div>
                            </div>
                        @endforeach
                    </div>
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
                                <th onclick="sortTable(2)">Jumlah</th>
                                <th onclick="sortTable(3)">Nama Acara</th>
                                <th onclick="sortTable(4)">Tanggal</th>
                                <th onclick="sortTable(5)">Status</th>
                            </tr>
                        </thead>
                        <div class="scroll">
                            <tbody class="styled-data">
                                @forelse ( $historyTransaction as $index => $history )
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{!! $history->user?->divisi?->name_divisi ?? '<span style="color: red;">Akun terhapus</span>' !!}</td>
                                        <td>{{ number_format($history->amount, 0, '.', '.') }}</td>
                                        <td>{{ $history->nama_acara }}</td>
                                        <td>{{ \Carbon\Carbon::parse($history->submission_date)->translatedFormat('d F Y') }}</td>
                                        <td class="status">
                                            @if ($history->status == 'approved')
                                                <p class="success">Success</p>
                                            @elseif ($history->status == 'pending')
                                                <p class="pending">Pending</p>
                                            @elseif ($history->status == 'rejected')
                                                <p class="cancel">Cancel</p>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="history-empty">
                                                <h2 class="text-empty">Tidak ada riwayat Transaksi</h2>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>

</x-bendahara-layout>

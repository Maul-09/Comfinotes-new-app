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
                    @if ($user->image_divisi)
                    <img src="{{ asset('uploads/' . $user->image_divisi) }}" alt="Wallet Background" class="wallet-bg" />
                    @else
                    <img src="{{ asset('assets/image/Profile _ Group.png') }}" alt="Wallet Background" class="wallet-bg" />
                    @endif
                    <div class="wallet-content">
                        <div class="wallet-head">
                            <p class="text-wallet">{{ $user->username }}</p>
                            <div class="card-bg-icon">
                                <iconify-icon icon="uit:wallet" class="icon-card-2"></iconify-icon>
                            </div>
                        </div>
                        <div class="wallet-amount">
                            <h2>IDR {{ number_format($totalAproval, '0', ',', '.') }}</h2>
                            <span>Pengeluaran Divisi</span>
                        </div>
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
                            <a href="{{ route('dashboard-user.submission') }}" class="add-acount">
                                pengajuan baru <iconify-icon icon="ic:outline-plus" class="icon-card-5"></iconify-icon>
                            </a>
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
                                @forelse($transactions as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_acara }}</td>
                                        <td class="{{ $item->approval_amount }}">
                                            {{ $item->amount ? 'IDR ' . number_format($item->amount, 0, ',', '.') : '-' }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->submission_date)->translatedFormat('d F Y') }}</td>
                                        <td class="status">
                                            @if($item->status == 'approved')
                                                <p class="success">Success</p>
                                            @elseif($item->status == 'pending')
                                                <p class="pending">Pending</p>
                                            @elseif($item->status == 'rejected')
                                                <p class="cancel">Cancel</p>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Belum ada pengajuan.</td>
                                    </tr>
                                @endforelse
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
                </div>

                <div class="chart-main">
                    <div class="char-main-title">
                        <span>Total Pengeluaran</span>
                        <h2>IDR {{ number_format($totalAproval, '0', ',', '.') }}</h2>
                    </div>
                    <div class="chart-list">
                        <ul class="chart-menu">
                            <li class="list-2">Expenses</li>
                        </ul>
                    </div>
                </div>

                <div class="graphic">
                    <div class="y-axis">
                        <span>10 JT</span>
                        <span>8 JT</span>
                        <span>5 JT</span>
                        <span>3 JT</span>
                        <span>0</span>
                    </div>

                    <div class="chart-area">
                        @foreach($monthlyData as $month => $data)
                        <div class="month-bar">
                            <div class="bar">
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
    </div>
</x-user-layout>

<x-bendahara-layout>
<x-slot:title>Simpan uang - Comfinotes</x-slot:title>
<x-slot:PageTitle>Tambah Dana</x-slot:PageTitle>
<x-slot:PageSubtitle>Informasi terperinci tentang keuangan komunitas Anda</x-slot:SubTitle>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        showAlert("{{ session('success') }}", "success", 4000);
        });
    </script>
@endif

<div class="main-content">
    <div class="card-submission">
        <div class="card-total">
            <div class="header-total">
                <div class="total-content">
                    <div class="total-head">
                        <p class="text-total">Total Dana</p>
                        <div class="card-bg-icon">
                            <iconify-icon icon="uit:wallet" class="icon-card-2"></iconify-icon>
                        </div>
                    </div>
                    <div class="total-amount">
                        <h2>IDR {{ number_format($saldo, '0', ',', '.') }}</h2>
                        <span>Saldo komunitas Saat ini</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="submission-content">
            <div class="submission-add">
                <div class="submission-title">
                    <h2>Tambah Dana</h2>
                </div>
                    <div class="submission-input">
                        <form action="{{ route('bendahara.add-dana') }}" method="POST">
                        @csrf
                            <div class="add-money">
                                <label for="nominal">Jumlah<strong>*</strong></label>
                                <input type="text" class="rupiah-format" placeholder="Masukan Angka 0">
                                <input type="hidden" name="jumlah" id="jumlah-real">
                                @error('jumlah')
                                    <p class="pesan-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="add-money">
                                <label for="method">Metode Pembayaran<strong>*</strong></label>
                                <div class="select-wrapper">
                                    <select name="metode" id="method" required class="select-method">
                                        <option disabled selected>Not Selected</option>
                                        <option value="tunai">Tunai</option>
                                        <option value="transfer">Transfer</option>
                                    </select>
                                    <iconify-icon icon="eva:arrow-down-fill" class="icon-select"></iconify-icon>
                                </div>
                                @error('metode')
                                    <p class="pesan-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="add-money">
                                <label for="tanggal">Tanggal<strong>*</strong></label>
                                <input type="date" name="tanggal" id="tanggal">
                                @error('tanggal')
                                    <p class="pesan-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="add-money">
                                <label for="keterangan">Keterangan<strong>*</strong></label>
                                <input type="text" name="keterangan" id="keterangan" placeholder="Tambah Keterangan">
                            </div>

                            <div class="button-add">
                            <button type="submit" class="button-submission">Tambah Dana</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="submission-table">
                <div class="header-acount-user">
                    <div class="head-acount-user">
                        <div class="head-title-user">
                            <h2>Riwayat</h2>
                            <p>Lihat semua riwayat keuangan acara</p>
                        </div>
                    </div>
                    <div class="data-table-user">
                        <table class="style-table-user">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">No</th>
                                    <th onclick="sortTable(1)">Jumlah</th>
                                    <th onclick="sortTable(2)">Metode Pembayaran</th>
                                    <th onclick="sortTable(3)">Tanggal</th>
                                    <th onclick="sortTable(3)">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $key => $index)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="nominal">+ IDR {{ number_format($index->total, 0, ',', '.') }}</td>
                                    <td>{{ $index->metode }}</td>
                                    <td>{{ Carbon\Carbon::parse( $index->income_date)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $index->keterangan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-bendahara-layout>

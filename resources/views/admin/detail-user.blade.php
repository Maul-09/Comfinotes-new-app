<x-admin-layout>
<x-slot:title>Admin Dashboard - Comfinote's</x-slot:title>
<x-slot:PageTitle>{{ $departemens->name_divisi }} Detail</x-slot:PageTitle>
<x-slot:PageSubtitle>Komunitas / Semua Grup / {{ $departemens->name_divisi }}</x-slot:PageSubtitle>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            showAlert("{{ $errors->first() }}", "error", 3000);
        });
    </script>
@endif

<div class="main-content">
    <div class="main-menu">
        <div class="card-section">
            <div class="card-wallet">
                <div class="header-wallet">
                    @if ($departemens->image_divisi)
                    <img src="{{ asset('uploads/' . $departemens->image_divisi) }}" alt="Wallet Background" class="wallet-bg" />
                    @else
                    <img src="{{ asset('assets/image/Profile _ Group.png') }}" alt="Wallet Background" class="wallet-bg" />
                    @endif
                    <div class="wallet-content">
                        <div class="wallet-head">
                            <p class="text-wallet">{{ $departemens->name_divisi }}</p>
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
            </div>
            <div class="card-wallet">
                <div class="content-wallet">
                    @foreach ($data as $index => $divisi )
                    <form action="{{ route('admin.users.delete', $divisi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')

                        <div class="input-content-detail">
                            <label for="name_{{ $index }}">Name Group<strong>*</strong></label>
                            <input type="text" name="name_divisi" id="name_{{ $index }}" placeholder="Masukan Nama" value="{{ $departemens->name_divisi }}" disabled>
                        </div>
                        <div class="input-content-detail">
                            <label for="username_{{ $index }}">Username<strong>*</strong></label>
                            <input type="text" name="email" id="username_{{ $index }}" placeholder="Masukan Nama" value="{{ $divisi->email }}" disabled>
                        </div>
                        <div class="input-content-detail">
                            <label for="password_{{ $index }}">Password<strong>*</strong></label>
                            <input type="text" name="password" id="password_{{ $index }}" placeholder="Password Tidak Boleh Ditampilkan" disabled>
                        </div>
                        <div class="button-card">
                            <button type="button" class="button-delete" data-action="confirm-delete" data-target="modal-delete" data-url="{{ route('admin.users.delete', $divisi->id) }}">Hapus Akun</button>
                        </div>
                    </form>
                    @endforeach
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
                </div>
                <div class="data-table-user">
                    <table class="style-table-user">
                        <thead>
                            <tr>
                                <th onclick="sortTable(0)">No</th>
                                <th onclick="sortTable(1)">Nama acara</th>
                                <th onclick="sortTable(2)">Jumlah</th>
                                <th onclick="sortTable(3)">Tanggal</th>
                                <th onclick="sortTable(5)">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Musyawarah Besar</td>
                                <td>- IDR 2.000.000</td>
                                <td>12, Januari 2025</td>
                                <td>
                                <button class="btn-delete" data-action="confirm-delete" data-target="modal-delete" data-url="#">
                                    <iconify-icon icon="tabler:trash-filled" class="icon-trash"></iconify-icon>
                                </button>
                            </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Makrab</td>
                                <td>+ IDR 750.000</td>
                                <td>20, Februari 2025</td>
                                <td>
                                <button class="btn-delete" data-action="confirm-delete" data-target="modal-delete" data-url="#">
                                    <iconify-icon icon="tabler:trash-filled" class="icon-card-5"></iconify-icon>
                                </button>
                            </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sewa Barang</td>
                                <td>- IDR 500.000</td>
                                <td>15, Maret 2025</td>
                                <td>
                                <button class="btn-delete" data-action="confirm-delete" data-target="modal-delete" data-url="#">
                                    <iconify-icon icon="tabler:trash-filled" class="icon-card-5"></iconify-icon>
                                </button>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</x-admin-layout>

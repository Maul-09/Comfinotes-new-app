<x-user-layout>
<x-slot:title>pengajuan Dana - Comfinotes</x-slot:title>
<x-slot:PageTitle>Dashboard</x-slot:PageTitle>
<x-slot:PageSubtitle>Informasi terperinci tentang keuangan komunitas Anda</x-slot:PageSubtitle>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        showAlert("{{ session('success') }}", "success", 4000);
        });
    </script>
@endif

<div class="main-content">
    <div class="submission-content">
        <form action="{{ route('user.submit') }}" method="POST" enctype="multipart/form-data" class="submission-header">
        @csrf
            <div class="form-right">
                <div class="form-header">
                    <h1>Pengajuan baru</h1>
                </div>
                <hr>
                <div class="add-money">
                    <label for="nama_acara">Nama Acara<strong>*</strong></label>
                    <input type="text" name="nama_acara" id="keterangan" placeholder="Tambah Keterangan">
                    @error('nama_acara')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="add-money">
                    <label for="nama_acara">Kebutuhan<strong>*</strong></label>
                    <input type="text" name="catatan_detail" id="keterangan" placeholder="Misal : Untuk membeli">
                    @error('nama_acara')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="add-money">
                    <label for="nominal">Masukan Jumlah<strong>*</strong></label>
                    <input type="text" class="rupiah-format" placeholder="Masukan Angka Rp. 0">
                    <input type="hidden" name="total" id="jumlah-real">
                    @error('total')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="add-money">
                    <label>Metode Pembayaran<strong>*</strong></label>
                    <div class="metode-options">
                        <label class="metode-option">
                            <span class="metode-text">Tunai</span>
                            <input type="radio" name="metode" value="tunai" checked>
                        </label>
                        <label class="metode-option">
                            <span class="metode-text">Transfer</span>
                            <input type="radio" name="metode" value="transfer">
                        </label>
                    </div>
                </div>

                <div class="add-money bank-info" style="display: none;">
                    <label for="bank_name">Nama Bank<strong>*</strong></label>
                    <input type="text" name="bank_name" id="bank_name" placeholder="Contoh: BCA">
                    @error('bank_name')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror

                    <label for="bank_account">Nomor Rekening<strong>*</strong></label>
                    <input type="text" name="bank_account" id="bank_account" placeholder="Contoh: 1234567890">
                    @error('bank_account')
                        <p class="pesan-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-left">
                <div class="add-money">
                    <h2 class="img-text">File Pendukung</h2>
                    <span>Upload file PDF atau Excel (max 2MB)</span>
                    <input type="file" id="supporting_file" name="supporting_file" class="supporting-file" accept=".pdf,.xls,.xlsx" hidden>

                    <label class="custom-file-label" for="supporting_file">
                        <iconify-icon icon="icon-park-outline:upload-one" class="file-icon"></iconify-icon>
                        <p id="file-label-text" class="file-text">Klik atau seret file PDF/Excel di sini</p>
                    </label>

                    <div class="file-preview" style="display:none;">
                        <iconify-icon class="file-icon"></iconify-icon>
                        <p class="file-name"></p>
                        <button type="button" class="delete-file">
                            <iconify-icon icon="tabler:trash-filled" class="icon-sampah"></iconify-icon>
                        </button>
                    </div>
                </div>


                <div class="add-money">
                    <label for="tanggal">Tanggal<strong>*</strong></label>
                    <div class="split">
                        <input type="number" name="jumlah_hari" id="jumlah_hari" placeholder="Jumlah Hari">
                        <input type="text" class="hari" value="Hari" disabled>
                        <input type="date" name="tanggal_pengajuan" id="tanggal_awal">
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" readonly>
                    </div>
                </div>

                <div class="button-add">
                    <button type="submit" class="button-submission">Ajukan Dana</button>
                </div>
            </div>
        </form>
    </div>
</div>

</x-user-layout>

<div class="modal-logout">
<div class="logout-notification" id="logout-notification">
    <div class="logout-content">
        <h2>Sign Out?</h2>
        <p>Do you want to exit the app now?</p>
        <div class="logout-actions">
            <button class="btn-cancel" data-action="cancel-logout">Cancel</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-confirm">Sign Out</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Delete popup --->
<div class="modal-delete">
    <div class="modal" id="modal-delete" style="display: none;">
        <div class="modal-box">
            <div class="modal-icon">
                <iconify-icon icon="tabler:trash-filled" class="icon-delete"></span>
            </div>
            <div class="modal-text">
                <h2>Hapus Akun?</h2>
                <p>Apakah Anda yakin ingin menghapus akun ini?</p>
            </div>
            <div class="delete-action">
                <form id="deleteForm" method="POST">
                @csrf
                @method('GET')
                    <button type="submit" class="btn-confirm">Ya, Hapus</button>
                    <button type="button" class="btn-cancel" data-action="close-modal" data-target="modal-delete">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

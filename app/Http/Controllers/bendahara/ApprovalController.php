<?php

namespace App\Http\Controllers\bendahara;

use App\Helpers\helper;
use App\Models\Bendahara\TransactionModel;
use Illuminate\Http\Request;

class ApprovalController
{
    public function submit(Request $request)
    {
        $request->validate([
            'notif_id' => 'required|exists:transaction,id',
            'action'   => 'required|in:approved,rejected',
        ]);

    $transfer = TransactionModel::findOrFail($request->notif_id);
    $transfer->status = $request->action;

    if ($request->action == 'approved') {
        if ($request->filled('approval_amount')) {
            $jumlahDisetujui = str_replace('.', '', $request->approval_amount);
            $transfer->approval_amount = $jumlahDisetujui;
        } else {
            $jumlahDisetujui = $transfer->total;
            $transfer->approval_amount = $jumlahDisetujui;

        }

        if (helper::getSaldo() < $jumlahDisetujui) {
            return redirect()->back()->with('error', 'Saldo tidak mencukupi untuk menyetujui transaksi ini.');
        }
            helper::kurangiSaldo($jumlahDisetujui);

        } else {
            $transfer->approval_amount = null;
        }

        $transfer->save();

        return redirect()->back()->with('success', 'Status Pengajuan telah diperbarui.');
    }

}

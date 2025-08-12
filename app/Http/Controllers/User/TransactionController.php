<?php

namespace App\Http\Controllers\User;

use App\Models\Bendahara\IncomeModel;
use App\Models\Bendahara\TransactionModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use function App\Helpers\path_view;

class TransactionController extends Controller
{

    public function submission(){
        $view = path_view('user.submission');
        return view($view);
    }

    public function AddTransaction(Request $request)
    {
        $request->validate([
            'nama_acara'        => 'required|string|min:3',
            'catatan_detail'    => 'nullable|string|min:10',
            'total'             => 'required|numeric|min:1000',
            'metode'            => 'required|in:tunai,transfer',
            'bank_name'         => 'required_if:metode,transfer|string|nullable',
            'bank_account'      => 'required_if:metode,transfer|string|nullable',
            'supporting_file'   => 'nullable|mimes:pdf,xls,xlsx|max:2048',
            'jumlah_hari'       => 'required|integer|min:1',
            'tanggal_pengajuan' => 'required|date',
        ], [
            'nama_acara.required'     => 'Nama Acara wajib diisi',
            'total.required'          => 'Nominal wajib diisi',
            'total.numeric'           => 'Nominal harus berupa angka',
            'metode.required'         => 'Pilih metode pembayaran',
            'bank_name.required_if'   => 'Nama bank wajib diisi jika metode transfer',
            'bank_account.required_if'=> 'Nomor rekening wajib diisi jika metode transfer',
            'supporting_file.mimes'   => 'File harus berupa PDF atau Excel',
            'supporting_file.max'     => 'Ukuran file maksimal 2MB',
            'jumlah_hari.required'    => 'Jumlah hari wajib diisi',
            'tanggal_pengajuan.required' => 'Tanggal pengajuan wajib diisi',
        ]);

        $tanggalAwal  = Carbon::parse($request->tanggal_pengajuan);
        $tanggalAkhir = $request->tanggal_akhir
            ? Carbon::parse($request->tanggal_akhir)
            : $tanggalAwal->copy()->addDays($request->jumlah_hari - 1);

        $filePath = null;
        if ($request->hasFile('supporting_file')) {
            $fileName = time() . '.' . $request->file('supporting_file')->getClientOriginalExtension();
            $request->file('supporting_file')->move(public_path('uploads'), $fileName);
            $filePath = 'uploads/' . $fileName;
        }


        TransactionModel::create([
            'user_id'        => Auth::id(),
            'departemen_id'  => Auth::user()->departemen_id ?? null,
            'amount'         => $request->total,
            'approval_amount'=> null,
            'nama_acara'     => $request->nama_acara,
            'catatan_detail' => $request->catatan_detail,
            'payment_method' => $request->metode,
            'bank_name'      => $request->bank_name,
            'bank_account'   => $request->bank_account,
            'supporting_file'=> $filePath,
            'status'         => 'pending',
            'submission_date'=> $tanggalAwal,
            'date_last'      => $tanggalAkhir,
            'day'            => $request->jumlah_hari,
            'is_read'        => false,
        ]);


        return redirect()->route('dashboard-user')->with('success', 'Pengajuan berhasil dikirim');
    }

}

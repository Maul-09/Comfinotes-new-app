<?php

namespace App\Http\Controllers\bendahara;

use App\Models\Bendahara\IncomeModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use App\Helpers\Helper;
use function App\Helpers\path_view;

class SaveMoneyController extends Controller
{
    public function money() {
        $history = IncomeModel::all();
        $total = IncomeModel::sum('total');
        $saldo = Helper::getSaldo();
        $view = path_view('bendahara.save-money');
        return view($view, compact('history', 'total', 'saldo'));
    }

    public function AddDana(Request $request){
        $validated = $request->validate([
            'keterangan' => 'string|max:150',
            'metode' => 'required|string|in:tunai,transfer',
            'jumlah' => 'required|numeric|min:1000',
            'tanggal' => 'required|date'

        ], [
            'metode.required' => 'Tidak boleh kosong',
            'jumlah.required' => 'Tidak boleh kosong',
            'jumlah.numeric' => 'Input harus berupa Angka',
            'jumlah.min' => 'Transaksi Minimal RP. 1000',
            'tanggal.required' => 'tanggal tidak boleh kosong'
        ]);

        $money = new IncomeModel();
        $money->created_by = Auth::id();
        $money->total = $validated['jumlah'];
        $money->metode = $validated['metode'];
        $money->income_date = $validated['tanggal'];
        $money->keterangan = $validated['keterangan'];
        $money->save();

        Helper::tambahSaldo($validated['jumlah']);

        return redirect()->back()->with('success', 'Dana Berhasil ditambahkan');
    }
}

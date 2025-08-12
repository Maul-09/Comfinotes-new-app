<?php

namespace App\Helpers;

use App\Models\Bendahara\SaldoModel;

if (!function_exists('path_view')){
    function path_view(string $view){
        return $view;
    }
}


    class helper
    {
        public static function tambahSaldo($jumlah)
    {
        $jumlah = (float) $jumlah;
        $saldo = SaldoModel::first();
        if (!$saldo) {
            SaldoModel::create(['saldo' => $jumlah]);
        } else {
            $saldo->increment('saldo', $jumlah);
        }
    }

    public static function kurangiSaldo($jumlah)
    {
        $jumlah = (float) $jumlah;
        $saldo = SaldoModel::first();
        if ($saldo && $saldo->saldo >= $jumlah) {
            $saldo->decrement('saldo', $jumlah);
        }
    }

    public static function getSaldo()
    {
        return SaldoModel::first()?->saldo ?? 0;
    }
}

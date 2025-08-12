<?php

namespace App\Http\Controllers\bendahara;

use App\Helpers\helper;
use App\Models\Bendahara\BendaharaModel;
use App\Models\Bendahara\IncomeModel;
use App\Models\Bendahara\TransactionModel;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

use function App\Helpers\path_view;

class bendaharaController extends Controller
{
    public function bendahara(){

        $Bendahara = BendaharaModel::all();
        $saldo = helper::getSaldo();
        $historyTransaction = TransactionModel::all();
        $totalAprovalTransaction = TransactionModel::where('status', 'approved')->sum('approval_amount');
        $totalIncome = IncomeModel::sum('total');
        $aprroveCount = TransactionModel::where('status', 'approved')->count();

        $startDate = Carbon::now()->subMonths(5)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $incomePerMonth = IncomeModel::selectRaw('MONTH(income_date) as month, SUM(total) as totalDana')
            ->whereBetween('income_date', [$startDate, $endDate])
            ->groupBy('month')
            ->pluck('totalDana', 'month');

        $expensePerMonth = TransactionModel::where('status', 'approved')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('MONTH(created_at) as month, SUM(approval_amount) as amount')
            ->groupBy('month')
            ->pluck('amount', 'month');

        $maxValue = max($incomePerMonth->max() ?? 1, $expensePerMonth->max() ?? 1);

        $monthlyData = [];
        $months = [];

        for ($i = 5; $i >= 0; $i--) {
            $carbonMonth = Carbon::now()->subMonths($i);
            $monthNumber = $carbonMonth->month;
            $monthName = $carbonMonth->locale('id')->monthName;

            $income = $incomePerMonth[$monthNumber] ?? 0;
            $expense = $expensePerMonth[$monthNumber] ?? 0;

            $monthlyData[$monthName] = [
                'income' => $income,
                'expense' => $expense,
                'income_percent' => ($income / $maxValue) * 100,
                'expense_percent' => ($expense / $maxValue) * 100,
            ];

            $months[] = $monthName;
        }
        $view = path_view('bendahara.dashboard-bendahara');
        return view($view, compact('Bendahara', 'totalIncome', 'aprroveCount', 'historyTransaction', 'saldo', 'totalAprovalTransaction', 'monthlyData', 'months'));

    }

    public function detail(){
        return view('bendahara.detail-info');
    }
}

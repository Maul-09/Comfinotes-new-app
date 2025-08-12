<?php

namespace App\Http\Controllers\User;

use App\Models\Bendahara\IncomeModel;
use App\Models\Bendahara\TransactionModel;
use App\Models\User\UserModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use function App\Helpers\path_view;

class UserController extends Controller
{
    public function user()
    {
        $user = Auth::user();
        $divisi = $user->departemen;
         $totalAproval = TransactionModel::where('status', 'approved')
        ->where('user_id', Auth::id())
        ->sum('approval_amount');

        $transactions = TransactionModel::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        $transactions = TransactionModel::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        $startDate = Carbon::now()->subMonths(5)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $incomePerMonth = IncomeModel::selectRaw('MONTH(income_date) as month, SUM(total) as totalDana')
            ->where('created_by', Auth::id())
            ->whereBetween('income_date', [$startDate, $endDate])
            ->groupBy('month')
            ->pluck('totalDana', 'month');

        $expensePerMonth = TransactionModel::where('status', 'approved')
            ->where('user_id', Auth::id())
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

        $view = path_view('user.dashboard-user');
        return view($view, compact('user', 'divisi', 'transactions', 'totalAproval', 'monthlyData', 'months'));
    }
}

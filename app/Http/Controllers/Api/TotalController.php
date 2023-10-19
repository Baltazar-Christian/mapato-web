<?php

namespace App\Http\Controllers\Api;

use App\Models\Debt;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Savings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TotalController extends Controller
{
    public function getTotalIncome()
    {
        $userId = Auth::id();
        $totalIncome = Income::where('user_id', $userId)->sum('amount');




        return response()->json(['totalIncome' => $totalIncome]);
    }

    public function getTotalSavings()
    {
        $userId = Auth::id();
        $totalSavings = Savings::where('user_id', $userId)->sum('amount');
        return response()->json(['totalSavings' => $totalSavings]);
    }

    public function getTotalExpenses()
    {
        $userId = Auth::id();
        $totalExpenses = Expense::where('user_id', $userId)->sum('amount');
        return response()->json(['totalExpenses' => $totalExpenses]);
    }

    public function getTotalDebts()
    {
        $userId = Auth::id();
        $totalDebts = Debt::where('user_id', $userId)->sum('amount');
        return response()->json(['totalDebts' => $totalDebts]);
    }
}

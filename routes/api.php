<?php
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SavingsGoalController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\DebtPaymentController;
use App\Http\Controllers\BudgetController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('incomes', IncomeController::class);
    Route::apiResource('expenses', ExpenseController::class);
    Route::apiResource('savings-goals', SavingsGoalController::class);
    Route::apiResource('debts', DebtController::class);
    Route::apiResource('debt-payments', DebtPaymentController::class);
    Route::apiResource('budgets', BudgetController::class);
    // Add other secured API routes for other controllers
});
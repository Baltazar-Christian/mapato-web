<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DebtController;
use App\Http\Controllers\Api\TotalControlle;
use App\Http\Controllers\Api\TotalController;
use App\Http\Controllers\Api\IncomeController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\SavingsController;
use App\Http\Controllers\Api\DebtPaymentController;
use App\Http\Controllers\Api\ExpensesController;


// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // User
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Get all income records for the authenticated user
    Route::get('/income', [IncomeController::class, 'index']);
    // Create a new income record
    Route::post('/income', [IncomeController::class, 'store']);
    // Get a specific income record for the authenticated user
    Route::get('/income/{income}', [IncomeController::class, 'show']);
    // Update a specific income record for the authenticated user
    Route::put('/income/{income}', [IncomeController::class, 'update']);
    // Delete a specific income record for the authenticated user
    Route::delete('/income/{income}', [IncomeController::class, 'destroy']);

    // Get all savings records for the authenticated user
    Route::get('/savings', [SavingsController::class, 'index']);

    // Create a new savings record
    Route::post('/savings', [SavingsController::class, 'store']);

    // Get a specific savings record for the authenticated user
    Route::get('/savings/{savings}', [SavingsController::class, 'show']);

    // Update a specific savings record for the authenticated user
    Route::put('/savings/{savings}', [SavingsController::class, 'update']);
    // Delete a specific savings record for the authenticated user
    Route::delete('/savings/{savings}', [SavingsController::class, 'destroy']);
    Route::post('savings/{saving_goal}/payments', [PaymentController::class, 'store']);
    Route::get('savings/{saving_goal}/payments', [PaymentController::class, 'index']);
    Route::delete('/savings/{saving}/payments/{payment}', [PaymentController::class, 'destroy']);

    // Get all expenses records for the authenticated user
    Route::get('/expenses', [ExpensesController::class, 'index']);

    // Create a new expenses record
    Route::post('/expenses', [ExpensesController::class, 'store']);

    // Get a specific expenses record for the authenticated user
    Route::get('/expenses/{expenses}', [ExpensesController::class, 'show']);

    // Update a specific expenses record for the authenticated user
    Route::put('/expenses/{expenses}', [ExpensesController::class, 'update']);

    // Delete a specific expenses record for the authenticated user
    Route::delete('/expenses/{expenses}', [ExpensesController::class, 'destroy']);


    // Get all debt records for the authenticated user
    Route::get('/debts', [DebtController::class, 'index']);

    // Create a new debt record
    Route::post('/debts', [DebtController::class, 'store']);

    // Get a specific debt record for the authenticated user
    Route::get('/debts/{debt}', [DebtController::class, 'show']);

    // Update a specific debt record for the authenticated user
    Route::put('/debts/{debt}', [DebtController::class, 'update']);

    // Delete a specific debt record for the authenticated user
    Route::delete('/debts/{debt}', [DebtController::class, 'destroy']);


    // For All Debt Payments
    // Route::apiResource('debt-payments', DebtPaymentController::class);
    Route::post('debts/{id}/payments', [DebtPaymentController::class, 'store']);
    Route::get('debts/{id}/payments', [DebtPaymentController::class, 'index']);
    Route::delete('/debts/{id}/payments/{payment}', [DebtPaymentController::class, 'destroy']);


    Route::get('/total-income', [TotalController::class, 'getTotalIncome']);
    Route::get('/total-savings', [TotalController::class, 'getTotalSavings']);
    Route::get('/total-expenses', [TotalController::class, 'getTotalExpenses']);
    Route::get('/total-debts', [TotalController::class, 'getTotalDebts']);
});

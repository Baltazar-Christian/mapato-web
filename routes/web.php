<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\ExpensesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect root URL to the login page
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// For Incomes
Route::middleware(['auth'])->group(function () {
    Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
    Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
    Route::post('/income', [IncomeController::class, 'store'])->name('income.store');
    Route::get('/income/{id}/edit', [IncomeController::class, 'edit'])->name('income.edit');
    Route::put('/income/{id}', [IncomeController::class, 'update'])->name('income.update');
    Route::delete('/income/{id}', [IncomeController::class, 'destroy'])->name('income.destroy');
});
// End


// For Savings
Route::middleware(['auth'])->group(function () {
    Route::get('/savings', [SavingsController::class, 'index'])->name('savings.index');
    Route::get('/savings/create', [SavingsController::class, 'create'])->name('savings.create');
    Route::post('/savings', [SavingsController::class, 'store'])->name('savings.store');
    Route::get('/savings/{id}/edit', [SavingsController::class, 'edit'])->name('savings.edit');
    Route::put('/savings/{id}', [SavingsController::class, 'update'])->name('savings.update');
    Route::delete('/savings/{id}', [SavingsController::class, 'destroy'])->name('savings.destroy');
});
// End


// Define the web routes for the Expenses module
Route::middleware(['auth'])->group(function () {
    // Show the list of expenses
    Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');

    // Show the form for creating a new expense
    Route::get('/expenses/create', [ExpensesController::class, 'create'])->name('expenses.create');

    // Store a new expense
    Route::post('/expenses', [ExpensesController::class, 'store'])->name('expenses.store');

    // Show the form for editing an existing expense
    Route::get('/expenses/{id}/edit', [ExpensesController::class, 'edit'])->name('expenses.edit');

    // Update an existing expense
    Route::put('/expenses/{id}', [ExpensesController::class, 'update'])->name('expenses.update');

    // Delete an existing expense
    Route::delete('/expenses/{id}', [ExpensesController::class, 'destroy'])->name('expenses.destroy');
});




// Define the web routes for the Debts module
Route::middleware(['auth'])->group(function () {
    Route::get('/debts', [DebtsController::class, 'index'])->name('debts.index');
    Route::get('/debts/create', [DebtsController::class, 'create'])->name('debts.create');
    Route::post('/debts', [DebtsController::class, 'store'])->name('debts.store');
    Route::get('/debts/{id}/edit', [DebtsController::class, 'edit'])->name('debts.edit');
    Route::put('/debts/{id}', [DebtsController::class, 'update'])->name('debts.update');
    Route::delete('/debts/{id}', [DebtsController::class, 'destroy'])->name('debts.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

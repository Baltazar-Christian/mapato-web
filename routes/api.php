<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IncomeController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
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
});
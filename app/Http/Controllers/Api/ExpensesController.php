<?php
// app/Http/Controllers/Api/ExpensesController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    public function index()
    {
        // Get expenses records for the authenticated user
        $user = Auth::user();
        $expenses = $user->expenses;

        return response()->json($expenses);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'nullable|numeric',
            'bamount' => 'required|numeric',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Create a new expenses record for the authenticated user
        $expenses = new Expense([
            'user_id' => Auth::id(),
            'amount' => $request->input('amount'),
            'bamount' => $request->input('bamount'),
            'description' => $request->input('description'),
            // Set other attributes as needed
        ]);
        $expenses->save();

        return response()->json($expenses, 201);
    }

    public function show(Expense $expenses)
    {
        // Check if the expenses record belongs to the authenticated user
        if ($expenses->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($expenses);
    }

    public function update(Request $request, Expense $expenses)
    {
        // Check if the expenses record belongs to the authenticated user
        // if ($expenses->user_id !== Auth::id()) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // Validate the request data
        $request->validate([
            // 'bamount' => 'required|numeric',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Update the expenses record
        $expenses->update([
            'amount' => $request->input('amount'),
            'bamount' => $request->input('bamount'),
            'description' => $request->input('description'),
            // Update other attributes as needed
        ]);

        return response()->json($expenses);
    }

    public function destroy(Expense $expenses)
    {
        // Check if the expenses record belongs to the authenticated user
        // if ($expenses->user_id !== Auth::id()) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // Delete the expenses record
        $expenses->delete();

        return response()->json(null, 204);
    }
}

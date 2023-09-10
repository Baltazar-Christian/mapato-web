<?php
// app/Http/Controllers/Api/DebtController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebtController extends Controller
{
    public function index()
    {
        // Get debt records for the authenticated user
        $user = Auth::user();
        $debts = $user->debts;

        return response()->json($debts);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'owner' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Create a new debt record for the authenticated user
        $debt = new Debt([
            'user_id' => Auth::id(),
            'owner' => $request->input('owner'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // Set other attributes as needed
        ]);
        $debt->save();

        return response()->json($debt, 201);
    }

    public function show(Debt $debt)
    {
        // Check if the debt record belongs to the authenticated user
        if ($debt->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($debt);
    }

    public function update(Request $request, Debt $debt)
    {
        // Check if the debt record belongs to the authenticated user
        if ($debt->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Update the debt record
        $debt->update([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // Update other attributes as needed
        ]);

        return response()->json($debt);
    }

    public function destroy(Debt $debt)
    {
        // Check if the debt record belongs to the authenticated user
        if ($debt->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Delete the debt record
        $debt->delete();

        return response()->json(null, 204);
    }
}

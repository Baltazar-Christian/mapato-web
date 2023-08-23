<?php
// app/Http/Controllers/Api/IncomeController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index()
    {
        // Get income records for the authenticated user
        $user = Auth::user();
        $income = Income::where('user_id', auth()->id())->latest()->get();


        return response()->json($income);
    }

    // ... Other methods ...

    public function show(Income $income)
    {
        // Check if the income record belongs to the authenticated user
        if ($income->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($income);
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric',
            'source' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Create a new income record for the authenticated user
        $income =  Income::create([
            'user_id' => auth()->id(),
            'source' => $request->input('source'),
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
            // Add other fields
        ]);

        $income->save();

        return response()->json($income, 201);
    }

 
    public function update(Request $request, Income $income)
    {
        // Check if the income record belongs to the authenticated user
        if ($income->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric',
            'source' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Update the income record
        $income->update([
            'amount' => $request->input('amount'),
            'source' => $request->input('source'),
            // Update other attributes as needed
        ]);

        return response()->json($income);
    }

    public function destroy(Income $income)
    {
        // Check if the income record belongs to the authenticated user
        if ($income->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Delete the income record
        $income->delete();

        return response()->json(null, 204);
    }
}

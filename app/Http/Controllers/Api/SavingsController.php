<?php
// app/Http/Controllers/Api/SavingsController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Savings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavingsController extends Controller
{
    public function index()
    {
        // Get savings records for the authenticated user
        $user = Auth::user();
        $savings = $user->savings;

        return response()->json($savings);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Create a new savings record for the authenticated user
        $savings = new Savings([
            'user_id' => Auth::id(),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // Set other attributes as needed
        ]);
        $savings->save();

        return response()->json($savings, 201);
    }

    public function show(Savings $savings)
    {
        // Check if the savings record belongs to the authenticated user
        if ($savings->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($savings);
    }

    public function update(Request $request, Savings $savings)
    {
        // Check if the savings record belongs to the authenticated user
        if ($savings->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Update the savings record
        $savings->update([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // Update other attributes as needed
        ]);

        return response()->json($savings);
    }

    public function destroy( $id)
    {
        // Check if the savings record belongs to the authenticated user
        // if ($savings->user_id !== Auth::id()) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // Delete the savings record
        $savings=Savings::where('id',$id)->first();
        $savings->delete();

        return response()->json(null, 204);
    }
}

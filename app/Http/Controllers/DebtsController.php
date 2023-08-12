<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DebtsController extends Controller
{
    public function index()
    {
        // Retrieve all debt records for the authenticated user
        $debts = auth()->user()->debts;

        return view('debts.index', compact('debts'));
    }

    public function create()
    {
        // Return the view for creating a new debt record
        return view('debts.create');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Create a new debt record for the authenticated user
        auth()->user()->debts()->create([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // Assign other fields here
        ]);

        return redirect()->route('debts.index')->with('success', 'Debt record created successfully');
    }

}

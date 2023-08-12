<?php

namespace App\Http\Controllers;

use App\Models\Savings;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    public function index()
    {
        // Retrieve all savings records for the authenticated user
        $savings = auth()->user()->savings;

        return view('savings.index', compact('savings'));
    }

    public function create()
    {
        // Return the view for creating a new savings record
        return view('savings.create');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Create a new savings record
        auth()->user()->savings()->create([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // Assign other fields here
        ]);

        return redirect()->route('savings.index')->with('success', 'Savings record created successfully');
    }

    public function edit($id)
    {
        // Retrieve the savings record by ID for editing
        $savings = Savings::findOrFail($id);

        return view('savings.edit', compact('savings'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Update the savings record
        $savings = Savings::findOrFail($id);
        $savings->update([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // Update other fields as needed
        ]);

        return redirect()->route('savings.index')->with('success', 'Savings record updated successfully');
    }

    public function destroy($id)
    {
        // Delete the savings record
        $savings = Savings::findOrFail($id);
        $savings->delete();

        return redirect()->route('savings.index')->with('success', 'Savings record deleted successfully');
    }
}

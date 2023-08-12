<?php

// app/Http/Controllers/DebtController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;

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

    public function edit($id)
    {
        // Retrieve the debt record by ID for editing
        $debt = Debt::findOrFail($id);

        // Ensure that the debt record belongs to the authenticated user
        if ($debt->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('debts.edit', compact('debt'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Update the debt record
        $debt = Debt::findOrFail($id);

        // Ensure that the debt record belongs to the authenticated user
        if ($debt->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $debt->update([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // Update other fields as needed
        ]);

        return redirect()->route('debts.index')->with('success', 'Debt record updated successfully');
    }

    public function destroy($id)
    {
        // Retrieve the debt record by ID
        $debt = Debt::findOrFail($id);

        // Ensure that the debt record belongs to the authenticated user
        if ($debt->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the debt record
        $debt->delete();

        return redirect()->route('debts.index')->with('success', 'Debt record deleted successfully');
    }
}

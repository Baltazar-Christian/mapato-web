<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpensesController extends Controller
{
    public function index()
    {
        // Retrieve all expenses records for the authenticated user
        $expenses = auth()->user()->expenses;

        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        // Return the view for creating a new expenses record
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'amount' => 'required|numeric',
            'bamount' => 'required|numeric',
            'description' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Create a new expenses record for the authenticated user
        auth()->user()->expenses()->create([
            'amount' => $request->input('amount'),
            'bamount' => $request->input('bamount'),
            'description' => $request->input('description'),
            // Assign other fields here
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expenses record created successfully');
    }

    public function edit($id)
    {
        // Retrieve the expenses record by ID for editing
        $expense = Expense::findOrFail($id);

        // Ensure that the expenses record belongs to the authenticated user
        if ($expense->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Update the expenses record
        $expense = Expense::findOrFail($id);

        // Ensure that the expenses record belongs to the authenticated user
        if ($expense->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $expense->update([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // Update other fields as needed
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expenses record updated successfully');
    }

    public function destroy($id)
    {
        // Retrieve the expenses record by ID
        $expense = Expense::findOrFail($id);

        // Ensure that the expenses record belongs to the authenticated user
        if ($expense->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the expenses record
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expenses record deleted successfully');
    }
}

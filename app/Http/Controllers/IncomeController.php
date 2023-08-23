<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        // List income sources for the user
        $incomes = Income::where('user_id', auth()->id())->latest()->get();
        return view('income.index', compact('incomes'));
    }

    public function create()
    {
        // Show income creation form
        return view('income.create');
    }

    public function store(Request $request)
    {
        // Store new income record
        Income::create([
            'user_id' => auth()->id(),
            'source' => $request->input('source'),
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
            // Add other fields
        ]);

        return redirect()->route('income.index')->with('success', 'Earning added successfully');
    }


    public function update(Request $request, $id)
    {
        $income = Income::findOrFail($id);

        // Validation for updated data
        $request->validate([
            'amount' => 'required|numeric',
            'source' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Update income record
        $income->update([
            'amount' => $request->input('amount'),
            'source' => $request->input('source'),
            // Update other fields as needed
        ]);

        return redirect()->route('income.index')->with('success', 'Earning updated successfully');
    }

    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();

        return redirect()->route('income.index')->with('success', 'Earning deleted successfully');
    }
}

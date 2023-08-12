<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        // List income sources for the user
        $incomes = Income::where('user_id', auth()->id())->get();
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

        return redirect()->route('income.index')->with('success', 'Income added successfully');
    }

}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Savings;

class SavingsController extends Controller
{
    public function index()
    {
        // Retrieve all savings records for the authenticated user
        // $savings = auth()->user()->savings->lates();
        $savings = Savings::where('user_id', auth()->id())->latest()->get();

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

        // Create a new savings record for the authenticated user
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

        // Ensure that the savings record belongs to the authenticated user
        if ($savings->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

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

        // Ensure that the savings record belongs to the authenticated user
        if ($savings->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

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

        // Ensure that the savings record belongs to the authenticated user
        if ($savings->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $savings->delete();

        return redirect()->route('savings.index')->with('success', 'Savings record deleted successfully');
    }
}

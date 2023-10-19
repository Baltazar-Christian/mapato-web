<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\DebtPayment;
use Illuminate\Http\Request;

class DebtPaymentController extends Controller
{
    //For All Debt Payments
    public function debt()
    {
        return $this->belongsTo(Debt::class);
    }

    // For Save Debt Payment
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'debt_id' => 'required',
            'payment_date' => 'required|date',
            'payment_amount' => 'required|numeric',
            'remaining_debt' => 'required|numeric',
        ]);

        // Create a new debt payment
        $payment = DebtPayment::create($request->all());

        return response()->json(['message' => 'Payment added successfully'], 201);
    }



}

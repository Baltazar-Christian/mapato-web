<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use App\Models\Savings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(Savings $saving_goal)
    {
        return $saving_goal->payments;
    }

    public function store(Request $request, Savings $saving_goal)
    {
        // Validate the payment amount
        $request->validate([
            'payment' => [
                'required',
                'numeric',
                'min:0', // Payment amount should be non-negative
                Rule::notIn($saving_goal->payments->pluck('payment')->toArray()), // Check if payment is unique within this savings goal
                function ($attribute, $value, $fail) use ($saving_goal) {
                    // Check if the sum of existing payments plus the new payment exceeds the saving amount
                    if ($saving_goal->payments->sum('payment') + $value > $saving_goal->amount) {
                        $fail('The total payment amount cannot exceed the saving goal amount.');
                    }

                },
            ],
        ]);

        // Create and save the new payment
        $payment = new Payment(['payment' => $request->input('payment')]);
        $saving_goal->payments()->save($payment);

        return response()->json($payment, 201);
    }

    public function destroy(Savings $saving, Payment $payment)
    {
        // Check if the payment belongs to the specified saving
        if ($payment->saving_id !== $saving->id) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Delete the payment
        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully'] ,204);
    }
}

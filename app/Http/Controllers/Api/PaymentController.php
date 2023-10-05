<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use App\Models\Savings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(Savings $saving_goal)
    {
        return $saving_goal->payments;
    }

    public function store(Request $request, Savings $saving_goal)
    {

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

        return response()->json(['message' => 'Payment deleted successfully']);
    }
}

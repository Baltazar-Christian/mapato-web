<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\DebtPayment;
use Illuminate\Http\Request;

class DebtPaymentController extends Controller
{
    //For All Debt Payments
    // public function debt()
    // {
    //     return $this->belongsTo(Debt::class);
    // }


    public function index( $debt)
    {

        $payments=DebtPayment::where('debt_id',$debt)->get();

        // dd($payments);
        return $payments;



    }

    // For Save Debt Payment
    public function store(Request $request,  $debt)
    {
        // Validate the payment amount
        // $request->validate([
        //     'payment' => [
        //         'required',
        //         'numeric',
        //         'min:0', // Payment amount should be non-negative
        //         // Rule::notIn($saving_goal->payments->pluck('payment')->toArray()), // Check if payment is unique within this savings goal
        //         // function ($attribute, $value, $fail) use ($saving_goal) {
        //         //     // Check if the sum of existing payments plus the new payment exceeds the saving amount
        //         //     if ($saving_goal->payments->sum('payment') + $value > $saving_goal->amount) {
        //         //         $fail('The total payment amount cannot exceed the saving goal amount.');
        //         //     }

        //         // },
        //     ],
        // ]);

        $debts=Debt::where('id',$debt)->first();
        // dd($debts->payments);

        // Create and save the new payment
        $payment = new DebtPayment(['payment' => $request->input('payment')]);
        $debts->payments()->save($payment);

        return response()->json($payment, 201);
    }



    public function destroy( $debt,  $id)
    {
        $payment=DebtPayment::where('debt_id',$debt)->where('id',$id)->first();
        $debt=Debt::where('id',$debt)->first();

        // Check if the payment belongs to the specified saving
        if ($payment->debt_id !== $debt->id) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Delete the payment
        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully'] ,204);
    }


}

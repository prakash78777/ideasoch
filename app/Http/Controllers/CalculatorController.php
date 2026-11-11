<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'investment' => 'required|numeric|min:0',
            'expense' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'customers' => 'required|numeric|min:0',
        ]);

        $investment = (float) $request->investment;
        $expense = (float) $request->expense;
        $price = (float) $request->price;
        $customers = (float) $request->customers;

        $revenue = $price * $customers;

        $profit = $revenue - $expense;

        if ($profit > 0) {
            $breakEvenMonths = ceil($investment / $profit);

            if ($breakEvenMonths <= 1) {
                $breakEven = '1 Month';
            } elseif ($breakEvenMonths <= 3) {
                $breakEven = '2 - 3 Months';
            } elseif ($breakEvenMonths <= 6) {
                $breakEven = '3 - 6 Months';
            } elseif ($breakEvenMonths <= 12) {
                $breakEven = '6 - 12 Months';
            } else {
                $breakEven = $breakEvenMonths . ' Months';
            }
        } else {
            $breakEven = 'Not Profitable';
        }

        return response()->json([
            'revenue' => $revenue,
            'expense' => $expense,
            'profit' => $profit,
            'break_even' => $breakEven,
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:3|max:99999999999.99',
            'type' => 'required|string',
            'category' => 'required|string',
            'notes' => 'required|string',
        ]);
        $transaction = Transaction::create([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'notes' => $validated['notes'],

        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }

}

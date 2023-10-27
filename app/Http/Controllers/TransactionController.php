<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$transactions = transaction::all();
        $transactions = transaction::paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource......
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string'
        ]);

        // Buat artikel baru
        $transaction = transaction::create([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'category' => $validated['category'],
            'notes' => $validated['notes' ?? null],
            'published_at' => $request->has('is_published') ? Carbon::now() : false,
        ]);

        return redirect()->route('transactions.index')->with('success', 'transaction Created.');
    }


    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaction $transaction)
    {
            //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        //
    }
}
